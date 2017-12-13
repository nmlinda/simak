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
    return view('pages.homepage');
 });

// Route::get('/login', function () {
//    return view('pages.login');
// });

//error handling double login
Route::get('/home', function () {
   return redirect('/beranda');
});

//routing untuk homepage
Route::get('/login', 'HomepageController@login')->name('login');

 //route validasi login
// Route::middleware('auth')->group(function(){

//routing untuk sidebar
Route::get('/beranda', 'DashboardController@beranda')->name('pages.beranda');
Route::get('/post-buat', 'DashboardController@post')->name('pages.post-buat');
Route::get('/post-saya', 'DashboardController@post_saya')->name('pages.post-saya');
Route::get('/post-semua', 'DashboardController@post_semua')->name('pages.post-semua');
Route::get('/nilai', 'DashboardController@nilai')->name('pages.nilai');
Route::get('/absen/tambah', 'DashboardController@absen')->name('pages.absen');
Route::get('/absen/lihat', 'DashboardController@absen_lihat')->name('pages.absen/lihat');
Route::get('/absen/edit', 'DashboardController@absen_edit')->name('pages.absen/edit');
Route::get('/timeline', 'DashboardController@timeline')->name('pages.timeline');
Route::get('/tambah-administrator', 'DashboardController@tambahadmin')->name('pages.tambah-administrator');
Route::get('/tambah-sr', 'DashboardController@tambahsr')->name('pages.tambah-sr');
Route::get('/tambah-mahasiswa', 'DashboardController@tambahmahasiswa')->name('pages.tambah-mahasiswa');
// Route::get('/test', 'DashboardController@test')->name('test');

// Route::get('/templates', function () {
//     return view('templates.dashboard');
// });

Auth::routes();

Route::get('/table', function () {
   return view('pages.table');
});

Route::get('/test', function () {
   return view('test');
});

 // route untuk post
 Route::post('/post-buat', 'PostController@store')->name('pages.post-store');
 Route::get('/post/{post}/edit', 'PostController@edit')->name('pages.post-edit');
 Route::patch('/post/{post}/edit', 'PostController@update')->name('pages.post-update');
 Route::delete('/post/{post}/hapus', 'PostController@hapus')->name('pages.post-hapus');
 Route::get('/post/{post}', 'PostController@detail')->name('pages.post-detail');
 Route::get('/post-saya/hasil', 'PostController@cariSaya')->name('pages.post-saya-hasil');
 Route::get('/post-semua/hasil', 'PostController@cariSemua')->name('pages.post-semua-hasil');
 

//route untuk tambah user
Route::post('/tambah-administrator', 'TambahUserController@administrator')->name('tambahuser.administrator');
Route::post('/tambah-sr', 'TambahUserController@sr')->name('tambahuser.sr');
Route::post('/tambah-mahasiswa', 'TambahUserController@mahasiswa')->name('tambahuser.mahasiswa');

// Route::get('/loginz', function () {
//     return view('auth.login');
// });

//route untuk absen
Route::post('/absen/tambah', 'KegiatanController@tambah_kegiatan')->name('tambah_kegiatan');
Route::patch('/absen/lihat', 'KegiatanController@editAbsen')->name('editAbsen');

Route::get('/password/edit', 'UserController@ganti_password')->name('ganti_password');
Route::patch('/password/edit', 'UserController@update_password')->name('update_password');
Route::patch('/beranda', 'UserController@edit_user')->name('edit_user');
Route::delete('/beranda', 'UserController@destroy')->name('user.destroy');
// Route::post('/absen', 'SolongController@tambah_solong')->name('tambah_solong');
// Route::post('/absen', 'NgadungController@tambah_ngadung')->name('tambah_ngadung');
// Route::post('/absen', 'NgalongController@tambah_ngalong')->name('tambah_ngalong');
// Route::post('/absen', 'ApelController@tambah_apel')->name('tambah_apel');
// Route::post('/absen', 'HBAController@tambah_HBA')->name('tambah_HBA');

//});