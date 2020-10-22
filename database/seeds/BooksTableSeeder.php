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
                'cate_id' => $faker->numberBetween($min = 1, $max = 3),
                'book_title' => 'Đời ngắn đừng ngủ dài ' . $i,
                'book_desc' => 'Đời Ngắn Đừng Ngủ Dài là những ghi chép, những trải nghiệm và suy ngẫm của tác giả về cuộc đời',
                'quantity' => $faker->numberBetween($min = 50, $max = 100),
            ]);
        }
    }
}
