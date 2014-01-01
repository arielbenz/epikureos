<!DOCTYPE html>
<html lang="es">

<?php
	//Sitio online
	//$url = URL::to('/');

	//localhost
	$url = "http://".$_SERVER['HTTP_HOST'].'/prealtasalida';
?>

<head>
	<title>Alta Salida - Tus salidas en un solo lugar</title>

	<meta charset="utf-8" />
	<meta description = "Alta Salida - Tus salidas en un solo lugar"/>

	<meta name="keywords" content="Salidas, Comidas, Bebidas, Santa Fe, Gastronomía" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<link rel="shorcut icon" type="image/x-icon" href="<?php echo $url;?>/img/favicon.ico" />

	<link rel="stylesheet" href="<?php echo $url;?>/css/normalize.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/open-sans.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/titillium-web.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/style.css" />
	<script src="<?php echo $url?>/js/prefixfree.min.js"></script>


	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-28811670-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>

</head>

<body>

	<header>
		<div class="logo">
			<a href="<?php echo $url?>/"><img alt="Alta Salida" src="<?php echo $url?>/img/logo.png"></a>
		</div>
	</header>


	<footer>

	</footer>

</body>
</html>