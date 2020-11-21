<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Book;
use App\Enums\BorrowStatus;

class Borrow extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'borr_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'book_id',
        'borr_status',
        'borrow_date',
        'return_date',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function scopeFullname($query, $fullname)
    {
        return $query->where('users.fullname', 'LIKE', '%' . $fullname . '%')
            ->join('users', 'borrows.user_id', '=', 'users.user_id');
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('borr_status', 'LIKE', '%' . $status . '%');
    }

    public function scopeCountborow($query, $firstQuarter, $lastQuarter)
    {
        return $query->whereBetween('updated_at', [$firstQuarter, $lastQuarter])
            ->where('borr_status', BorrowStatus::borrowing);
    }
}
