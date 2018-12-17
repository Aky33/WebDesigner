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
    
//    Route::middleware('auth:admin')->prefix('admin')->group(function() {
//        //todo - admin menu
//    });
});
