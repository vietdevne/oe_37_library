<?php
namespace App\Repositories\RepositoryInterface;

interface BorrowRepositoryInterface extends BaseRepositoryInterface
{
    public function getQuerySearch($fullname, $role);
    public function getHistoryBorrow($userId);
    public function getBookId($id);
    public function checkBorrowStatus($id, $status);
}
