<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::get('/', 'TicketController@index');

Route::get('/create', 'TicketController@create');

Route::post('/create', 'TicketController@store');

Route::get('/tickets', 'TicketController@index');

Route::get('/ticket/{slug}', 'TicketController@show');

Route::get('/ticket/{slug}/edit', 'TicketController@edit');

Route::post('/ticket/{slug}/edit', 'TicketController@update');

Route::post('/ticket/{slug}/delete', 'TicketController@destroy');
