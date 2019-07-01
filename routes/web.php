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
    return view('umum/welcome');
});

Route::group(['prefix' => 'menumakanan'], function(){
    Route::get('/', 'Master\productController@index')->name('menumakanan');

});
Auth::routes();


Route::get('/cariproduk', 'Master\productController@cariproduk')->name('cariproduk');


//Login
Route::get('/login','auth\LoginController@login')->name('login');
Route::post('/postlogin','auth\LoginController@postlogin');
Route::get('/logout','auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'],function(){


Route::get('/admin', function () {
    return view('/admin/menuawal');
})->name('admin');


Route::get('/produk', function () {
    return view('/admin/master/dataproduk');
})->name('produk');

Route::get('/user', function () {
    return view('/admin/master/datauser');
})->name('user');

Route::get('/kategori', function () {
    return view('/admin/master/datakategori');
})->name('kategori');






});

Route::get('/home', 'HomeController@index')->name('home');
