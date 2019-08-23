<?php
Route::group(['prefix' => 'perusahaan', 'namespace' => 'perusahaan', 'as' => 'perusahaan.', 'middleware' => ['auth', 'roles'], 'roles' => 'perusahaan'], function(){
    Route::group(['prefix' => 'lowongan', 'namespace' => 'lowongan', 'as' => 'lowongan.'], function(){
        /*Route Data Lowongan */
        Route::get('/', 'LowonganController@showListLowongan')->name('index');
        Route::get('/tambah', 'LowonganController@showTambahLowongan')->name('tambah');
        Route::get('/getData', 'LowonganController@getData')->name('getdata');
        Route::get('/getDokumen/{mahasiswa_id}', 'LowonganController@getDokumen')->name('getdoc');
        Route::get('/detail/{lowongan_id}', 'LowonganController@showDetailLowongan')->name('detail');
        Route::get('/edit/{lowongan_id}', 'LowonganController@showEdit')->name('showEdit');

        Route::post('/save', 'LowonganController@save')->name('save');
        Route::post('/update', 'LowonganController@update')->name('update');
        Route::post('/saveRespon', "LowonganController@saveRespon")->name('saveRespon');
        Route::post('/updateStatus', "LowonganController@updateStatus")->name('updateStatus');
        Route::post('/tambahMasaBerlaku', "LowonganController@tambahMasaBerlaku")->name('tambahMasaBerlaku');
    });
});
