<?php
namespace App\Repositories\RepositoryInterface;

interface FollowRepositoryInterface extends BaseRepositoryInterface
{
    public function findExist($user_id, $author_id);
    public function unFollow($user_id, $author_id);
}
