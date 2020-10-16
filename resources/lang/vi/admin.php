<?php

return [
    'home' => 'Trang quản lý',
    'categories' => 'Danh mục',
    'users' => 'Người dùng',
    'authors' => 'Tác giả',
    'publishers' => 'Nhà xuất bản',
    'books' => 'Sách',
    'borrows' => 'Mượn - trả',
    'reviews' => 'Đánh giá - bình luận',
    'author_table' => [
        'title_table' => 'Danh sách tác giả',
        'id_col' => 'ID',
        'name_col' => 'Tên tác giả',
        'avatar_col' => 'Ảnh',
        'desc_col' => 'Thông tin tác giả',
    ],
    'author_form' => [
        'title_add_form' => 'Thêm tác giả',
        'title_edit_form' => 'Sửa tác giả',
        'label_name' => 'Tên tác giả:',
        'label_avatar' => 'Ảnh:',
        'label_desc' => 'Thông tin tác giả: '
    ],
    'validate_author' => [
        'name_required' => 'Không được để trống tên tác giả!',
        'name_unique' => 'Tên tác giả đã tồn tại!',
        'author_desc' => 'Không được để trống thông tin tác giả!',
        'author_avatar' => 'Không để ảnh trống',
    ],
    'actions' => [
        'new' => '+ Thêm mới',
        'edit' => 'Sửa',
        'delete' => 'Xóa',
    ],
    'publisher_table' => [
        'title_table' => 'Danh sách nhà xuất bản',
        'id_col' => 'ID',
        'name_col' => 'Tên nhà xuất bản',
        'logo_col' => 'Logo',
        'desc_col' => 'Thông tin nhà xuất bản',
    ],
    'publisher_form' => [
        'title_add_form' => 'Thêm Nhà xuất bản',
        'title_edit_form' => 'Sửa Nhà xuất bản',
        'label_name' => 'Tên Nhà xuất bản:',
        'label_avatar' => 'Logo:',
        'label_desc' => 'Thông tin Nhà xuất bản: '
    ],
    'validate_publisher' => [
        'name_required' => 'Không được để trống tên Nhà xuất bản!',
        'name_unique' => 'Tên Nhà xuất bản đã tồn tại!',
        'pub_desc' => 'Không được để trống thông tin Nhà xuất bản!',
        'pub_logo' => 'Không để ảnh trống',
    ],
];
