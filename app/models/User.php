<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

	protected $table = 'users';
	public $timestamps = false;

	public static function isLogged() {
		if(Session::has('user_id'))
			return true;
		else
			return false;
	}

	public static function isAdmin() {
		if(Session::get('user_type') > 1)
			return true;
		else
			return false;
	}

	public function lugares() {
		return $this->hasMany('Lugar');
	}

	public function profiles() {
        return $this->hasMany('Profile');
    }

	public function getAuthIdentifier() {
    	return $this->getKey();
    }

    public function getAuthPassword() {
    	return $this->password;
    }

    public function comentarios() {
        return $this->hasMany('Comentario');
    }

    public function reviews() {
        return $this->hasMany('Review');
    }

}