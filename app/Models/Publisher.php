<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
