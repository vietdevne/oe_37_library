<?php
namespace App\Repositories\RepositoryInterface;

interface ReviewRepositoryInterface extends BaseRepositoryInterface
{
    public function searchReview($search, $rate);
    public function getWithUser($id);
}
