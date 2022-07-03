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

Route::get('/home', 'HomeController@index')->name('home');

// Petugas/perawat
Route::get('petugas/perawat','Petugas\PerawatController@index')->name('petugas.perawat');
Route::get('petugas/perawat/create','Petugas\PerawatController@create')->name('petugas.perawat.create');
Route::post('petugas/perawat/store','Petugas\PerawatController@store')->name('petugas.perawat.store');

Route::get('petugas/pasien','Petugas\PaseienController@index')->name('petugas.pasien');
Route::get('petugas/pasien/create','Petugas\PaseienController@create')->name('petugas.pasien.create');
Route::post('petugas/pasien/store','Petugas\PaseienController@store')->name('petugas.pasien.store');

Route::get('petugas/dokter','Petugas\DokterController@index')->name('petugas.dokter');
Route::get('petugas/dokter/create','Petugas\DokterController@create')->name('petugas.dokter.create');
Route::post('petugas/dokter/store','Petugas\DokterController@store')->name('petugas.dokter.store');

// Petugas/CTT_Perawat
Route::get('petugas/ctt_perawat/{id}','Petugas\CTTPerawatController@index')->name('petugas.ctt_perawat');
Route::post('petugas/ctt_perawat/store','Petugas\CTTPerawatController@store')->name('petugas.ctt_perawat.store');

// Perawat/CTT_Perawat
Route::get('perawat/ctt_perawat','perawat\CTTPerawatController@index')->name('perawat.ctt_perawat');
Route::get('perawat/ctt_perawat/{id}','perawat\CTTPerawatController@edit')->name('perawat.ctt_perawat.edit');
Route::post('perawat/ctt_perawat/{id}','perawat\CTTPerawatController@update')->name('perawat.ctt_perawat.update');
Route::post('perawat/ctt_perawat/{id}/verifikasi','perawat\CTTPerawatController@verifikasi')->name('perawat.ctt_perawat.verifikasi');

// Dokter/Rawat
// Perawat/CTT_Perawat
Route::get('dokter/rawat','Dokter\CTTController@index')->name('dokter.rawat');
Route::get('dokter/rawat/{id}','Dokter\CTTController@edit')->name('dokter.rawat.edit');
Route::post('dokter/rawat/{id}','Dokter\CTTController@update')->name('dokter.rawat.update');