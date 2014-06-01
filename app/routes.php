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

// Route that handles submission of review - rating/comment
Route::post('/lugares/{lugar}', array('before'=>'csrf', function($slug) {
    
    $input = array(
        'comment' => Input::get('comment'),
        'rating'  => Input::get('rating')
    );
    // instantiate Rating model
    $review = new Review;

    // Validate that the user's input corresponds to the rules specified in the review model
    $validator = Validator::make($input, $review->getCreateRules());

    // If input passes validation - store the review in DB, otherwise return to product page with error message 
    if ($validator->passes()) {
        $review->storeReviewForLugar($slug, $input['comment'], $input['rating']);
        return Redirect::to('lugares/'.$slug.'#reviews-anchor')->with('review_posted',true);
    }

    return Redirect::to('lugares/'.$slug.'#reviews-anchor')->withErrors($validator)->withInput();
}));

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

// Rutas Login

Route::get('/loginfb', function() {
    $facebook = new Facebook(Config::get('facebook'));
    $params = array(
        'display' => 'popup',
        'redirect_uri' => url('/loginfb/callback'),
        'scope' => 'public_profile,email',
    );
    return Redirect::to($facebook->getLoginUrl($params));
});

Route::get('/loginfb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) {
        return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');
    }
 
    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();
 
    if ($uid == 0) {
        return Redirect::to('/')->with('message', 'There was an error');
    }
 
    $me = $facebook->api('/me');
 
    $profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {
        $user = new User;
        $user->name = $me['first_name'].' '.$me['last_name'];
        $user->email = $me['email'];
        $user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';
 
        $user->save();
 
        $profile = new Profile();
        $profile->uid = $uid;
        $profile->username = $me['username'];
        $profile = $user->profiles()->save($profile);
    }
 
    $profile->access_token = $facebook->getAccessToken();
    $profile->save();

    $user = $profile->user;
    Auth::login($user);
    $data = array();
    if (Auth::check()) {
        $data = Auth::user();
        return Redirect::to('/');
    }
});

Route::get('/logout', function() {
    Auth::logout();
    return Redirect::to('/');
});