<?php

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::middleware(App\Http\Middleware\HarusMasuk::class)->group(function(){


	Route::get('/home', 'HomeController@index')->name('home');

	Route::resource('pengeluaran', 'PengeluaranController')->only('store', 'index', 'destroy');
	Route::resource('pemasukan', 'PemasukanController')->only('store', 'index', 'destroy');
	Route::match(['get', 'post'], '/statistik', 'StatistikController')->name('statistik.index');
	Route::get('/profil', 'HomeController@profil')->name('profil');
	Route::put('/profil', 'HomeController@perbarui')->name('perbarui');
	Route::get('/masukan', 'HomeController@masukan')->name('masukan.index');
	Route::post('/masukan', 'HomeController@masukanPost');
	
});