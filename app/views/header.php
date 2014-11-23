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

	<link rel="shorcut icon" type="image/x-icon" href="<?php echo $url;?>/img/favicon.ico" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/style.css" />
	<script src="<?php echo $url?>/js/jquery-1.11.1.min.js"></script>

	<script>
		var city = "<?php echo $city; ?>";
	</script>

	<script>
	    $(function() {
	        var btn_movil = $('#nav-mobile'),
	           	menu = $('#menu').find('ul');
	        btn_movil.on('click', function (e) {
	            e.preventDefault();
	            var el = $(this);
	            el.toggleClass('nav-active');
	            menu.toggleClass('open-menu');
	        })
	    });
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
				<a href="<?php echo $url?>/"><img title="Tu Salida | Tus salidas en un solo lugar" alt="Tu Salida" src="<?php echo $url?>/img/logo.png"></a>
			</div>

			<nav id="menu"><a class="nav-mobile" id="nav-mobile" href="#"></a>
				<ul>
					<li id="menu-inicio"><a href="<?php echo $url?>">INICIO</a></li>
					<li <?php if ($actual == "novedades") echo 'class="menu-actual" id="menu-novedades">'; else echo '>'?> <a href="/novedades">NOVEDADES</a></li>
					<li <?php if ($actual == "laposta") echo 'class="menu-actual" id="menu-laposta">'; else echo '>'?> <a href="/laposta">LA POSTA</a></li>
					<li <?php if ($actual == "quees") echo 'class="menu-actual" id="menu-quees">'; else echo '>'?> <a href="/quees">¿QUÉ ES?</a></li>
					<li <?php if ($actual == "contacto") echo 'class="menu-actual" id="menu-contacto">'; else echo '>'?> <a href="/contacto">CONTACTO</a></li>
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
		    					<li><div class="menu-login tooltip"><span>Iniciar Sesión</span></div></li>
		    			<?php
		    			}
		    		}
					?>
				</ul>
				
			</nav>

			<div id="ciudad">
				<label>
					<select class="select-city">
						<option value ="santafe">SANTA FE</option>
						<option value ="parana">PARANÁ</option>
					</select>
				</label>
				<div id="logo-dia">
					<img alt="Hora día" src="<?php echo $url?>/img/<?php echo $dia?>">
				</div>
			</div>
			
		</div>
		
	</header>