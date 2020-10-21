<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'can:accessAdmin'])
    ->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('index');   
    Route::resources([
        'authors' => 'AuthorController',
        'publishers' => 'PublisherController',
    ]);
    
    Route::resource('users', 'UserController', ['only' => [
        'index', 'edit', 'update', 'destroy'
    ]]);   

    Route::resource('categories', 'CategoryController', ['except' => [
        'show'
    ]]);    
    Route::get('publishers-export', 'PublisherController@export')->name('publishers.export');
    Route::get('authors-export', 'AuthorController@export')->name('authors.export');
    Route::get('users-export', 'UserController@export')->name('users.export');
    
});
