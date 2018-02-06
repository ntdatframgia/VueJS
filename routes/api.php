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

Route::group(['middleware' => 'api'], function () {
    Route::resource('comments', 'CommentController');
    Route::get('/categories/{id}/topics', 'CategoryController@show');
    Route::resource('categories', 'CategoryController');
    Route::resource('topics', 'TopicController');
    Route::resource('users', 'UserController');
});