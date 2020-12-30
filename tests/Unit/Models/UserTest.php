<?php

namespace Tests\Unit\Models;

use Tests\ModelTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Follow;
use App\Models\Borrow;
use App\Models\Like;
use App\Models\Review;

class UserTest extends ModelTestCase
{
    public function test_model_configuration()
    {
        $this->runConfigurationAssertions(new User(), [
            'username',
            'email',
            'password',
            'fullname',
            'birthday',
            'phone',
            'email', 
            'gender',
            'role',
            'provider',
            'provider_id',
        ],[
            'password', 'remember_token',
        ]);
    }
    public function test_primaryKey()
    {
        $this->assertPrimaryKey('user_id', new User());
    }

    public function test_follows_relation()
    {
        $m = new User();
        $r = $m->follows();
        $this->assertHasManyRelation($r, $m, new Follow(), 'user_id');
    }

    public function test_borrows_relation()
    {
        $m = new User();
        $r = $m->borrows();
        $this->assertHasManyRelation($r, $m, new Borrow(), 'user_id');
    }

    public function test_liked_relation()
    {
        $m = new User();
        $r = $m->liked();
        $this->assertHasManyRelation($r, $m, new Like(), 'user_id');
    }

    public function test_reviews_relation()
    {
        $m = new User();
        $r = $m->reviews();
        $this->assertHasManyRelation($r, $m, new Review(), 'user_id');
    }
}
