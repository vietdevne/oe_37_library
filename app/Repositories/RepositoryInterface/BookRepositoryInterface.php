<?php
namespace App\Repositories\RepositoryInterface;

interface BookRepositoryInterface extends BaseRepositoryInterface
{
    public function viewCounter($id);
}
