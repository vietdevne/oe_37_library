<?php

namespace Tests\Unit\Models;

use Tests\ModelTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;

class BorrowTest extends ModelTestCase
{
    public function test_model_configuration()
    {
        $this->runConfigurationAssertions(new Borrow(), [
            'user_id',
            'book_id',
            'borr_status',
            'borrow_date',
            'return_date',
            'note',
        ]);
    }
    public function test_primaryKey()
    {
        $this->assertPrimaryKey('borr_id', new Borrow());
    }

    public function test_user_relation()
    {
        $m = new Borrow();
        $r = $m->user();
        $this->assertBelongsToRelation($r, $m, new User(), 'user_id');
    }

    public function test_book_relation()
    {
        $m = new Borrow();
        $r = $m->book();
        $this->assertBelongsToRelation($r, $m, new Book(), 'book_id');
    }

}
