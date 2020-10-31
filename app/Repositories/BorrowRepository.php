<?php
namespace App\Repositories;
use App\Repositories\RepositoryInterface\BorrowRepositoryInterface;
use App\Models\Borrow;
use App\Enums\BorrowStatus;
use Carbon\Carbon;

class BorrowRepository extends BaseRepository implements BorrowRepositoryInterface
{
    public function getModel()
    {
        return Borrow::class;
    }

    public function getAll()
    {
        return $this->model->latest()->paginate(config('app.paginate'));
    }

    public function getQuerySearch($fullname, $status)
    {
        return $this->model->query()->fullname($fullname)->status($status)
            ->paginate(config('app.paginate'));
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function getBookId($id)
    {
        $returnDates = $this->model->whereBorr_id($id)->get();  
        foreach ($returnDates as $d) {
            $returnDate = $d->return_date;
        }
        return $d->return_date;
    }

    public function checkBorrowStatus($id, $status)
    {
        $attributes = [];
        if ($status == BorrowStatus::borrowing) {
            if (Carbon::now()->diffInDays($this->getBookId($id)) != 0 ) {
                $note = trans('admin.borrow_table.overdue');
            } else {
                $note = null;
            }
            $attributes = [
                'borr_status' => $status,
                'borrow_date' => Carbon::now(),
                'note' => $note,
            ];
        } else if ($status == BorrowStatus::paid) {
            $attributes = [
                'borr_status' => $status,
                'note' => trans('admin.borrow_table.delay') . Carbon::now()->diffInDays($this->getBookId($id)),
            ];
        } else if (Carbon::now()->diffInDays($this->getBookId($id)) != 0 ) {
            $attributes = [
                'note' => trans('admin.borrow_table.overdue')
            ];
        }
        return $attributes;
    }

    public function update($id, $attributes = [])
    {
        $borrow = $this->model->findOrFail($id);

        return $borrow->update($attributes);
    }

    public function delete($id)
    {
        $borrow = $this->model->findOrFail($id);
        
        return $borrow->delete();
    }

    public function getHistoryBorrow($userId)
    {
        return $this->model->with(['user', 'book'])
            ->where('user_id', $userId)->get();
    }
}
