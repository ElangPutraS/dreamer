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
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('cover');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/ea', function () {
    return view('admin.kelas');
});

Route::get('/asd', function () {
    return view('admin.file');
});

Auth::routes();

Route::resource('daftar', 'StudentController');
Route::resource('kelas', 'KelasController');
Route::resource('User', 'HomeController');

//Route::post('Homepage', 'StudentController@login')->name('daftar.login');
Route::get('Homepage', 'HomeController@homepage');
Route::get('Homepage/show_class/{id}', 'HomeController@show_class')->name('User.showClass');
Route::get('Homepage/{id}', 'HomeController@download_tes_peserta')->name('User.tesPeserta');
Route::get('Homepage/daftar/{id}/{kelas}', 'HomeController@daftar_kelas')->name('User.daftar');
Route::post('Homepage/daftar/{id}/{kelas}/submit', 'HomeController@store_partisipan')->name('User.daftarPartisipan');
Route::post('Homepage/daftar/{id}/{kelas}/pembyaran', 'HomeController@store_partisipan_pembayaran')->name('User.pembayaran');

Route::prefix('admin')->group(function() {
	Route::get('/', 'AdminController@index')->name('admin.dashboard');

	Route::get('/show_partisipan/file/{id}', 'AdminController@download_file_peserta')->name('admin.filePeserta');
	Route::get('/show_partisipan/bukti/{id}', 'AdminController@download_bukti_peserta')->name('admin.buktiPeserta');
	
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

	Route::get('/create_class', 'AdminController@create_class')->name('admin.createClass');
	
	Route::post('/store_class', 'AdminController@store_class')->name('admin.storeClass');
	
	Route::get('/show_class/{id}', 'AdminController@show_class')->name('admin.showClass');
	Route::get('/show_partisipan/{id}', 'AdminController@show_partisipan')->name('admin.showPartisipan');
	
	Route::get('/edit_class/{id}', 'AdminController@edit_class')->name('admin.editClass');
	
	Route::DELETE('/edit_class/destroy/{id}', 'AdminController@destroy_class')->name('admin.deleteClass');
	Route::DELETE('/show_partisipan/destroy/{id}', 'AdminController@destroy_partisipan')->name('admin.deletePartisipan');
	
	Route::post('/edit_class/{id}/update', 'AdminController@update_class')->name('admin.updateClass');
	Route::get('/show_partisipan/{id}/validate_test', 'AdminController@validasi_pengerjaan')->name('admin.validasiPengerjaan');
	Route::get('/show_partisipan/{id}/validate_payment', 'AdminController@validasi_pembayaran')->name('admin.validasiPembayaran');
});
// Route::get('Loginpage', 'StudentController@loginpage')->name('daftar.loginpage');
// Route::get('Homepage/logout', 'StudentController@logout')->name('daftar.logout');