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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/estimates', 'EstimateController@index')->name('estimates.index');
Route::get('/estimates/create', 'EstimateController@showCreateForm')->name('estimates.create');

Route::group(['middleware' => 'api'], function(){
    Route::get('create', 'ItemController@create');
});
