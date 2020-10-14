<?php

return [
    'home' => 'Dashboard',
    'categories' => 'Categories',
    'users' => 'Users',
    'authors' => 'Authors',
    'publishers' => 'Publishers',
    'books' => 'Books',
    'borrows' => 'Borrows',
    'reviews' => 'Reviews',
    'author_table' => [
        'title_table' => 'List Authors',
        'id_col' => 'ID',
        'name_col' => 'Name',
        'avatar_col' => 'Avatar',
        'desc_col' => 'Author description',
    ],
    'author_form' => [
        'title_add_form' => 'Add author',
        'title_edit_form' => 'Edit author',
        'label_name' => 'Author name:',
        'label_avatar' => 'Avartar:',
        'label_desc' => 'Description:',
    ],
    'validate_author' => [
        'name_required' => 'Do not leave the login field blank',
        'name_unique' => 'Author name already exists',
        'author_desc' => 'Do not leave the login field blank',
        'author_avatar' => 'Do not leave the image',
    ],
    'actions' => [
        'new' => '+ New',
        'edit' => 'Edit',
        'delete' => 'Delete',
    ],
    'publisher_table' => [
        'title_table' => 'List Publishers',
        'id_col' => 'ID',
        'name_col' => 'Name',
        'logo_col' => 'Logo',
        'desc_col' => 'Publisher description',
    ],
    'publisher_form' => [
        'title_add_form' => 'Add publisher',
        'title_edit_form' => 'Edit publisher',
        'label_name' => 'Publisher name:',
        'label_avatar' => 'Logo:',
        'label_desc' => 'Publisher description:'
    ],
    'validate_publisher' => [
        'name_required' => 'Do not leave the login field blank',
        'name_unique' => 'Publisher name already exists',
        'pub_desc' => 'Do not leave the login field blank',
        'pub_logo' => 'Do not leave the image',
    ],
];
