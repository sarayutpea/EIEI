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
Route::delete('/articles/{id}', 'ArticleController@destroy');

Route::post('/articles/{article}/comments', 'CommentController@store'); //ส่ง id ชื่อว่า article เพราะจะส่งไปเป็น object



// Files

Route::get('/files','FileController@index');
Route::get('/files/create','FileController@create');
Route::get('/files/{id}', 'FileController@show');
Route::get('/files/{id}/edit', 'FileController@edit');
Route::post('/files','FileController@store'); //save 
Route::post('/files/{id}', 'FileController@update'); //update
Route::delete('/files/{id}', 'FileController@destroy');



Route::get('/calendars','CalendarController@index');
Route::get('/calendars/create','CalendarController@create');
Route::get('/calendars/show','CalendarController@show');
Route::get('/calendars/{id}/edit','CalendarController@edit');
Route::post('/calendars/{id}/edit','CalendarController@update'); //save 
Route::post('/calendars','CalendarController@store'); //save 



Route::get('/polls','PollController@index');
Route::get('/polls/create','PollController@create');
Route::get('/polls/{id}','PollController@show');
Route::get('/polls/{id}/edit','PollController@edit');
Route::post('/polls/{id}/edit','PollController@update'); //save update
Route::post('/polls','PollController@store'); //save 
Route::delete('/polls/{id}', 'PollController@destroy'); //DELETE

Route::get('/polls-chartjs','PollController@chartjs'); // Response ChartJS donut

Route::post('/pollItem/addPoint','PollItemController@addPoint'); //update poll point +1




Route::get('/questions','QuestionController@index');
Route::get('/questions/create','QuestionController@create');
Route::post('/questions','QuestionController@store');
