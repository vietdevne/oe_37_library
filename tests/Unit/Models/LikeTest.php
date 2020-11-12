<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LikeTest extends TestCase
{
    protected $like;
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
        $this->like = new Like();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->like);
    }

    public function test_table_name()
    {
        $this->assertEquals('likes', $this->like->getTable());
    }

    public function test_key_name()
    {
        $this->assertEquals('like_id', $this->like->getKeyName());
    }

    public function test_fillable()
    {
        $this->assertEquals(
            [
                'book_id',
                'user_id',
            ],
            $this->like->getFillable()
        );
    }

    public function test_books_relation()
    {
        $relation = $this->like->Book();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('book_id', $relation->getForeignKeyName());
    }

    public function test_user_relation()
    {
        $relation = $this->like->User();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
    }
}
