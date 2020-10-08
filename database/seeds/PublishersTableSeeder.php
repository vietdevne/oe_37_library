<?php

use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublishersTableSeeder extends Seeder
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
            Publisher::create([
                'pub_name' => $faker->company(),
                'pub_logo' => $faker->safeColorName(),
                'pub_desc' => $faker->realText($maxNbChars = 200, $indexSize = 2),
            ]);
        }
    }
}
