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
})->name('home');

Auth::routes();



//Route Grup for Admin
Route::group(['as'=>'admin.','prefex'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function()
{
    Route::get('admin/dashboard','DashboardController@index')->name('dashboard');

    Route::resource('admin/tag','TagController');
});

//Route Grup for Author
Route::group(['as'=>'author.','prefex'=>'author','namespace'=>'Author','middleware'=>['auth','author']], function()
{
    Route::get('author/dashboard','DashboardController@index')->name('dashboard');
});