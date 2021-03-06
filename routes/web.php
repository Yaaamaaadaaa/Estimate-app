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
Route::get('/login/guest', 'Auth\LoginController@guestLogin')->name('login.guest');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/estimates', 'EstimateController@index')->name('estimates.index');
    Route::get('/estimates/edit', 'EstimateController@showEditForm')->name('estimates.edit');
    Route::post('/estimates/edit', 'EstimateController@edit');
    Route::get('/estimates/create', 'EstimateController@create')->name('estimates.create');
    Route::post('/estimates/create', 'EstimateController@create');
    Route::get('/estimates/delete', 'EstimateController@delete')->name('estimates.delete');
    Route::post('/estimates/delete', 'EstimateController@delete');
    Route::get('/estimates/pdf', 'PDFController@index')->name('pdf.index');
    Route::get('/user/edit', 'UserController@showEditForm')->name('user.edit');
    Route::post('/user/edit', 'UserController@edit');
});

