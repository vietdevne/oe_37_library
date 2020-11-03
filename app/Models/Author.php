<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Book;

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
        return $this->hasMany(Book::class, 'author_id');
    }

    public function follows()
    {
        return $this->hasMany(Follow::class, 'author_id');
    }

    public function scopeSearch($query, $key)
    {
        return $query->where('author_name', 'LIKE', '%' . $key . '%') 
            ->orWhere('author_desc', 'LIKE', '%' . $key . '%')
            ->orWhere('updated_at', 'LIKE', '%' . $key . '%');
    }
}
