<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Author;

class Follow extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'author_id',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function author() 
    {
        return $this->belongsTo(Author::class);
    }
}
