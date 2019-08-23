<?php
Route::get('/', 'FrontHomeController@index')->name('index');
Route::post('/search', 'FrontHomeController@search')->name('search');
Route::group(['prefix' => 'job', 'namespace' => 'job', 'as' => 'job.'], function(){
    Route::get('/', 'JobController@all')->name('all');
    Route::get('/{lowongan_id}/detail', 'JobController@show')->middleware(["auth"])->name('show');
    Route::get('/{lowongan_id}/apply', ['middleware' => ['auth', 'roles'], 'uses' => 'JobController@applyJob', 'roles' => 'Mahasiswa'])->name('apply');
});
