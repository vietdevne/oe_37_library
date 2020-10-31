<?php
namespace App\Repositories\RepositoryInterface;

interface BookRepositoryInterface extends BaseRepositoryInterface
{
    public function getLastestBook();

    public function getFavouriteBook();

    public function viewCounter($id);
    public function getQuerySearch($title, $cate);
}
