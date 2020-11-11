<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Author;
use App\Models\Book;
use App\Models\Follow;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AuthorTest extends TestCase
{
    protected $author;
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
        $this->author = new Author();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->author);
    }

    public function test_table_name()
    {
        $this->assertEquals('authors', $this->author->getTable());
    }

    public function test_key_name()
    {
        $this->assertEquals('author_id', $this->author->getKeyName());
    }

    public function test_fillable()
    {
        $this->assertEquals(
            [
                'author_name', 
                'author_avatar',
                'author_desc'
            ],
            $this->author->getFillable()
        );
    }

    public function test_books_relation()
    {
        $relation = $this->author->books();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('author_id', $relation->getForeignKeyName());
    }

    public function test_follows_relation()
    {
        $relation = $this->author->follows();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('author_id', $relation->getForeignKeyName());
    }
}
