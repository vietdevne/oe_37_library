<?php

namespace Tests\Unit\Models;

use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Category;
use App\Models\Borrow;
use App\Models\Like;
use App\Models\Review;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\ModelTestCase;

class BookTest extends ModelTestCase
{
    public function test_model_configuration()
    {
        $this->runConfigurationAssertions(new Book(), [
            'book_title',
            'book_image',
            'cate_id',
            'author_id',
            'pub_id',
            'quantity',
            'book_desc',
        ]);
    }
    public function test_primaryKey()
    {
        $this->assertPrimaryKey('book_id', new Book());
    }
    
    public function test_publisher_relation()
    {
        $m = new Book();
        $r = $m->publisher();
        $this->assertBelongsToRelation($r, $m, new Publisher(), 'pub_id');
    }
    
    public function test_author_relation()
    {
        $m = new Book();
        $r = $m->author();
        $this->assertBelongsToRelation($r, $m, new Author(), 'author_id');
    }
    
    public function test_category_relation()
    {
        $m = new Book();
        $r = $m->category();
        $this->assertBelongsToRelation($r, $m, new Category(), 'cate_id');
    }
    
    public function test_borrows_relation()
    {
        $m = new Book();
        $r = $m->borrows();
        $this->assertHasManyRelation($r, $m, new Borrow(), 'book_id');
    }
    
    public function test_likes_relation()
    {
        $m = new Book();
        $r = $m->likes();
        $this->assertHasManyRelation($r, $m, new Like(), 'book_id');
    }
    
    public function test_liked_relation()
    {
        $m = new Book();
        $r = $m->liked(1);
        $this->assertHasManyRelation($r, $m, new Like(), 'book_id');
    }
    
    public function test_reviews_relation()
    {
        $m = new Book();
        $r = $m->reviews();
        $this->assertHasManyRelation($r, $m, new Review(), 'book_id');
    }
}
