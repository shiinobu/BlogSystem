<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('Post', 'PostController');
Route::resource('Kategori', 'KategoriController');
Route::resource('Tag', 'TagController');

//Route untuk mengambil data dari Tabel Pivot (KategoriPost dan TagPost)
Route::get('KategoriPost', 'KategoriPostController@index');
Route::get('TagPost', 'TagPostController@index');