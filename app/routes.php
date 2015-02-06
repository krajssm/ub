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
/*
Route::get('users', function()
{
    return 'Users!';
});*/
Route::get('users', 'UserController@getIndex');
Route::get('login', 'UserController@login');
Route::get('dashboard', 'UserController@dashboard');
Route::post('dashboard', 'UserController@dashboardPost');

Route::post('login', array('uses' => 'UserController@loginPost'));
Route::get('logout', array('uses' => 'UserController@logout'));


/*Applications*/

Route::get('applications', 'ApplicationController@getIndex');

/*Route::get('users', function()
{
    return View::make('users');
});*/

/*
 * Route::get('users', function()
{
    $users = User::all();

    return View::make('users')->with('users', $users);
});
* */
