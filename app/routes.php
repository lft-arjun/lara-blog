<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Guest can access
Route::get('/', [ "as" => "/" , "uses"=>"PostController@index"]);

Route::any("login", [
 "as"   => "user.login",
 "uses" => "UserController@login"
]);

Route::resource('users', 'UserController');
Route::get('logout', ["as" => "logout", 'uses' => "UserController@logout"]);
Route::get('/post/{id}/show', ['as' => 'post.show', 'uses' => 'PostController@show']);
//only authenticate use can access
Route::group(array('before' => 'auth'), function()
{
    //Route for posts
    // Route::get('posts', 'PostController@index');
    // Route::get('posts/create', ["as"   => "posts.create", 'uses' =>'PostController@create']);
    // Route::post('posts/create', ["as"   => "posts.store", 'uses' =>'PostController@store']);

    // Route::get('/post/{id}/edit', ['as' => 'post.edit', 'uses' => 'PostController@edit']);
    // Route::patch('/post/{id}/edit', ['as' => 'post.update', 'uses' => 'PostController@update']);
    // Route::get('/post/{id}/delete', ['as' => 'post.delete', 'uses' => 'PostController@destroy']);
    //Route for comments
    Route::get('comment/create', ["as"   => "comment.create", 'uses' =>'CommentController@create']);
    Route::post('comment/store', ["as"   => "comment.store", 'uses' =>'CommentController@store']);
    Route::get('/comment/{id}/edit', ['as' => 'comment.edit', 'uses' => 'CommentController@edit']);
    Route::patch('/comment/{id}/edit', ['as' => 'comment.update', 'uses' => 'CommentController@update']);
    Route::get('/comment/{id}/show', ['as' => 'comment.show', 'uses' => 'CommentController@show']);
    Route::get('comment/{id}/delete', ["as"   => "comment.destroy", 'uses' =>'CommentController@destroy']);
});
Route::group(array('before' => 'auth.admin'), function()
{
    // //Route for posts
    Route::get('posts/list', ["as"   => "posts.list", 'uses' =>'PostController@list']);
    Route::get('posts/create', ["as"   => "posts.create", 'uses' =>'PostController@create']);
    Route::post('posts/create', ["as"   => "posts.store", 'uses' =>'PostController@store']);

    Route::get('/post/{id}/edit', ['as' => 'post.edit', 'uses' => 'PostController@edit']);
    Route::patch('/post/{id}/edit', ['as' => 'post.update', 'uses' => 'PostController@update']);
    Route::get('/post/{id}/delete', ['as' => 'post.delete', 'uses' => 'PostController@destroy']);
    //Route for comments
    Route::get('comment/{id}/delete', ["as"   => "comment.delete", 'uses' =>'CommentController@destroy']);
    Route::get('comment/list', ["as"   => "comment.list", 'uses' =>'CommentController@index']);
    Route::get('comment/create', ["as"   => "comment.create", 'uses' =>'CommentController@create']);
    Route::post('comment/store', ["as"   => "comment.store", 'uses' =>'CommentController@store']);
});
