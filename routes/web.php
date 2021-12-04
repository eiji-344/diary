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

Route::get('/', 'DiaryController@index')->middleware('auth');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    
Route::get('/search', 'DiaryController@search');
//Route::get('/search/result', 'DiaryController@searchResult');
Route::get('/diaries/create', 'DiaryController@create');
Route::get('/diaries/{diary}', 'DiaryController@show');

Route::post('/diaries', 'DiaryController@store');
Route::get('/diaries/{diary}/edit', 'DiaryController@edit');
Route::put('/diaries/{diary}', 'DiaryController@update');
Route::delete('/diaries/{diary}', 'DiaryController@delete');



Route::get('/home', 'HomeController@index')->name('home');


Route::get('/users', 'UsersController@index');
Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');
Route::get('/users/{user}', 'UsersController@show');



Route::post('/favorites', 'FavoriteController@store');
Route::delete('/favorites/delete/{favorite}', 'FavoriteController@delete');

Route::get('/home/follow', 'HomeController@followShow');
Route::get('/home/fovorite', 'HomeController@fovorit');

//Diaryフォルダ下のshow.blade.phpでのいいね機能
// Route::post('diaries/{diary}/favorites', 'FavoriteController@store')->name('favorites');
// Route::post('diaries/{diary}/unfavorites', 'FavoriteController@delete')->name('unfavorites');

});
