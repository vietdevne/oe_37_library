<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Follow;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FollowTest extends TestCase
{
    protected $follow;
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
        $this->follow = new Follow();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->follow);
    }

    public function test_table_name()
    {
        $this->assertEquals('follows', $this->follow->getTable());
    }


    public function test_fillable()
    {
        $this->assertEquals(
            [
                'user_id', 
                'author_id',
            ],
            $this->follow->getFillable()
        );
    }

    public function test_user_relation()
    {
        $relation = $this->follow->user();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
    }

    public function test_author_relation()
    {
        $relation = $this->follow->author();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('author_id', $relation->getForeignKeyName());
    }
}
