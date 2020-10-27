<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Category;
use App\Models\Borrow;
use App\Models\Like;
use App\Models\Review;

class Book extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'book_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'book_title',
        'book_image',
        'cate_id',
        'author_id',
        'pub_id',
        'quantity',
        'book_desc',
        
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'pub_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id');
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeLastest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
    
}
