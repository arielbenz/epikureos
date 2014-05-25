<!DOCTYPE html>
<html lang="es">

<?php
	$cad = $_SERVER['REQUEST_URI'];
	$current = explode("/", $cad);

	if (in_array("novedades", $current)) {
    	$actual = "novedades";
	} else if (in_array("laposta", $current)) {
		$actual = "laposta";
	} else if (in_array("promos", $current)) {
		$actual = "promos";
	} else if (in_array("quees", $current)) {
		$actual = "quees";
	} else if (in_array("contacto", $current)) {
		$actual = "contacto";
	}

	$url = "http://".$_SERVER['HTTP_HOST'];
	require_once($_SERVER ['DOCUMENT_ROOT'].'/blog/wp-config.php');
?>

<head>
	<title>Tu Salida - Tus salidas en un solo lugar</title>

	<meta charset="utf-8" />
	<meta description = "Tu Salida - Tus salidas en un solo lugar"/>

	<meta name="keywords" content="Salidas, Comidas, Bebidas, Comer, Tomar, Cerveza, Santa Fe, Gastronomía, Bares, Resto, Restaurant, Café, Heladerías, Postres, Pizzas, Gourmet" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<link rel="shorcut icon" type="image/x-icon" href="<?php echo $url;?>/img/favicon.ico" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/style.css" />

	<script src="<?php echo $url?>/js/jquery-1.11.0.min.js"></script>

	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-47164304-1']);
		_gaq.push(['_trackPageview']);

		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
		
	</script>

	<script>
	// 	// This is called with the results from from FB.getLoginStatus().
	//   	function statusChangeCallback(response) {
	//     	console.log('statusChangeCallback');
	//     	console.log(response);
	// 	    // The response object is returned with a status field that lets the
	// 	    // app know the current login status of the person.
	// 	    // Full docs on the response object can be found in the documentation
	// 	    // for FB.getLoginStatus().
	//     	if (response.status === 'connected') {
	//       		// Logged into your app and Facebook.
	//       		testAPI();
	//     	} else if (response.status === 'not_authorized') {
	//       		// The person is logged into Facebook, but not your app.
	//       		document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
	//     	} else {
	//       		// The person is not logged into Facebook, so we're not sure if
	//       		// they are logged into this app or not.
	//       		document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
	//     	}
	//   	}

	// 	// This function is called when someone finishes with the Login
	// 	// Button.  See the onlogin handler attached to it in the sample
	// 	// code below.
	//   	function checkLoginState() {
	// 	    FB.getLoginStatus(function(response) {
	//     		statusChangeCallback(response);
	//     	});
	//   	}

	//   	window.fbAsyncInit = function() {
	//   		FB.init({
	//     		appId      : '283139271849796',
	//     		cookie     : true,  // enable cookies to allow the server to access the session
	//     		xfbml      : true,  // parse social plugins on this page
	//     		version    : 'v2.0' // use version 2.0
	//   		});

	// 		// Now that we've initialized the JavaScript SDK, we call 
	// 		// FB.getLoginStatus().  This function gets the state of the
	// 		// person visiting this page and can return one of three states to
	// 		// the callback you provide.  They can be:
	// 		//
	// 		// 1. Logged into your app ('connected')
	// 		// 2. Logged into Facebook, but not your app ('not_authorized')
	// 		// 3. Not logged into Facebook and can't tell if they are logged into
	// 		//    your app or not.
	// 		//
	// 		// These three cases are handled in the callback function.

	// 	  	FB.getLoginStatus(function(response) {
	// 	    	statusChangeCallback(response);
	// 	  	});

	// 	};

	//   	//Logout function
	//   	function Logout() {
	//   		FB.logout(function(response) {
	//   			console.log(response);
	//   			document.location.reload();
	//   		});
	// 	}

	//   	// Load the SDK asynchronously
	//   	(function(d, s, id) {
	//     	var js, fjs = d.getElementsByTagName(s)[0];
	//     	if (d.getElementById(id)) return;
	//     	js = d.createElement(s); js.id = id;
	//     	js.src = "//connect.facebook.net/es_ES/sdk.js";
	//     	fjs.parentNode.insertBefore(js, fjs);
	//   	}(document, 'script', 'facebook-jssdk'));

	// 	// Here we run a very simple test of the Graph API after login is
	// 	// successful.  See statusChangeCallback() for when this call is made.
	// 	function testAPI() {
	//     	console.log('Bienvenido! Obteniendo información del usuario.... ');
	//     	FB.api('/me', function(response) {
	//       		console.log('Login correcto para: ' + response.name);
	//       		document.getElementById('status').innerHTML = 'Gracias por loguearse, ' + response.name + '!';
	//     	}
	//     );
	// }

	// </script>
	
</head>

<body>
	<header>
		<div id="header-nav">
			<?php
				$hora = date("H") - 3;
				
				if ($hora >= 0 && $hora < 6) {
					$dia = "noche.png";	
					$fondo = "header-noche.jpg";
				}
				else if ($hora >= 6 && $hora < 12) {
					$dia = "amanecer.png";
					$fondo = "header-tarde.jpg";
				}	
				else if ($hora >= 12 && $hora < 17) {
					$dia = "dia.png";
					$fondo = "header-tarde.jpg";
				}	
				else if ($hora >= 17 && $hora < 20) {
					$dia = "atardecer.png";
					$fondo = "header-tarde.jpg";
				}	
				else {
					$dia = "noche.png";
					$fondo = "home-patricio2.png";
				}
			?>
			<div id="logo">
				<a href="<?php echo $url?>/"><img title="Tu Salida - Tus salidas en un solo lugar" alt="Tu Salida" src="<?php echo $url?>/img/logo.png"></a>
			</div>

			<nav id="menu">
				<ul>
					<li id="menu-inicio"><a href="<?php echo $url?>">INICIO</a></li>
					<li <?php if ($actual == "novedades") echo 'class="menu-actual" id="menu-novedades">'; else echo '>'?> <a href="<?php echo $url?>/novedades">NOVEDADES</a></li>
					<li <?php if ($actual == "laposta") echo 'class="menu-actual" id="menu-laposta">'; else echo '>'?> <a href="<?php echo $url?>/laposta">LA POSTA</a></li>
					<!-- <li <?php if ($actual == "promos") echo 'class="menu-actual" id="menu-promos">'; else echo '>'?> <a href="<?php echo $url?>/promos">PROMOS</a></li> -->
					<li <?php if ($actual == "quees") echo 'class="menu-actual" id="menu-quees">'; else echo '>'?> <a href="<?php echo $url?>/quees">¿QUÉ ES?</a></li>
					<li <?php if ($actual == "contacto") echo 'class="menu-actual" id="menu-contacto">'; else echo '>'?> <a href="<?php echo $url?>/contacto">CONTACTO</a></li>
				</ul>
			</nav>

			<div id="ciudad">
				<label>
					<select>
						<option value ="santafe" selected>SANTA FE</option>
					</select>
				</label>
				<div id="logo-dia">
					<img alt="Hora día" src="<?php echo $url?>/img/<?php echo $dia?>">
				</div>
			</div>
			
		</div>
		
	</header>