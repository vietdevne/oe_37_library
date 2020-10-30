<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Book;
use App\Models\User;

class Review extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'review_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'book_id',
        'content',
        'rate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function scopeName($query, $search)
    {
        return $query->where('fullname', 'LIKE', '%' . $search . '%')
            ->join('users', 'users.user_id', '=', 'reviews.user_id')
            ->orWhere('book_title', 'Like', '%' . $search . '%')
            ->join('books', 'books.book_id', '=', 'reviews.book_id');;
    }

    public function scopeRate($query, $rate)
    {
        return $query->where('rate', 'LIKE', '%' . $rate . '%');
    }

}
