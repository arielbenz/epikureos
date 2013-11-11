<?php

class User extends Eloquent {

	protected $table = 'users';

	public static function isLogged()
	{
		if(Session::has('user_id'))
			return true;
		else
			return false;
	}

	public static function isAdmin()
	{
		if(Session::get('user_type') > 1)
			return true;
		else
			return false;
	}

	public function lugares()
	{
		return $this->hasMany('Lugar');
	}

}