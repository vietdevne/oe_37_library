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

}
