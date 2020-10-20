<?php

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
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
            Book::create([
                'author_id' => $faker->numberBetween($min = 1, $max = 10),
                'pub_id' => $faker->numberBetween($min = 1, $max = 10),
                'cate_id' => $faker->numberBetween($min = 1, $max = 10),
                'book_title' => $faker->text($maxNbChars = 40),
                'book_desc' => $faker->text($maxNbChars = 40),
                'unit_price' => $faker->numberBetween($min = 10000, $max = 99999),
                'book_info' => $faker->text($maxNbChars = 40),
            ]);
        }
    }
}
