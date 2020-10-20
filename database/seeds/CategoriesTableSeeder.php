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
        $categories = [
        [
            'cate_name' => 'Văn Học',
            'cate_desc' => 'Mua online sách văn học và tiểu thuyết nhanh và an toàn nhất tại Bookbuy. Đổi trả hàng miễn phí. Giao hàng cực nhanh',
            'parent_id' => null,
        ], [
            'cate_name' => 'Văn học Việt Nam',
            'cate_desc' => 'Mua online sách văn học và tiểu thuyết nhanh và an toàn nhất tại Bookbuy. Đổi trả hàng miễn phí. Giao hàng cực nhanh',
            'parent_id' => 1,
        ], [
            'cate_name' => 'Văn học nước ngoài',
            'cate_desc' => 'Mua online sách văn học và tiểu thuyết nhanh và an toàn nhất tại Bookbuy. Đổi trả hàng miễn phí. Giao hàng cực nhanh',
            'parent_id' => 1,
        ]
    ];
    foreach($categories as $cat) {
        Category::create($cat);
    }
    }
}
