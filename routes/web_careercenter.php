<?php
Route::group(['prefix' => 'careercenter', 'namespace' => 'careercenter', 'as' => 'careercenter.', 'middleware' => ['auth', 'roles'], 'roles' => 'Career Center'], function(){
    Route::group(['prefix' => 'lowongan', 'namespace' => 'lowongan', 'as' => 'lowongan.'], function(){
        Route::group(['prefix' => 'verify', 'as' => 'verify.'], function(){
        /*Route Data Lowongan */
        Route::get('/', 'VerifyController@index')->name('index');
        Route::get('/getData', 'VerifyController@getData')->name('getdata');
        Route::get('/getDokumen/{low_req_id}', 'VerifyController@getDokumen')->name('getdokumen');

        Route::post('/save', 'VerifyController@save')->name('save');
    });
    Route::group(['prefix' => 'masaberlaku', 'as' => 'masaberlaku.'], function(){
        /*Route Data Lowongan */
        Route::get('/', 'MasaBerlakuController@index')->name('index');
    });
});
Route::group(['prefix' => 'mahasiswa', 'namespace' => 'mahasiswa', 'as' => 'mahasiswa.'], function(){
    Route::group(['prefix' => 'verify', 'as' => 'verify.'], function(){
    /*Route Data Lowongan */
    Route::get('/', 'VerifyController@index')->name('index');
    Route::get('/getData', 'VerifyController@getData')->name('getdata');

    Route::post('/save', 'VerifyController@save')->name('save');
});
});
Route::group(['prefix' => 'perusahaan', 'namespace' => 'perusahaan', 'as' => 'perusahaan.'], function(){
    Route::group(['prefix' => 'verify', 'as' => 'verify.'], function(){
    /*Route Data Lowongan */
    Route::get('/', 'VerifyController@index')->name('index');
    Route::get('/getData', 'VerifyController@getData')->name('getdata');

    Route::post('/save', 'VerifyController@save')->name('save');
});
});
Route::group(['prefix' => 'laporan', 'namespace' => 'laporan', 'as' => 'laporan.'], function(){
    Route::group(['prefix' => 'pengguna', 'as' => 'pengguna.'], function(){
    /*Route Data Lowongan */
    Route::get('/', 'LaporanController@index')->name('index');
    Route::get('/getData', 'LaporanController@getData')->name('getdata');
});
});
});
