<?php

namespace App\Repositories;

use App\Models\Author;
use App\Repositories\RepositoryInterface\BaseRepositoryInterface;

class AuthorRepository extends BaseRepository implements BaseRepositoryInterface
{

    public function getModel()
    {
        return Author::class;
    }

    public function getAuthor()
    {
        return $this->model->orderBy('author_id','DESC')->get();
    }

    public function findAuthor($authorId)
    {
        return Author::find($authorId);
    }

    public function createAuthor(array $data)
    {
        $result = false;
        try {
            if ($data['author_avatar']) {
                $file = $data['author_avatar'];
                $image = uniqid() . '_' . $file->getClientOriginalName();
                $file->move('image', $image);
            }
            $author = $this->model->create([
                'author_name' => $data['author_name'],
                'author_desc' => $data['author_desc'],
                'author_avatar' => $image,
            ]);
            $result = true;
        } catch (Exception $exception) {
            return $result;
        }

        return $result;
    }

    public function updateAuthor($authorId, array $data)
    {
        try {
            if ($data['author_avatar']) {
                $file = $data['author_avatar'];
                $image = uniqid() . '_' . $file->getClientOriginalName();
                $file->move('image', $image);
            }
            $author = $this->find($authorId);
            $author->author_name = $data['author_name'];
            $author->author_avatar = $image;
            $author->author_desc= $data['author_desc'];
            $author->save();
        } catch (Exception $exception) {
            return false;
        }

        return true;
    }

    public function deleteAuthor($authorId)
    {
        $result = $this->find($authorId);
        if ($result) {
            $result->delete();

            return true;
        }
        
        return false;
    }
}
