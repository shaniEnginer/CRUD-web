<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|s
*/


Auth::routes([
'verify'=>true,
]);
Route::get('/dashbord', 'dashbordController@index')->name('dashbord');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/user', 'usercontroller@index');
Route::get('/posts', 'Postcontroller@index')->name('posts.index');
Route::get('/post/create', 'Postcontroller@create')->name('posts.create');
Route::resource('posts' ,'Postcontroller');
Route::get('/profile', 'dashbordController@getprofile')->name('profile.get');
Route::post('/profile', 'dashbordController@postprofile')->name('profile.post');
Route::get('/cart' , 'cartController@index')->name('cart.index');