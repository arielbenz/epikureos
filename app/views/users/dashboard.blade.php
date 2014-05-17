@extends('layouts.base')

@section('content')

	<h1>Dashboard</h1>

	<p>Hola {{Session::get('user_username')}}</p>
	<p><a href="/logout">¿Salir?</a></p>

@stop