<?php

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorsTableSeeder extends Seeder
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
            Author::create([
                'author_name' => $faker->name(),
                'author_desc' => $faker->text($maxNbChars = 100),
            ]);
        }
    }
}
