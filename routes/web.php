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

// Petugas/pasien
Route::get('petugas/pasien','Petugas\PaseienController@index')->name('petugas.pasien');
Route::get('petugas/pasien/create','Petugas\PaseienController@create')->name('petugas.pasien.create');
Route::post('petugas/pasien/store','Petugas\PaseienController@store')->name('petugas.pasien.store');


// Petugas/dokter
Route::get('petugas/dokter','Petugas\DokterController@index')->name('petugas.dokter');
Route::get('petugas/dokter/create','Petugas\DokterController@create')->name('petugas.dokter.create');
Route::post('petugas/dokter/store','Petugas\DokterController@store')->name('petugas.dokter.store');

// Petugas/CTT_Perawat
Route::get('petugas/ctt_perawat/{id}','Petugas\CTTPerawatController@index')->name('petugas.ctt_perawat');
Route::post('petugas/ctt_perawat/store','Petugas\CTTPerawatController@store')->name('petugas.ctt_perawat.store');
Route::get('petugas/ctt_perawat/{id}/show_lab','Petugas\CTTPerawatController@show_lab')->name('petugas.ctt_perawat.show_lab');
Route::get('petugas/ctt_perawat/{id}/show','Petugas\CTTPerawatController@show')->name('petugas.ctt_perawat.show');
Route::get('petugas/ctt_perawat/{id}/print','Petugas\CTTPerawatController@print')->name('petugas.ctt_perawat.print');
Route::post('petugas/ctt_perawat/{id}/verifikasi','Petugas\CTTPerawatController@verifikasi')->name('petugas.ctt_perawat.verifikasi');
Route::get('petugas/lap_ctt_p','Petugas\CTTPerawatController@laporan_cttP')->name('petugas.laporan_ctt_p');
Route::post('petugas/lap_ctt_p/store','Petugas\CTTPerawatController@store_laporan_cttP')->name('petugas.lap_ctt_p.store');

// Petugas/CTT_Persalinan
Route::get('petugas/ctt_persalinan/{id}','Petugas\CTTPersalinanController@index')->name('petugas.ctt_persalinan');
Route::post('petugas/ctt_persalinan/store','Petugas\CTTPersalinanController@store')->name('petugas.ctt_persalinan.store');
Route::get('petugas/ctt_persalinan/{id}/asuhan','Petugas\CTTPersalinanController@asuhan')->name('petugas.ctt_persalinan.asuhan');
Route::get('petugas/lap_ctt_per','Petugas\CTTPersalinanController@laporan_cttPer')->name('petugas.laporan_ctt_per');
Route::post('petugas/lap_ctt_per/store','Petugas\CTTPersalinanController@store_laporan_cttPer')->name('petugas.lap_ctt_per.store');
Route::get('petugas/ctt_persalinan/{id}/print','Petugas\CTTPersalinanController@print')->name('petugas.ctt_persalinan.print');
// Perawat/CTT_Perawat
Route::get('perawat/ctt_perawat','perawat\CTTPerawatController@index')->name('perawat.ctt_perawat');
Route::get('perawat/ctt_perawat/{id}','perawat\CTTPerawatController@edit')->name('perawat.ctt_perawat.edit');
Route::post('perawat/ctt_perawat/{id}','perawat\CTTPerawatController@update')->name('perawat.ctt_perawat.update');
Route::post('perawat/ctt_perawat/{id}/verifikasi','perawat\CTTPerawatController@verifikasi')->name('perawat.ctt_perawat.verifikasi');

// Perawat/CTT_Perawat
Route::get('perawat/ctt_persalinan','perawat\CTTPersalinanController@index')->name('perawat.ctt_persalinan');
Route::get('perawat/ctt_persalinan/{id}','perawat\CTTPersalinanController@edit')->name('perawat.ctt_persalinan.edit');
Route::post('perawat/ctt_persalinan/{id}','perawat\CTTPersalinanController@update')->name('perawat.ctt_persalinan.update');
Route::post('perawat/ctt_persalinan/{id}/verifikasi','perawat\CTTPersalinanController@verifikasi')->name('perawat.ctt_persalinan.verifikasi');

// Dokter/Rawat
Route::get('dokter/rawat/jenis','Dokter\CTTController@jenis')->name('dokter.rawat.jenis');
Route::get('dokter/rawat','Dokter\CTTController@index')->name('dokter.rawat');
Route::get('dokter/rawat/{id}','Dokter\CTTController@edit')->name('dokter.rawat.edit');
Route::post('dokter/rawat/{id}','Dokter\CTTController@update')->name('dokter.rawat.update');
Route::post('dokter/rawat/{id}/lab','Dokter\CTTController@lab')->name('dokter.rawat.lab');
Route::get('dokter/rawat/{id}/show_lab','Dokter\CTTController@show_lab')->name('dokter.rawat.show_lab');
Route::get('dokter/rawat/{id}/show','Dokter\CTTController@show')->name('dokter.rawat.show');
Route::post('dokter/rawat/{id}/verifikasi','Dokter\CTTController@verifikasi')->name('dokter.rawat.verifikasi');
Route::get('dokter/rawat/{id}/jalan','Dokter\CTTController@jalan')->name('dokter.rawat.jalan');

// Dokter/Asuhan
Route::get('dokter/asuhan','Dokter\CTTPersalinanController@index')->name('dokter.asuhan');
Route::get('dokter/asuhan/{id}','Dokter\CTTPersalinanController@edit')->name('dokter.asuhan.edit');
Route::post('dokter/asuhan/{id}','Dokter\CTTPersalinanController@update')->name('dokter.asuhan.update');
Route::post('dokter/asuhan/{id}/verifikasi','Dokter\CTTPersalinanController@verifikasi')->name('dokter.asuhan.verifikasi');
Route::get('dokter/asuhan/{id}/show','Dokter\CTTPersalinanController@show')->name('dokter.asuhan.show');
// Route::get('dokter/rawat','Dokter\CTTController@index')->name('dokter.rawat');
// Route::post('dokter/rawat/{id}/lab','Dokter\CTTController@lab')->name('dokter.rawat.lab');
// Route::get('dokter/rawat/{id}/show_lab','Dokter\CTTController@show_lab')->name('dokter.rawat.show_lab');
// Route::get('dokter/rawat/{id}/jalan','Dokter\CTTController@jalan')->name('dokter.rawat.jalan');