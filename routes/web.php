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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', function(){return view('home');})->name('home');
//Route::get('/about', function(){return view('about');})->name('about');
//Route::get('/blog', function(){return view('blog');})->name('blog');

//route for navbar
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/blog', 'HomeController@blog')->name('blog');
//route for navbar

Route::get('/blog/create','BlogController@create')->name('blog.create');

Route::post('/blog','BlogController@store')->name('blog.store'); //store data blog ke database

Route::get('/blog/{id}/edit','BlogController@edit')->name('blog.edit'); //get id blog
Route::put('/blog','BlogController@update')->name('blog.update'); //update blog
Route::get('/myBlog','BlogController@index')->name('blog.index'); //tampil index
Route::delete('/blog','BlogController@delete')->name('blog.delete'); //route delete blog
Route::get('/blog/{id}/show','BlogController@show')->name('blog.show'); //route show detail blog
Route::get('/dashboard','BlogController@dashboard')->name('blog.dashboard'); //route to dashboard for admin
Route::post('/blog{id}/reject','BlogController@reject')->name('blog.reject'); 
Route::post('/blog{id}/accept','BlogController@accept')->name('blog.accept');

//category
Route::get('/category','CategoryController@index')->name('category.index');
//buat data category
Route::get('/category/create','CategoryController@create')->name('category.create');
Route::post('/category','CategoryController@store')->name('category.store');
//buat delete category
Route::delete('/category','CategoryController@delete')->name('category.delete');

