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

Auth::routes(['verify' => true]);
/*
Route::get('user/{user}', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'UserController@index',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);
*/
Route::group(['middleware' => ['auth', 'roles'], 'roles' => ['Admin', 'Career Center', 'Perusahaan']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
});
Route::get('/logout', 'HomeController@logout')->name('logout');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Route::get('/', 'FrontHomeController@index')->name('index');
Route::post('/search', 'FrontHomeController@search')->name('search');
Route::group(['prefix' => 'job', 'namespace' => 'job', 'as' => 'job.'], function(){
    Route::get('/', 'JobController@all')->name('all');
    Route::get('/{lowongan_id}/detail', 'JobController@show')->name('show');
    Route::post('/apply', ['middleware' => ['auth', 'roles'], 'uses' => 'JobController@apply', 'roles' => 'Mahasiswa'])->name('apply');
});
