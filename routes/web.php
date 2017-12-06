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
 
Route::post('/tambah-administrator', 'TambahUserController@administrator')->name('tambahuser.administrator');
Route::post('/tambah-sr', 'TambahUserController@sr')->name('tambahuser.sr');
Route::post('/tambah-mahasiswa', 'TambahUserController@mahasiswa')->name('tambahuser.mahasiswa');
 
// Route::get('/loginz', function () {
//     return view('auth.login');
// });
 
Route::post('/absen/tambah', 'KegiatanController@tambah_kegiatan')->name('tambah_kegiatan');
// Route::post('/absen', 'SolongController@tambah_solong')->name('tambah_solong');
// Route::post('/absen', 'NgadungController@tambah_ngadung')->name('tambah_ngadung');
// Route::post('/absen', 'NgalongController@tambah_ngalong')->name('tambah_ngalong');
// Route::post('/absen', 'ApelController@tambah_apel')->name('tambah_apel');
// Route::post('/absen', 'HBAController@tambah_HBA')->name('tambah_HBA');