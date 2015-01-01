<!DOCTYPE html>
<html lang="es">

<?php

	$hora = date("H") - 3;
	
	if ($hora >= 0 && $hora < 6) {
		$class_hora_dia = "nightlife_fondo";
	}
	else if ($hora >= 6 && $hora < 12) {
		$class_hora_dia = "breakfast_fondo";
	}
	else if ($hora >= 12 && $hora < 15) {
		$class_hora_dia = "lunch_fondo";
	}
	else if ($hora >= 15 && $hora < 18) {
		$class_hora_dia = "cake_fondo";
	}
	else if ($hora >= 18 && $hora < 20) {
		$class_hora_dia = "after_fondo";
	}
	else {
		$class_hora_dia = "dinner_fondo";
	}

	$cad = $_SERVER['REQUEST_URI'];
	$current = explode("/", $cad);
	$actual = "";

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
	} else if (in_array("blog", $current)) {
		$actual = "blog";
	}

	$url = "http://".$_SERVER['HTTP_HOST'];
	
	require_once($_SERVER ['DOCUMENT_ROOT'].'/blog/wp-config.php');
		
	$uid = 0;
?>

<head>
	<title>
		<?php
			if(is_single()) {
				echo wp_title(" | ", false, right);
			} else {
				echo "Tu Salida | Tus Salidas en un solo lugar";
			} 
		?>
	</title>

	<meta charset="utf-8" />
	<meta description = <?php
			if(is_single()) {
				echo wp_title(" | ", false, right);
			} else {
				echo "Tu Salida | Tus Salidas en un solo lugar";
			} 
		?>/>

	<meta name="keywords" content="Salidas, Comidas, Bebidas, Comer, Tomar, Cerveza, Santa Fe, Gastronomía, Bares, Resto, Restaurant, Café, Heladerías, Postres, Pizzas, Gourmet" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<link rel="shorcut icon" type="image/x-icon" href="<?php echo $url;?>/assets/img/favicon.ico" />
	<link rel="stylesheet" href="<?php echo $url;?>/assets/css/style.css" />

	<script>
		var city = "<?php echo $city; ?>";
	</script>
</head>

<body>

	<header class="header">
		<div class="header-nav">
			<div class="logo">
				<a href="<?php echo $url?>/"><img class="logo-img" title="Tu Salida | Tus salidas en un solo lugar" alt="Tu Salida" src="<?php echo $url?>/assets/img/logo.png"></a>
			</div>

			<nav class="menu"><a class="nav-mobile" href="#"></a>
				<ul class="menu-nav">
					<li class="menu-inicio menu-item"><a class="menu-item-link" href="<?php echo $url?>">INICIO</a></li>
					<li class="menu-item menu-novedades <?php if ($actual == "novedades") echo 'menu-actual">'; else echo '">'?><a class="menu-item-link" href="/novedades">NOVEDADES</a></li>
					<li class="menu-item menu-laposta <?php if ($actual == "laposta") echo 'menu-actual">'; else echo '">'?> <a class="menu-item-link" href="/laposta">LA POSTA</a></li>
					<li class="menu-item menu-quees <?php if ($actual == "quees") echo 'menu-actual">'; else echo '">'?> <a class="menu-item-link" href="/quees">¿QUÉ ES?</a></li>
					<li class="menu-item menu-contacto <?php if ($actual == "contacto") echo 'menu-actual">'; else echo '">'?> <a class="menu-item-link" href="/contacto">CONTACTO</a></li>
				</ul>
			</nav>

			<div class="ciudad">
				<select class="select-city">
					<option value ="santafe">SANTA FE</option>
					<option value ="parana">PARANÁ</option>
				</select>
			</div>

			<?php
			if($actual != "novedades" && $actual != "laposta" && $actual != "blog") { ?>
				<div class="menu-login">
					<?php if (Auth::check()) { ?>
						<a class="logout-button">SALIR<img src="<?php echo Auth::user()->photo; ?>" style="width: 30px; position: relative; top: -1px; left: 7px;"></a>
	    			<?php } else { ?>
						<a class="login-button">INGRESAR</a>		
	    			<?php
	    			} ?>
    			</div>
    		<?php } ?>
			
		</div>
		
	</header>