<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey = 'cate_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'cate_name',
        'cate_desc',
        'parent_id',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
