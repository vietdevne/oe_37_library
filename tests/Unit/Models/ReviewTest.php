<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Review;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReviewTest extends TestCase
{
    protected $review;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->review = new Review();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->review);
    }

    public function test_table_name()
    {
        $this->assertEquals('reviews', $this->review->getTable());
    }


    public function test_fillable()
    {
        $this->assertEquals(
            [
                'user_id',
                'book_id',
                'content',
                'rate',
            ],
            $this->review->getFillable()
        );
    }

    public function test_key_name()
    {
        $this->assertEquals('review_id', $this->review->getKeyName());
    }

    public function test_user_relation()
    {
        $relation = $this->review->user();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
    }

    public function test_book_relation()
    {
        $relation = $this->review->book();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('book_id', $relation->getForeignKeyName());
    }
}
