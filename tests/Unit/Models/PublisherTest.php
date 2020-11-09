<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PublisherTest extends TestCase
{
    protected $publisher;
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
        $this->publisher = new publisher();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->publisher);
    }

    public function test_table_name()
    {
        $this->assertEquals('publishers', $this->publisher->getTable());
    }

    public function test_key_name()
    {
        $this->assertEquals('pub_id', $this->publisher->getKeyName());
    }

    public function test_fillable()
    {
        $this->assertEquals(
            [
                'pub_name', 
                'pub_logo',
                'pub_desc'
            ],
            $this->publisher->getFillable()
        );
    }

    public function test_books_relation()
    {
        $relation = $this->publisher->books();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('pub_id', $relation->getForeignKeyName());
    }

}
