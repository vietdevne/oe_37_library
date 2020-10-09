<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'liked_date',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
