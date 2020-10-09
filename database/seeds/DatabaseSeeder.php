<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(PublishersTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(BorrowsTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(FollowsTableSeeder::class);
    }
}
