<?php

Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'roles'], 'roles' => 'Admin'], function(){
    Route::group(['prefix' => 'master', 'namespace' => 'master', 'as' => 'master.'], function(){
        Route::prefix('menu')->group(function(){
            Route::get('/', 'MenuController@index')->name('menu');
            Route::get('/getData', 'MenuController@getData')->name('menu.getdata');
            Route::get('/get/{id}', 'MenuController@getSingleData')->name('menu.get');
            Route::get('/delete/{id}', 'MenuController@delete')->name('menu.delete');
            Route::post('/save', 'MenuController@save')->name('menu.save');
            Route::post('/update', 'MenuController@update')->name('menu.update');
        });
        Route::prefix('fakultas')->group(function(){
            Route::get('/', 'FakultasController@index')->name('fakultas');
            Route::get('/getData', 'FakultasController@getData')->name('fakultas.getdata');
            Route::get('/get/{id}', 'FakultasController@getSingleData')->name('fakultas.get');
            Route::get('/delete/{id}', 'FakultasController@delete')->name('fakultas.delete');
            Route::post('/save', 'FakultasController@save')->name('fakultas.save');
            Route::post('/update', 'FakultasController@update')->name('fakultas.update');
        });
        Route::prefix('jurusan')->group(function(){
            Route::get('/', 'JurusanController@index')->name('jurusan');
            Route::get('/getData', 'JurusanController@getData')->name('jurusan.getdata');
            Route::get('/get/{id}', 'JurusanController@getSingleData')->name('jurusan.get');
            Route::get('/delete/{id}', 'JurusanController@delete')->name('jurusan.delete');
            Route::post('/save', 'JurusanController@save')->name('jurusan.save');
            Route::post('/update', 'JurusanController@update')->name('jurusan.update');
        });
        Route::prefix('skill')->group(function(){
            Route::get('/', 'SkillController@index')->name('skill');
            Route::get('/getData', 'SkillController@getData')->name('skill.getdata');
            Route::get('/get/{id}', 'SkillController@getSingleData')->name('skill.get');
            Route::get('/delete/{id}', 'SkillController@delete')->name('skill.delete');
            Route::post('/save', 'SkillController@save')->name('skill.save');
            Route::post('/update', 'SkillController@update')->name('skill.update');
        });
        Route::prefix('role')->group(function(){
            Route::get('/', 'RoleController@index')->name('role');
            Route::get('/getData', 'RoleController@getData')->name('role.getdata');
            Route::get('/get/{id}', 'RoleController@getSingleData')->name('role.get');
            Route::get('/delete/{id}', 'RoleController@delete')->name('role.delete');
            Route::post('/save', 'RoleController@save')->name('role.save');
            Route::post('/update', 'RoleController@update')->name('role.update');
        });
        Route::prefix('employee')->group(function(){
            Route::get('/', 'EmployeeController@index')->name('employee');
            Route::get('/getData', 'EmployeeController@getData')->name('employee.getdata');
            Route::get('/get/{id}', 'EmployeeController@getSingleData')->name('employee.get');
            Route::get('/delete/{id}', 'EmployeeController@delete')->name('employee.delete');
            Route::post('/save', 'EmployeeController@save')->name('employee.save');
            Route::post('/update', 'EmployeeController@update')->name('employee.update');
        });
        Route::prefix('dokumen')->group(function(){
            Route::get('/', 'DokumenController@index')->name('dokumen');
            Route::get('/getData', 'DokumenController@getData')->name('dokumen.getdata');
            Route::get('/get/{id}', 'DokumenController@getSingleData')->name('dokumen.get');
            Route::get('/delete/{id}', 'DokumenController@delete')->name('dokumen.delete');
            Route::post('/save', 'DokumenController@save')->name('dokumen.save');
            Route::post('/update', 'DokumenController@update')->name('dokumen.update');
        });
        Route::group(['prefix' => 'lowongan', 'namespace' => 'lowongan', 'as' => 'lowongan.'], function(){
            /*Route Data Lowongan */
            Route::get('/', 'LowonganController@index')->name('index');
            Route::get('/getData', 'LowonganController@getData')->name('getdata');
            Route::get('/get/{id}', 'LowonganController@getSingleData')->name('get');
            Route::get('/delete/{id}', 'LowonganController@delete')->name('delete');
            Route::get('/testFilter', 'LowonganController@testFilter')->name('testFilter');
            Route::post('/save', 'LowonganController@save')->name('save');
            Route::post('/update', 'LowonganController@update')->name('update');

            Route::prefix('reqDocument')->group(function(){
                Route::get('/', 'ReqDocumentController@index')->name('reqDocument');
                Route::get('/getData', 'ReqDocumentController@getData')->name('reqDocument.getdata');
                Route::get('/get/{id}', 'ReqDocumentController@getSingleData')->name('reqDocument.get');
                Route::get('/delete/{id}', 'ReqDocumentController@delete')->name('reqDocument.delete');
                Route::post('/save', 'ReqDocumentController@save')->name('reqDocument.save');
                Route::post('/update', 'ReqDocumentController@update')->name('reqDocument.update');
            });
            Route::prefix('request')->group(function(){
                Route::get('/', 'RequestController@index')->name('request');
                Route::get('/getData', 'RequestController@getData')->name('request.getdata');
                Route::get('/get/{id}', 'RequestController@getSingleData')->name('request.get');
                Route::get('/delete/{id}', 'RequestController@delete')->name('request.delete');
                Route::post('/save', 'RequestController@save')->name('request.save');
                Route::post('/update', 'RequestController@update')->name('request.update');
            });
            Route::prefix('reqPrint')->group(function(){
                Route::get('/', 'ReqPrintController@index')->name('reqPrint');
                Route::get('/getData', 'ReqPrintController@getData')->name('reqPrint.getdata');
                Route::get('/get/{id}', 'ReqPrintController@getSingleData')->name('reqPrint.get');
                Route::get('/delete/{id}', 'ReqPrintController@delete')->name('reqPrint.delete');
                Route::post('/save', 'ReqPrintController@save')->name('reqPrint.save');
                Route::post('/update', 'ReqPrintController@update')->name('reqPrint.update');
            });
            Route::prefix('mhsDocument')->group(function(){
                Route::get('/', 'ReqMahasiswaDocController@index')->name('reqMhsDoc');
                Route::get('/getData', 'ReqMahasiswaDocController@getData')->name('reqMhsDoc.getdata');
                Route::get('/get/{id}', 'ReqMahasiswaDocController@getSingleData')->name('reqMhsDoc.get');
                Route::get('/delete/{id}', 'ReqMahasiswaDocController@delete')->name('reqMhsDoc.delete');
                Route::post('/save', 'ReqMahasiswaDocController@save')->name('reqMhsDoc.save');
                Route::post('/update', 'ReqMahasiswaDocController@update')->name('reqMhsDoc.update');
            });
        });
        Route::group(['prefix' => 'perusahaan', 'namespace' => 'perusahaan', 'as' => 'perusahaan.'], function(){
            /*Route Data Perusahaan */
            Route::get('/', 'PerusahaanController@index')->name('index');
            Route::get('/getData', 'PerusahaanController@getData')->name('getdata');
            Route::get('/get/{id}', 'PerusahaanController@getSingleData')->name('get');
            Route::get('/delete/{id}', 'PerusahaanController@delete')->name('delete');
            Route::post('/save', 'PerusahaanController@save')->name('save');
            Route::post('/update', 'PerusahaanController@update')->name('update');

            Route::prefix('request')->group(function(){
                Route::get('/', 'RequestController@index')->name('request');
                Route::get('/getData', 'RequestController@getData')->name('request.getdata');
                Route::get('/get/{id}', 'RequestController@getSingleData')->name('request.get');
                Route::get('/delete/{id}', 'RequestController@delete')->name('request.delete');
                Route::post('/save', 'RequestController@save')->name('request.save');
                Route::post('/update', 'RequestController@update')->name('request.update');
            });
        });
        Route::group(['prefix' => 'mahasiswa', 'namespace' => 'mahasiswa', 'as' => 'mahasiswa.'], function(){
            /*Route Data Mahasiswa */
            Route::get('/', 'MahasiswaController@index')->name('index');
            Route::get('/getData', 'MahasiswaController@getData')->name('getdata');
            Route::get('/get/{id}', 'MahasiswaController@getSingleData')->name('get');
            Route::get('/delete/{id}', 'MahasiswaController@delete')->name('delete');
            Route::post('/save', 'MahasiswaController@save')->name('save');
            Route::post('/update', 'MahasiswaController@update')->name('update');

            Route::prefix('request')->group(function(){
                Route::get('/', 'RequestController@index')->name('request');
                Route::get('/getData', 'RequestController@getData')->name('request.getdata');
                Route::get('/get/{id}', 'RequestController@getSingleData')->name('request.get');
                Route::get('/delete/{id}', 'RequestController@delete')->name('request.delete');
                Route::post('/save', 'RequestController@save')->name('request.save');
                Route::post('/update', 'RequestController@update')->name('request.update');
            });
            Route::prefix('reqDocument')->group(function(){
                Route::get('/', 'ReqDocumentController@index')->name('reqDocument');
                Route::get('/getData', 'ReqDocumentController@getData')->name('reqDocument.getdata');
                Route::get('/get/{id}', 'ReqDocumentController@getSingleData')->name('reqDocument.get');
                Route::get('/delete/{id}', 'ReqDocumentController@delete')->name('reqDocument.delete');
                Route::post('/save', 'ReqDocumentController@save')->name('reqDocument.save');
                Route::post('/update', 'ReqDocumentController@update')->name('reqDocument.update');
            });
            Route::prefix('skill')->group(function(){
                Route::get('/', 'SkillController@index')->name('skill');
                Route::get('/getData', 'SkillController@getData')->name('skill.getdata');
                Route::get('/get/{id}', 'SkillController@getSingleData')->name('skill.get');
                Route::get('/delete/{id}', 'SkillController@delete')->name('skill.delete');
                Route::post('/save', 'SkillController@save')->name('skill.save');
                Route::post('/update', 'SkillController@update')->name('skill.update');
            });
        });
    });
});
