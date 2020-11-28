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
Route::get('/estimates/edit', 'EstimateController@showEditForm')->name('estimates.edit');
Route::post('/estimates/edit', 'EstimateController@edit');
Route::get('/estimates/create', "EstimateController@create")->name('estimates.create');
Route::post('/estimates/create', "EstimateController@create");

