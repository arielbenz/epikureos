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

	//Sitio online
	//$url = URL::to('/');
	//require_once($_SERVER ['DOCUMENT_ROOT'].'/blog/wp-config.php');

	//Con localhost
	//$url = "http://".$_SERVER['HTTP_HOST'].'/epikureos';
	//require_once($_SERVER ['DOCUMENT_ROOT'].'epikureos/blog/wp-config.php');

	//Con virtual host epikureos.com
	$url = "http://epikureos.com";
	require_once($_SERVER ['DOCUMENT_ROOT'].'/blog/wp-config.php');
?>

<head>
	<title>Tu Salida - Tus salidas en un solo lugar</title>

	<meta charset="utf-8" />
	<meta description = "Tu Salida - Tus salidas en un solo lugar"/>

	<meta name="keywords" content="Salidas, Comidas, Bebidas, Comer, Tomar, Cerveza, Santa Fe, Gastronomía, Bares, Resto, Restaurant, Café, Heladerías, Postres, Pizzas, Gourmet" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<link rel="shorcut icon" type="image/x-icon" href="<?php echo $url;?>/img/favicon.ico" />

	<link rel="stylesheet" href="<?php echo $url;?>/css/normalize.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/open-sans.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/titillium-web.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/style.css" />
	<script src="<?php echo $url?>/js/prefixfree.min.js"></script>

	<script src="<?php echo $url?>/js/jquery-1.11.0.min.js"></script>

	<script src="//connect.facebook.net/es_ES/all.js"></script>

	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-47164304-1']);
		_gaq.push(['_trackPageview']);

		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

		//Facebook login

		// $(function() {
		// 	$.ajax({
		// 		url: '//connect.facebook.net/es_ES/all.js',
		// 		dataType: 'script',
		// 		cache: true,
		// 		success: function() {
		// 	  		FB.init({
		// 	    		appId: '283139271849796',
		// 	    		xfbml: true
		// 	  		});
			  	
		// 	  		FB.Event.subscribe('auth.authResponseChange', function(response) {
		// 	    		if (response && response.status == 'connected') {
		// 	      			FB.api('/me', function(response) {
		// 	        			alert('Nombre: ' + response.name);
		// 	      			});
		// 	    		}
		// 	  		});
		// 		}
		// 	});
		// });
		
	</script>

	