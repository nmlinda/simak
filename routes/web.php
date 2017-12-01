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
    return view('pages.login');
});

// Route::get('/beranda', function () {
//     return view('pages.beranda');
// });

//routing untuk sidebar
Route::get('/post', 'DashboardController@post')->name('pages.post');
Route::get('/beranda', 'DashboardController@beranda')->name('pages.beranda');
Route::get('/nilai', 'DashboardController@nilai')->name('pages.nilai');
Route::get('/absen', 'DashboardController@absen')->name('pages.absen');
Route::get('/timeline', 'DashboardController@timeline')->name('pages.timeline');
Route::get('/tambah-user', 'DashboardController@tambahuser')->name('pages.tambah-user');

// Route::get('/templates', function () {
//     return view('templates.dashboard');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/table', function () {
    return view('pages.table');
});