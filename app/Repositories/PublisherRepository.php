<?php

namespace App\Repositories;

use App\Models\Publisher;
use App\Repositories\RepositoryInterface\PublisherRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PublisherRepository extends BaseRepository implements PublisherRepositoryInterface
{

    public function getModel()
    {
        return Publisher::class;
    }

    public function getAllPublisher()
    {
        return $this->model->all();
    }

    public function getPublisher()
    {
        return $this->model->orderBy('pub_id', 'DESC')->paginate(Config::get('app.paginatePublisher'));
    }

    public function getWithKey($key)
    {
        return Publisher::search($key)->paginate(config('app.paginate'));
    }

    public function findPublisher($pubId)
    {
        return Publisher::find($pubId);
    }

    public function createPublisher(array $data)
    {
        $result = false;
        try {
            if ($data['pub_logo']) {
                $file = $data['pub_logo'];
                $image = uniqid() . '_' . $file->getClientOriginalName();
                $file->move('image', $image);
            }
            $publisher = $this->model->create([
                'pub_name' => $data['pub_name'],
                'pub_desc' => $data['pub_desc'],
                'pub_logo' => $image,
            ]);
            $result = true;
        } catch (Exception $exception) {
            return $result;
        }

        return $result;
    }

    public function updatePublisher($pubId, array $data)
    {
        try {
            if ($data['pub_logo']) {
                $file = $data['pub_logo'];
                $image = uniqid() . '_' . $file->getClientOriginalName();
                $file->move('image', $image);
            }
            $publisher = $this->find($pubId);
            $publisher->pub_name = $data['pub_name'];
            $publisher->pub_logo = $image;
            $publisher->pub_desc= $data['pub_desc'];
            $publisher->save();
        } catch (Exception $exception) {
            return false;
        }

        return true;
    }

    public function deletePublisher($pubId)
    {
        $result = $this->model->find($pubId);
        if ($result) {
            $result->delete();

            return true;
        }
        
        return false;
    }
}
