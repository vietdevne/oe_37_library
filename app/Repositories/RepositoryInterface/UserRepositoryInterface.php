<?php
namespace App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getWithKey($key);
}
