<!DOCTYPE HTML>
<html lang="es">
<head>
	<title>
		@section('titulo')
			Página principal
		@show 
		 | Epikureos
	</title>
	<meta charset="utf-8" />

	<!-- CSS -->
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
</head>
<body>

	<div class="container-full">

		<div class="row">
			<div class="col-lg-7 col-lg-offset-3" style="margin-bottom:50px;">
				<h1>Epikureos</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-5 col-lg-offset-3">
				@yield('content')
			</div>

			<div class="col-lg-2">
				@include('layouts/sidebar')
			</div>
		</div>

		<div class="row">
			<div class="col-lg-7 col-lg-offset-3">
				<footer>
					Epikureos
				</footer>
			</div>
		</div>

	</div>

	<!-- JS -->
	<script src="{{ URL::asset('js/jquery.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</body>
</html>