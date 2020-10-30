<?php
namespace App\Repositories;
use App\Repositories\RepositoryInterface\FollowRepositoryInterface;
use App\Models\Follow;

class FollowRepository extends BaseRepository implements FollowRepositoryInterface
{
    public function getModel()
    {
        return Follow::class;
    }

    public function getAll()
    {
        //
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findExist($user_id, $author_id)
    {
        return $this->model->where('user_id', $user_id)
            ->where('author_id', $author_id)
            ->first();
    }
    
    public function unFollow($user_id, $author_id)
    {
        $follow = $this->findExist($user_id, $author_id);
        if ($follow) {
            $follow->where('user_id', $user_id)->where('author_id', $author_id)
                ->delete();

            return true;
        }
        return false;
    }
    public function create($attributes = []){
        return $this->model->create($attributes);
    }

}
