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
				<a href="<?php echo $url?>/" title="Tu Salida - Tus salidas en un solo lugar"><img alt="Tu Salida" src="<?php echo $url?>/img/logo.png"></a>
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

			<div class="login">
				<fb:login-button perms="email,user_birthday"></fb:login-button>
			</div>

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