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

//Rutas de home

Route::get('/', 'HomeController@get_index');

Route::get('/novedades', 'HomeController@get_novedades');

Route::get('/laposta', 'HomeController@get_posta');

Route::get('/promos', 'HomeController@get_promos');

Route::get('/quees', 'HomeController@get_quees');

Route::get('/contacto', 'HomeController@get_contacto');

Route::get('/busqueda/{lugar}', 'HomeController@get_busqueda');

Route::post('/busqueda', 'HomeController@post_busqueda');