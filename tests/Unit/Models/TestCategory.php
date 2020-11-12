<?php

namespace Tests\Unit\Models;

use Tests\ModelTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\Models\Book;

class TestCategory extends ModelTestCase
{
    public function test_model_configuration()
    {
        $this->runConfigurationAssertions(new Borrow(), [
            'cate_name',
            'cate_desc',
            'parent_id',
        ]);
    }
    public function test_primaryKey()
    {
        $this->assertPrimaryKey('cate_id', new Borrow());
    }

    public function test_books_relation()
    {
        $m = new Category();
        $r = $m->books();
        $this->assertHasManyRelation($r, $m, new Book(), 'cate_id');
    }

    public function test_children_relation()
    {
        $m = new Category();
        $r = $m->children();
        $this->assertHasManyRelation($r, $m, new Category(), 'cate_id');
    }

    public function test_parent_relation()
    {
        $m = new Category();
        $r = $m->parent();
        $this->assertBelongsToRelation($r, $m, new Category(), 'cate_id');
    }
}
