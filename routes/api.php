<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/news', 'ApiController@news');
Route::get('/news/latest', 'ApiController@latestNews');
Route::get('/news/{post}', 'ApiController@post');

Route::get('/interviews', 'ApiController@interviews');
Route::get('/interviews/{post}', 'ApiController@post');

Route::get('/posts', 'ApiController@posts');
Route::get('/posts/latest', 'ApiController@latestPosts');
Route::get('/posts/{post}', 'ApiController@post');

Route::get('/photos', 'ApiController@photos');

Route::get('/videos', 'ApiController@videos');

Route::get('/teams', 'ApiController@teams');

Route::get('/events', 'ApiController@events');
Route::get('/events/{event}', 'ApiController@event');

Route::get('/messages', 'ApiController@messages');
Route::post('/messages', 'ApiController@sendMessage');

Route::get('/tops', 'ApiController@tops');

Route::get('/polls', 'ApiController@polls');

Route::get('/partners', 'ApiController@partners');