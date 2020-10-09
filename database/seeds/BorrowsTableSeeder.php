<?php

use Illuminate\Database\Seeder;
use App\Models\Borrow;

class BorrowsTableSeeder extends Seeder
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
            Borrow::create([
                'user_id' => $faker->numberBetween($min = 1, $max = 10),
                'book_id' => $faker->numberBetween($min = 1, $max = 10),
                'borr_status' => $faker->numberBetween($min = 0, $max = 1),
                'borr_from_date' => $faker->dateTime($max = 'now', $timezone = null),
                'borr_to_date' => $faker->dateTime($max = 'now', $timezone = null),
                'borr_return_date' => $faker->dateTime($max = 'now', $timezone = null),
            ]);
        }
    }
}
