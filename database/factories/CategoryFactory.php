<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'cate_name' => ''.$faker->name.'',
        'cate_desc' => str_random(10),
        'parent_id' => '1',
    ];
});
