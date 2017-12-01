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
    if(Auth::user()){
        return redirect('/beranda');
    }
    return view('pages.login');
});

//error handling double login
Route::get('/home', function () {
    return redirect('/beranda');
});

//routing untuk sidebar
Route::get('/post', 'DashboardController@post')->name('pages.post');
Route::get('/beranda', 'DashboardController@beranda')->name('pages.beranda');
Route::get('/nilai', 'DashboardController@nilai')->name('pages.nilai');
Route::get('/absen', 'DashboardController@absen')->name('pages.absen');
Route::get('/timeline', 'DashboardController@timeline')->name('pages.timeline');
Route::get('/tambah-administrator', 'DashboardController@tambahadmin')->name('pages.tambah-administrator');
Route::get('/tambah-sr', 'DashboardController@tambahsr')->name('pages.tambah-sr');
Route::get('/tambah-mahasiswa', 'DashboardController@tambahmahasiswa')->name('pages.tambah-mahasiswa');

// Route::get('/templates', function () {
//     return view('templates.dashboard');
// });

Auth::routes();

Route::get('/table', function () {
    return view('pages.table');
});

Route::post('/tambah-administrator', 'TambahUserController@administrator')->name('tambahuser.administrator');
Route::post('/tambah-sr', 'TambahUserController@sr')->name('tambahuser.sr');
Route::post('/tambah-mahasiswa', 'TambahUserController@mahasiswa')->name('tambahuser.mahasiswa');

// Route::get('/loginz', function () {
//     return view('auth.login');
// });