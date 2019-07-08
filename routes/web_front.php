<?php
Route::get('/', 'FrontHomeController@index')->name('index');
Route::post('/search', 'FrontHomeController@search')->name('search');
Route::group(['prefix' => 'job', 'namespace' => 'job', 'as' => 'job.'], function(){
    Route::get('/search', 'JobController@search')->name('job.search');
    Route::get('/{lowongan_id}/detail', 'JobController@show')->name('job.show');
});
