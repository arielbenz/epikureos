<!DOCTYPE HTML>
<html lang="es">
<head>
	<title>
		@section('titulo')
			Página principal
		@show 
		 | Tu Salida
	</title>
	<meta charset="utf-8" />

	<!-- CSS -->
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.complete.css') }}" />
</head>
<body>

	<div class="container-full">

		<div class="row">
			<div class="col-lg-9 col-lg-offset-1" style="margin-bottom:50px;">
				<h1>Panel de Administración</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-1 col-lg-offset-1">
				<h3>Menú principal</h3>
				<ul>
					<li><a href="{{URL::to('/admin')}}">Inicio</a></li>
					<li><a href="{{URL::to('/')}}">Ir a la web</a></li>
					<li><a href="{{URL::to('/logout')}}">Desconectarse</a></li>
				</ul>
				<h3>Artículos</h3>
				<ul>
					<li><a href="{{URL::to('/admin/lugares')}}">Lista de lugares</a></li>
					<li><a href="{{URL::to('/admin/lugares/add')}}">Añadir Lugar</a></li>
					<li><a href="{{URL::to('/admin/categorias')}}">Categorías</a></li>
					<li><a href="{{URL::to('/admin/etiquetas')}}">Etiquetas</a></li>
				</ul>
			</div>

			<div class="col-lg-9">
				@yield('content')
			</div>
		</div>

	</div>

	<!-- JS -->
	<script src="{{ URL::asset('js/jquery.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</body>
</html>