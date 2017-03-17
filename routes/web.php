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
    return view('index');
});

Route::get('/articles','ArticleController@index');
Route::get('/articles/create','ArticleController@create');
Route::get('/articles/{id}', 'ArticleController@show');
Route::post('/articles','ArticleController@store');

Route::post('/articles/{article}/comments', 'CommentController@store'); //ส่ง id ชื่อว่า article เพราะจะส่งไปเป็น object

// Files

Route::get('/files','FileController@index');
Route::get('/files/create','FileController@create');
Route::get('/files/{id}', 'FileController@show');
Route::post('/files','FileController@store');
Route::delete('/files/{id}', 'FileController@destroy');

