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
    return view('template.awal');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=> ['CheckRole:admin']], function(){
        //admin
        Route::get('/dashboardadmin', 'AdminController@dashboardadmin')->name('dashboardadmin');
});


Route::get('/menu', 'AdminController@menunya')->name('menunya');
Route::post('/tambahmenu', 'AdminController@tambahmenu')->name('tambahmenu');
Route::post('/editmenu', 'AdminController@editmenu')->name('editmenu');
Route::get('/deletemenu/{id}', 'AdminController@deletemenu')->name('deletemenu');
Route::put('/menu/update/{id_menu}', 'AdminController@update')->name('update');
Route::get('/edit/{id}', 'AdminController@edit')->name('edit')->name('edit');
Route::get('/pdfmenu', 'AdminController@cetak_pdf')->name('cetak_pdf');
Route::get('/user', 'AdminController@usernya')->name('usernya');
Route::get('/pdfuser', 'AdminController@pdf')->name('pdf');


//kasir
Route::group(['middleware' => ['auth', 'CheckRole:kasir']], function () {
    Route::get('/orderan', 'KasirController@orderan')->name('orderan');
    Route::get('/orderanpdf', 'KasirController@orderanpdf')->name('orderanpdf');
});

Route::group(['middleware' => ['auth', 'CheckRole:kasir']], function () {
    Route::resource('order', 'KasirController');
});

Route::group(['middleware'=> ['CheckRole:kasir']], function(){
    //kasir
Route::get('/dashboardkasir', 'KasirController@dashboardkasir')->name('dashboardkasir');
});

// crud table barang ke transaksi
Route::post('/carshier', 'KasirController@store');

Route::get('/invoice', 'KasirController@invoice')->name('invoice');
Route::get('/delete/{id_transaksi}', 'KasirController@delete')->name('delete');