<?php

class UserController extends BaseController {

	public function dashboard()
	{
		return View::make('users.dashboard');
	}

	public function get_login()
	{
		if(User::isLogged())
			return Redirect::to('/dashboard');
		else
			return View::make('users.login');
	}

	public function post_login()
	{
		$input = Input::all();

		$rules = array(
			'username' => 'required|exists:users,username',
			'password' => 'required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$username = Input::get('username');
			$password = Input::get('password');

			if($user = User::where('username', '=', $username)->first())
			{
				if(Hash::check($password, $user->password))
				{
					Session::put('user_id', $user->id);
					Session::put('user_username', $user->username);
					Session::put('user_type', $user->type);
					return Redirect::to('/dashboard');
				}
				else
				{
					return Redirect::to('/login');
				}
			}
			else
			{
				return Redirect::to('/login');
			}

		}
	}

	public function logout()
	{
		Session::flush();
		return Redirect::to('/');
	}

	public function get_signup()
	{
		if(User::isLogged())
		{
			return Redirect::to('/dashboard');
		}
		else
		{
			return View::make('users.signup');
		}
	}

	public function post_signup()
	{
		$input = Input::all();

		$rules = array(
			'username' => 'required|unique:users,username',
			'email' => 'required|email|unique:users,email',
			'password' => 'required',
			'password2' => 'required|same:password',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$user = new User;
				$user->username = Input::get('username');
				$user->password = Hash::make(Input::get('password'));
				$user->email = Input::get('email');
				$user->type = 1;
			$user->save();

			return Redirect::to('/login')->with('registro', 'Registro completado. Accede a su cuenta');
		}
	}
}