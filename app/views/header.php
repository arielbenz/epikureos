<!DOCTYPE html>
<html lang="es">

<?php
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

	<?php
	if ($seccion == "home") { ?>
		<link rel="stylesheet" href="<?php echo $url;?>/assets/css/home.css" />
	<?php } else if ($seccion == "busqueda") { ?>
		<link rel="stylesheet" href="<?php echo $url;?>/assets/css/search.css" />
	<?php } else if ($seccion == "lugar") { ?>
		<link rel="stylesheet" href="<?php echo $url;?>/assets/css/lugar.css" />
	<?php } else if ($seccion == "perfil") { ?>
		<link rel="stylesheet" href="<?php echo $url;?>/assets/css/perfil.css" />
	<?php } else if ($seccion == "blog" || $seccion == "novedades" || $seccion == "laposta") { ?>
		<link rel="stylesheet" href="<?php echo $url;?>/assets/css/blog.css" />
	<?php } else { ?>
		<link rel="stylesheet" href="<?php echo $url;?>/assets/css/style.css" />
	<?php } ?>
	
	<script> var city = "<?php echo $city; ?>"; </script>

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
					<li class="menu-item menu-novedades <?php if ($seccion == "novedades") echo 'menu-actual">'; else echo '">'?><a class="menu-item-link" href="/novedades">NOVEDADES</a></li>
					<li class="menu-item menu-laposta <?php if ($seccion == "laposta") echo 'menu-actual">'; else echo '">'?> <a class="menu-item-link" href="/laposta">LA POSTA</a></li>
					<li class="menu-item menu-quees <?php if ($seccion == "quees") echo 'menu-actual">'; else echo '">'?> <a class="menu-item-link" href="/quees">¿QUÉ ES?</a></li>
					<li class="menu-item menu-contacto <?php if ($seccion == "contacto") echo 'menu-actual">'; else echo '">'?> <a class="menu-item-link" href="/contacto">CONTACTO</a></li>
				</ul>
			</nav>

			<div class="ciudad">
				<select class="select-city">
					<option value ="santafe">SANTA FE</option>
					<option value ="parana">PARANÁ</option>
				</select>
			</div>

			<?php
			if($seccion != "blog" && $seccion != "novedades" && $seccion != "laposta") { ?>
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