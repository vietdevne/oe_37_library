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

    public function update($id, $attributes = [])
    {
        $user = Book::find($id);
        if($user){
            $user->update($attributes);
            
            return true;
        }
        
        return false;
    }

    public function delete($id)
    {
        $user = Book::find($id);
        if ($user) {
            $user->delete();

            return true;
        }

        return false;
    }
}
