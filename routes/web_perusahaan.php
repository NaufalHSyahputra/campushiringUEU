<?php
Route::group(['prefix' => 'perusahaan', 'namespace' => 'perusahaan', 'as' => 'perusahaan.', 'middleware' => ['auth', 'roles'], 'roles' => 'perusahaan'], function(){
    Route::group(['prefix' => 'lowongan', 'namespace' => 'lowongan', 'as' => 'lowongan.'], function(){
        /*Route Data Lowongan */
        Route::get('/', 'LowonganController@showListLowongan')->name('index');
        Route::get('/tambah', 'LowonganController@showTambahLowongan')->name('tambah');
        Route::get('/getData', 'LowonganController@getData')->name('getdata');
        Route::get('/detail/{lowongan_id}', 'LowonganController@showDetailLowongan')->name('detail');

        Route::post('/save', 'LowonganController@save')->name('save');
    });
});
