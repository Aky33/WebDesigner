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
    Route::get('/', function() {
        return redirect()->route('posts.home');
    })->name('home');
    
    Route::prefix('posts')->name('posts.')->group(function() {
        Route::get('/', 'PostController@index')->name('home');
        Route::get('create', 'PostController@create')->name('create');
        Route::post('create/save', 'PostController@createSave');
        Route::get('{id}/edit', 'PostController@edit')->name('edit');
        Route::post('{id}/edit/save', 'PostController@editSave');
        Route::post('{id}/delete', 'PostController@delete');
    });
    
    Route::prefix('options')->name('options.')->group(function() {
        Route::get('password', 'UserController@password')->name('password');
        Route::post('password/save', 'UserController@passwordSave');
        Route::get('lang', 'UserController@lang')->name('lang');
        Route::get('lang/{locale}', 'UserController@langSelect')->name('lang.select');
    });
    
    Route::prefix('admin')->name('admin.')->group(function() {
        Route::get('/', 'AdminController@index')->name('home');
        Route::get('create', 'AdminController@create')->name('create');
        Route::post('create/save', 'AdminController@createSave');
        Route::post('{id}/privilegia', 'AdminController@changePrivilegia');
        Route::post('{id}/password', 'AdminController@resetPassword');
        Route::post('{id}/delete', 'AdminController@delete');
    });
});
