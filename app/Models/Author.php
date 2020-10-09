<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'author_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'author_name',
        'author_avatar',
        'author_desc',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
