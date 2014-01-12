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
Route::get('/terminos', 'HomeController@get_terminos');

Route::post('/busqueda', 'HomeController@post_busqueda');
Route::get('/busqueda/{lugar}', 'HomeController@get_busqueda');

//Rutas búsqueda

Route::get('/lugares/{lugar}', 'LugarController@get_lugar');

// Rutas Dashboard

Route::get('/login', 'UserController@get_login');
Route::post('/login', 'UserController@post_login');
Route::get('/logout', 'UserController@logout');
Route::get('/signup', 'UserController@get_signup');
Route::post('/signup', 'UserController@post_signup');
Route::get('/dashboard', 'UserController@dashboard');

Route::group(array('prefix' => 'admin'), function()
{
	Route::group(array('before' => 'admin'), function()
	{
		Route::get('/', 'AdminController@index');

		Route::get('/lugares', 'AdminController@lugares_all');
		Route::get('/lugares/add', 'AdminController@get_add');
		Route::post('/lugares/add', 'AdminController@post_add');
		Route::get('/lugares/{id}', 'AdminController@lugar');
		Route::post('/lugares/edit/{id}', 'AdminController@lugar_edit');

		Route::get('/categorias', 'AdminController@categorias');
		Route::post('/categorias/add', 'AdminController@categorias_add');
		Route::get('/categorias/edit/{id}', 'AdminController@categorias_get_edit');
		Route::post('/categorias/edit/{id}', 'AdminController@categorias_post_edit');
		Route::get('/categorias/delete/{id}', 'AdminController@categorias_delete');

		Route::get('/etiquetas', 'AdminController@etiquetas');
		Route::post('/etiquetas/add', 'AdminController@etiquetas_add');
		Route::get('/etiquetas/edit/{id}', 'AdminController@etiquetas_get_edit');
		Route::post('/etiquetas/edit/{id}', 'AdminController@etiquetas_post_edit');
		Route::get('/etiquetas/delete/{id}', 'AdminController@etiquetas_delete');
	});
});
