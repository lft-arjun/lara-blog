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

Route::get('/', function()
{
	return View::make('hello');
});

Route::any("login", [
 "as"   => "user.login",
 "uses" => "UserController@login"
]);

Route::resource('users', 'UserController');

Route::get('logout', function() {
	Auth::logout();

    return Redirect::to('/')
        ->with('message', 'You are successfully logged out.');

});

Route::group(array('before' => 'auth'), function()
{
    // Route::get('/', function()
    // {
    //     // Has Auth Filter
    // });

    Route::get('posts', 'PostController@index');
});
