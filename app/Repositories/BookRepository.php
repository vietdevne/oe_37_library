<?php
namespace App\Repositories;
use App\Repositories\RepositoryInterface\BookRepositoryInterface;
use App\Models\Book;

class BookRepository implements BookRepositoryInterface
{
    public function getAll()
    {
        return Book::lastest()->paginate(config('app.paginate'));
    }

    public function getLastestBook()
    {
        return Book::lastest()->limit(config('app.lastest'))->get();
    }

    public function getFavouriteBook()
    {
        return Book::withCount('likes')->orderBy('likes_count', 'desc')->limit(config('app.lastest'))->get();
    }

    public function find($id)
    {
        return Book::find($id);
    }

    public function create($data = []){
        $thumb = '';
        try {
            if ($data['book_image']) {
                $file = $data['book_image'];
                $thumb = uniqid() . '_' . $file->getClientOriginalName();
                $file->move('images/books', $thumb);
            }
            $data['book_image'] = $thumb;
            Book::create($data);
            
            return true;
        } catch (Exception $exception) {
            return false;
        }

        return false;        
    }

    public function update($bookId, $data = [])
    {
        try {
            if ($data['book_image']) {
                $file = $data['book_image'];
                $image = uniqid() . '_' . $file->getClientOriginalName();
                $file->move('images/books', $image);
            }
            $book = $this->find($bookId);
            $book->book_title = $data['book_title'];
            $book->book_image = $image;
            $book->book_desc = $data['book_desc'];
            $book->quantity = $data['quantity'];
            $book->author_id = $data['author_id'];
            $book->pub_id = $data['pub_id'];
            $book->cate_id = $data['cate_id'];
            $book->save();
        } catch (Exception $exception) {
            return false;
        }

        return true;
    }

    public function delete($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->delete();

            return true;
        }

        return false;
    }

    public function viewCounter($id){
        $book = Book::find($id);
        if($book) {
            return $book->increment('view');
        }
    }
}
