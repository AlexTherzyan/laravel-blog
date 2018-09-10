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

Route::get('/', 'HomeController@index' );


<<<<<<< HEAD
Route::group(['prefix' => 'admin','namespace' => 'Admin'], function (){

    Route::get('/', 'DashBoardController@index');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/posts', 'PostsController');
});

=======

Route::group(['prefix' => 'admin','namespace' => 'Admin'], function (){

    Route::get('/', 'DashBoardController@index');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/posts', 'PostsController');
});

>>>>>>> 7f247987a1e1fdab82e79257e5a96c2bd1c6a3f7
