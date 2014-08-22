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
	return Response::make(['message' => "Welcome to JuanHoliday API!"]);
});

Route::get('range', 'HolidayController@range');

Route::get('{year}', 'HolidayController@holidays');

Route::get('{year}/{month}', 'HolidayController@holidays');

Route::get('{year}/{month}/{day}', 'HolidayController@holidays');