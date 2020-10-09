<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'borr_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'borr_status',
        'borr_from_date',
        'borr_to_date',
        'borr_return_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
