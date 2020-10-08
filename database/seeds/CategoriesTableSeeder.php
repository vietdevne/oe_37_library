<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            Category::create([
                'cate_name' => $faker->company(),
                'cate_desc' =>$faker->text($maxNbChars = 200),
                'parent_id' => $faker->numberBetween($min = 1, $max = 10),
            ]);
        }
    }
}
