<?php

class LoginController extends BaseController {

	public function loginfb() {
	    $facebook = new Facebook(Config::get('facebook'));
	    $params = array(
	        'display' => 'popup',
	        'redirect_uri' => url('/loginfb/callback'),
	        'scope' => 'public_profile,email',
	    );
	    return Redirect::to($facebook->getLoginUrl($params));
	}

	public function callback_loginfb() {
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
	    $data = array();
	    if (Auth::check()) {
	        $data = Auth::user();
	        return Redirect::to('/');
	    }
	}

	public function logoutfb() {
	    Auth::logout();
	    unset($_SESSION["user_id"]);
	    unset($_SESSION["user_photo"]);
	    return Redirect::to('/');
	}

}