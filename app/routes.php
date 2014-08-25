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

/**
 * Home | Documentation
 * @link /
 */
Route::get('/', function()
{
	return View::make('doc');
});

/**
 * @link /panel/*
 */
Route::group(['prefix' => 'panel'], function()
{
	Route::resource('holiday', 'HolidayController');

	/**
	 * @link /panel/
	 */
	Route::get('/', function() {
		return View::make('index');
	});

	App::missing(function() {
		return View::make('index');
	});
});

/**
 * @link /api/*
 */
Route::group(['prefix' => 'api'], function()
{
	Route::get('/', function()
	{
		return Response::make(['message' => "Welcome to JuanHoliday API!"]);
	});

	Route::get('range', 'ApiController@range');

	Route::get('{year}', 'ApiController@holidays');

	Route::get('{year}/{month}', 'ApiController@holidays');

	Route::get('{year}/{month}/{day}', 'ApiController@holidays');
});