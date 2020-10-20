<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Book;

class Publisher extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'pub_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'pub_name',
        'pub_logo',
        'pub_desc',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function scopeSearch($query, $key)
    {
        return $query->where('pub_name', 'LIKE', '%' . $key . '%')
            ->orWhere('pub_desc', 'LIKE', '%' . $key . '%')
            ->orWhere('updated_at', 'LIKE', '%' . $key . '%');
    }
}
