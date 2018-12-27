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

Auth::routes();
Route::middleware('auth')->group(function() {
    Route::get('/', 'PostController@index')->name('home');
    Route::get('create', 'PostController@create')->name('create');
    Route::post('create/save', 'PostController@createSave')->name('createSave');
    Route::get('{id}/edit', 'PostController@edit')->name('edit');
    Route::post('{id}/edit/save', 'PostController@editSave')->name('editSave');
    Route::post('{id}/delete', 'PostController@delete')->name('delete');
    
    Route::get('change/password', 'UserController@password')->name('password');
    Route::post('change/password/save', 'UserController@passwordSave')->name('passwordSave');
    Route::get('change/lang', 'UserController@lang')->name('lang');
    Route::get('change/lang/{locale}', 'UserController@langSelect')->name('langSelect');
    
    Route::prefix('admin')->group(function() {
        Route::get('/', 'AdminController@index')->name('admin');
        Route::get('create', 'AdminController@create')->name('createUser');
        Route::post('create/save', 'AdminController@createSave')->name('createSaveUser');
        Route::post('{id}/privilegia', 'AdminController@changePrivilegia')->name('changePrivilegia');
        Route::post('{id}/password', 'AdminController@resetPassword')->name('resetPassword');
        Route::post('{id}/delete', 'AdminController@delete')->name('deleteUser');
    });
});
