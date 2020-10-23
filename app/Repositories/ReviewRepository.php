<?php
namespace App\Repositories;
use App\Repositories\RepositoryInterface\ReviewRepositoryInterface;
use App\Models\Review;

class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface
{
    public function getModel()
    {
        return Review::class;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getWithKey($key)
    {
        return $this->model->search($key)->paginate(config('app.paginate'));
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function getWithUser($id)
    {
        return $this->model->where('book_id', $id)
            ->with('user')->orderBy('review_id', 'DESC')->get();
    }

    public function create($attributes = []){
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $re = $this->model->find($id);
        if($re){
            $re->update($attributes);

            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $re = $this->model->find($id);
        if($re){
            $re->delete();

            return true;
        }
        return false;
    }
}
