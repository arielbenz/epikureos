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

require_once($_SERVER ['DOCUMENT_ROOT'].'/blog/wp-config.php');

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
        'comment'       => Input::get('comment'),
        'rating'        => Input::get('rating')
    );

    $recomendacion_checked = Input::get('recomendacion');

    $lugar = Lugar::where('slug', '=', $slug)->first();
    $review = Review::where('user_id', '=', Auth::user()->id)->where('lugar_id', '=', $lugar->id)->first();

    $validacion = array(
            'comment'=>'required|min:10',
            'rating'=>'required|integer|between:1,5'
        );

    $validator = Validator::make($input, $validacion);

    if ($validator->passes()) {
        if ($review == null) {
            $review = new Review;
            $review->storeReviewForLugar($lugar, $input['comment'], $input['rating'], $recomendacion_checked);
        } else {
            $review->rating = $input['rating'];
            $review->save();
            $review->updateReviewForLugar($review, $lugar, $input['comment'], $input['rating'], $recomendacion_checked);
        }
        return Redirect::to('lugares/'.$slug.'#review')->with('review_posted',true);
    }
    
    return Redirect::to('lugares/'.$slug.'#review')->withErrors($validator)->withInput();
}));

Route::post('/lugares/{lugar}/votelike', function(){
    if(Request::ajax()) {

        $lugarid  = Input::get('lugarid');
        $userid = Input::get('userid');
        $ocasionid = Input::get('ocasionid');
        $reviewid = Input::get('reviewid');
        $name = Input::get('name');
        $error = "";

        $ocasion = ReviewOcasion::where('ocasion_id', '=', $ocasionid)->where('review_id', '=', $reviewid)->first();

        if ($name == "up" && $ocasion == null) {
            $ocasion = new ReviewOcasion;
            $ocasion->review_id = $reviewid;
            $ocasion->ocasion_id = $ocasionid;
            $ocasion->save();
        } else if ($name == "down" && $ocasion != null) {
            $ocasion->delete();
        } else if ($name == "up" && $ocasion != null) {
            $error = "Ya realizó su voto";
        } else if ($name == "down" && $ocasion == null) {
            $error = "Todavía no realizó su voto positivo";
        }

        return Response::json(array('message' => $error, 'reviewid' => $reviewid));
    }
});

Route::post('/lugares/{lugar}/updatelikes', function(){
    if(Request::ajax()) {

        $lugarid  = Input::get('lugarid');
        $userid = Input::get('userid');
        $ocasionid = Input::get('ocasionid');
        $reviewid = Input::get('reviewid');
        $error = "";

        $lugar = Lugar::where('id', '=', $lugarid)->first();
        $reviews = $lugar->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->get();

        $idreviews[] = array();
        $total_votos = 0;
        $votos_ocasiones = array();
        $ocasiones = array();
        $i = 0;

        if(sizeof($reviews) > 0) {
            $i = 0;
            foreach($reviews as $review) {
                $idreviews[$i] = $review->id;
                $i = $i + 1;
            }

            foreach(Ocasion::all() as $ocasion) {
                $ocasionCount = ReviewOcasion::where('ocasion_id', '=', $ocasion->id)->whereIn('review_id', $idreviews)->count();
                $votos_ocasiones[$ocasion->descripcion] = $ocasionCount;
                $ocasiones[$i] = $ocasion->id;
                $total_votos = $total_votos + $ocasionCount;
                $i = $i + 1;
            }
        } else {
            foreach(Ocasion::all() as $ocasion) {
                $votos_ocasiones[$ocasion->descripcion] = 0;
                $ocasiones[$i] = $ocasion->id;
                $i = $i + 1;
            }
        }

        return Response::json(array('message' => $error, 'votosLugar' => $votos_ocasiones, 'totalVotos' => $total_votos, 'totalOcasiones' => $ocasiones));
    }
});

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
    $_SESSION["user_id"] = $user->id;
    $_SESSION["user_photo"] = $user->photo;
    simpleSessionStart();
    $data = array();
    if (Auth::check()) {
        $data = Auth::user();
        return Redirect::to('/');
    }
});

Route::get('/logout', function() {
    Auth::logout();
    unset($_SESSION["user_id"]);
    unset($_SESSION["user_photo"]);
    simpleSessionDestroy();
    return Redirect::to('/');
});