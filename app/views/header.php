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

	$uid = 0;
?>

<head>
	<title>Tu Salida - Tus salidas en un solo lugar</title>

	<meta charset="utf-8" />
	<meta description = "Tu Salida - Tus salidas en un solo lugar"/>

	<meta name="keywords" content="Salidas, Comidas, Bebidas, Comer, Tomar, Cerveza, Santa Fe, Gastronomía, Bares, Resto, Restaurant, Café, Heladerías, Postres, Pizzas, Gourmet" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<link rel="shorcut icon" type="image/x-icon" href="<?php echo $url;?>/img/favicon.ico" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/style.css" />

	<script src="<?php echo $url?>/js/jquery-1.11.0.min.js"></script>
	<script src="<?php echo $url?>/js/modernizr.min.js"></script>

	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-47164304-1']);
		_gaq.push(['_trackPageview']);

		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
		if (window.location.hash && window.location.hash === "#_=_") {
		  if (Modernizr.history) {
		    window.history.replaceState("", document.title, window.location.pathname);
		  } else {
		    var scroll = {
		      top: document.body.scrollTop,
		      left: document.body.scrollLeft
		    };
		    window.location.hash = "";
		    document.body.scrollTop = scroll.top;
		    document.body.scrollLeft = scroll.left;
		  }
		}
	</script>
	
</head>

<body>
	<header class="header">
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
					<li <?php if ($actual == "quees") echo 'class="menu-actual" id="menu-quees">'; else echo '>'?> <a href="<?php echo $url?>/quees">¿QUÉ ES?</a></li>
					<li <?php if ($actual == "contacto") echo 'class="menu-actual" id="menu-contacto">'; else echo '>'?> <a href="<?php echo $url?>/contacto">CONTACTO</a></li>
					<?php
					if($actual != "novedades" && $actual != "laposta") {
						if (Auth::check()) {
						?>
								<li>
									<img src="<?php echo Auth::user()->photo; ?>" style="width: 30px; position: relative; top: 9px; left: 45px;" alt="">
									<div class="menu-logout">Cerrar Sesión</div>
								</li>
		    			<?php
		    				} else {
		    			?>
		    					<li><div class="menu-login">Iniciar Sesión</div></li>
		    			<?php
		    			}
		    		}
					?>
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