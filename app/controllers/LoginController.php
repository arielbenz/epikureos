<?php

class LoginController extends BaseController {

	public function loginfb() {
	    $facebook = new Facebook(Config::get('facebook'));
	    $params = array(
	        'redirect_uri' => url('/loginfb/callback'),
	        'scope' => 'public_profile, email',
	    );
	    return Redirect::to($facebook->getLoginUrl($params));
	}

	public function callback_loginfb() {
	    $code = Input::get('code');
	    if (strlen($code) == 0) {
	        return Redirect::to('/')->with('message', 'Ha ocurrido un error con Facebook, intentelo más tarde.');
	    }
	 
	    $facebook = new Facebook(Config::get('facebook'));
	    $uid = $facebook->getUser();
	 
	    if ($uid == 0) {
	        return Redirect::to('/')->with('message', 'Ha ocurrido un error inesperado.');
	    }
	 
	    $me = $facebook->api('/me');
	 
	    $profile = Profile::whereUid($uid)->first();
	    if (empty($profile)) {
	        $user = new User;
	        $user->name = $me['first_name'].' '.$me['last_name'];
	        $user->email = $me['email'];
			$user->photo = "https://graph.facebook.com/".$uid."/picture";
	 
	        $user->save();
	 
	        $profile = new Profile();
	        $profile->uid = $uid;
	        $profile->username = "";
	        $profile = $user->profiles()->save($profile);
	    }
	 
	    $profile->access_token = $facebook->getAccessToken();
	    $profile->save();

	    $user = $profile->user;
	    Auth::login($user);
	    $data = array();
	    if (Auth::check()) {
	        $data = Auth::user();
	        return Redirect::to($_SESSION['lastpage']);
	    }
	}

	public function logoutfb() {
	    Auth::logout();
	    return Redirect::to($_SESSION['lastpage']);
	}

}