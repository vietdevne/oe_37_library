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
            ], [
                'cate_name' => 'Truyện kinh dị',
                'cate_desc' => 'Mua online sách văn học và tiểu thuyết nhanh và an toàn nhất tại Bookbuy. Đổi trả hàng miễn phí. Giao hàng cực nhanh',
                'parent_id' => null,
            ], [
                'cate_name' => 'Truyện ma hiện đại',
                'cate_desc' => 'Mua online sách văn học và tiểu thuyết nhanh và an toàn nhất tại Bookbuy. Đổi trả hàng miễn phí. Giao hàng cực nhanh',
                'parent_id' => 4,
            ], [
                'cate_name' => 'Truyện ma dân gian',
                'cate_desc' => 'Mua online sách văn học và tiểu thuyết nhanh và an toàn nhất tại Bookbuy. Đổi trả hàng miễn phí. Giao hàng cực nhanh',
                'parent_id' => 4,
            ], [
                'cate_name' => 'Tiểu thuyết',
                'cate_desc' => 'Mua online sách văn học và tiểu thuyết nhanh và an toàn nhất tại Bookbuy. Đổi trả hàng miễn phí. Giao hàng cực nhanh',
                'parent_id' => null,
            ], [
                'cate_name' => 'Tiểu thuyết kỳ ảo',
                'cate_desc' => 'Mua online sách văn học và tiểu thuyết nhanh và an toàn nhất tại Bookbuy. Đổi trả hàng miễn phí. Giao hàng cực nhanh',
                'parent_id' => 7,
            ], [
                'cate_name' => 'Tiểu thuyết phiêu lưu',
                'cate_desc' => 'Mua online sách văn học và tiểu thuyết nhanh và an toàn nhất tại Bookbuy. Đổi trả hàng miễn phí. Giao hàng cực nhanh',
                'parent_id' => 7,
            ],
        ];
        foreach($categories as $cat) {
            Category::create($cat);
        }
    }
}
