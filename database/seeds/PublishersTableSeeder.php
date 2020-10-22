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
                'pub_name' => 'Nhà xuất bản ' . $i,
                'pub_desc' => 'Đối tượng phục vụ của Nhà xuất bản là các em từ tuổi 
                nhà trẻ mẫu giáo (1 đến 5 tuổi), nhi đồng (6 đến 9 tuổi), 
                thiếu niên (10 đến 15 tuổi) đến các em tuổi mới lớn (16 đến 18 tuổi) 
                và các bậc phụ huynh.',
            ]);
        }
    }
}
