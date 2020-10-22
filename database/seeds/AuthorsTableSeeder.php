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
        for ($i = 0; $i < 10; $i++) {
            Author::create([
                'author_name' => 'Nguyễn Ngọc Ngạn '. $i,
                'author_desc' => 'Người mang truyện ma tới làng văn học Việt Nam ' . $i,
            ]);
        }
    }
}
