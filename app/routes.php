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
Route::group(array('domain' => 'epikureos.com'), function() {
    Route::get('/', 'HomeController@get_index');
});

Route::get('/novedades', 'HomeController@get_novedades');
Route::get('/laposta', 'HomeController@get_posta');
Route::get('/promos', 'HomeController@get_promos');
Route::get('/quees', 'HomeController@get_quees');
Route::get('/contacto', 'HomeController@get_contacto');
Route::get('/terminos', 'HomeController@get_terminos');

// Rutas Login Facebook

Route::get('/loginfb', 'LoginController@loginfb');
Route::get('/loginfb/callback', 'LoginController@callback_loginfb');
Route::get('/logout', 'LoginController@logoutfb');

// Rutas Usuarios

Route::get('/perfil/{useraname}', 'PerfilController@get_perfil');

Route::group(array('domain' => '{city}.epikureos.com'), function(){

    Route::get('/', 'HomeController@get_index_city');
    Route::get('/novedades', 'HomeController@get_novedades');
    Route::get('/laposta', 'HomeController@get_posta');
    Route::get('/promos', 'HomeController@get_promos');
    Route::get('/quees', 'HomeController@get_quees');
    Route::get('/contacto', 'HomeController@get_contacto');
    Route::get('/terminos', 'HomeController@get_terminos');

    //Evento
    // Route::get('/santafealacarta', 'HomeController@get_santafe');

    //Rutas búsqueda

    Route::post('/busqueda', 'HomeController@post_busqueda');
    Route::get('/busqueda/{lugar}', 'HomeController@get_busqueda');
    Route::get('/busqueda/{lugar}/{ocasionComida}', 'HomeController@get_busqueda_ocasion');

    //Rutas lugar

    Route::get('/lugares/{lugar}', 'LugarController@get_lugar');
    Route::post('/lugares/{lugar}/votelike', 'LugarController@vote_lugar');

    // Rutas Login Facebook

    Route::get('/loginfb', 'LoginController@loginfb');
    Route::get('/loginfb/callback', 'LoginController@callback_loginfb');
    Route::get('/logout', 'LoginController@logoutfb');

    // Rutas Usuarios

    Route::get('/perfil/{useraname}', 'PerfilController@get_perfil');

});

// Ruta que envia comentario
Route::post('/lugares/{lugar}', array('before'=>'csrf', function($slug) {

    if (Auth::check()) {
    
        $input = array(
            'comentario' => Input::get('comment'),
            'voto' => Input::get('rating'),
            'nombre' => Input::get('nombre'),
        );

        $validacion = array(
            'comentario'=> 'required|min:10',
            'voto' => 'required|integer|between:1,5' 
        );

        $lugar = Lugar::where('slug', '=', $slug)->first();
        $review = Review::where('user_id', '=', Auth::user()->id)->where('lugar_id', '=', $lugar->id)->first();

        $validator = Validator::make($input, $validacion);

        if ($validator->passes()) {
            if ($review == null) {
                $review = new Review;
                $review->storeReviewForLugar($review, $lugar, $input['comentario'], $input['voto']);
            } else {
                $review->updateReviewForLugar($review, $lugar, $input['comentario'], $input['voto']);
            }
            return Redirect::to('lugares/'.$slug)->with('review_posted',true);
        }

        return Redirect::to('lugares/'.$slug)->withErrors($validator)->withInput();

    } else {

        $input = array(
            'comentario' => Input::get('comment'),
            'voto' => Input::get('rating'),
            'nombre' => Input::get('nombre'),
        );

        $validacion = array(
            'comentario'=> 'required|min:10',
            'voto' => 'required|integer|between:1,5',
            'nombre'=> 'required|min:1',
        );

        $lugar = Lugar::where('slug', '=', $slug)->first();

        $validator = Validator::make($input, $validacion);

        if ($validator->passes()) {
            $userAnonymus = new User;
            $userAnonymus->name = $input['nombre'];
            $userAnonymus->email = User::all()->count()+1;
            $userAnonymus->photo = "http://epikureos.com" . "/assets/img/anon_user.jpg";
            $userAnonymus->save();

            Auth::login($userAnonymus);

            $review = new Review;
            $review->storeReviewForLugar($review, $lugar, $input['comentario'], $input['voto']);

            Auth::logout();

            return Redirect::to('lugares/'.$slug)->with('review_posted',true);
        }

        return Redirect::to('lugares/'.$slug)->withErrors($validator)->withInput();
        //return Redirect::to('lugares/'.$slug)->withErrors(array('login' => "No se encuentra logueado para poder comentar."))->withInput();
    }

}));


// Rutas Dashboard

Route::get('/login', 'UserController@get_login');
Route::post('/login', 'UserController@post_login');
Route::get('/logout', 'UserController@logout');
Route::get('/signup', 'UserController@get_signup');
Route::post('/signup', 'UserController@post_signup');
Route::get('/dashboard', 'UserController@dashboard');

Route::group(array('prefix' => 'admin'), function() {
    Route::group(array('before' => 'admin'), function() {
        Route::get('/', 'AdminController@index');

        Route::get('/usuarios', 'AdminController@usuarios_all');

        Route::get('/comentarios', 'AdminController@comentarios_all');

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

        Route::get('/comidas', 'AdminController@comidas');
        Route::post('/comidas/add', 'AdminController@comidas_add');
        Route::get('/comidas/edit/{id}', 'AdminController@comidas_get_edit');
        Route::post('/comidas/edit/{id}', 'AdminController@comidas_post_edit');
        Route::get('/comidas/delete/{id}', 'AdminController@comidas_delete');

        Route::get('/ocasiones', 'AdminController@ocasiones');
        Route::post('/ocasiones/add', 'AdminController@ocasiones_add');
        Route::get('/ocasiones/edit/{id}', 'AdminController@ocasiones_get_edit');
        Route::post('/ocasiones/edit/{id}', 'AdminController@ocasiones_post_edit');
        Route::get('/ocasiones/delete/{id}', 'AdminController@ocasiones_delete');
    });
});