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

Route::get('/', 'DiaryController@index');
Route::get('/diaries/create', 'DiaryController@create');
Route::get('/diaries/{diary}', 'DiaryController@show');

Route::post('/diaries', 'DiaryController@store');
Route::get('/diaries/{diary}/edit', 'DiaryController@edit');
Route::put('/diaries/{diary}', 'DiaryController@update');
Route::delete('/diaries/{diary}', 'DiaryController@delete');