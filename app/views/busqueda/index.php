<!DOCTYPE html>
<html lang="es">

<?php
	$cad = $_SERVER['REQUEST_URI'];
	$actual = explode("/", $cad)[2];
	$url = "http://localhost/epikureos";
?>

<head>
	<meta charset="utf-8" />
	<title>Epikureos - Un nuevo hábito gastronómico</title>

	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,900,700,300,200,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo $url;?>/css/normalize.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/style.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/busqueda.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
</head>

<body>

	<!-- HEADER -->
	
	<?php include "app/views/menu.php";?>

	<!-- BODY -->

	<section id="barra-busqueda" class="barra-content">
		<div id="barra">
			<div id="barra-titulo">
				<h2><b class="font-normal">RESULTADOS</b><b class="font-bold">BÚSQUEDA</b></h2>
				<div id="barra-back">
					<label>

					</label>
				</div>
			</div>
		</div>
	</section>

	<section id="mapa">

	</section>

	<section id="content-busqueda">

		<div id="data-result">
			<div id="search-header">
				<h3>50 RESULTADOS PARA "<?php echo strtoupper($busqueda); ?>"</h3>
				<h4>Mostrando 6 de 50 resultados</h4>
			</div>

			<div id="search-combo">
				<input id="input-search" type="text" name="search" placeholder="Buscar..." required></input>
			</div>
		</div>

		<article id="results">

			<?php 
				if (count($lugares) > 0) {
					foreach ($lugares as $lugar) { 
					   echo "Lugar: $lugar->nombre"; 
					   echo "<br>";
					} 
				} else {
					echo "No se encontraron resultados para la búsqueda realizada.";
				}
			?>
		</article>
	</section>

	<section id="home-publicidad">
		<article id="publicidad1" class="class-publi"></article>
		<article id="publicidad2" class="class-publi"></article>
		<article id="publicidad3" class="class-publi"></article>
		<article id="publicidad4" class="class-publi"></article>
	</section>


	<script>

		$(document).on("ready", inicio);
			function inicio () 
			{
				var latlon = new google.maps.LatLng(-31.632389, -60.699459);
	            var myOptions = {
	                zoom: 15,
	                center: latlon,
	                mapTypeId: google.maps.MapTypeId.ROADMAP
	            };
	            map = new google.maps.Map($("#mapa").get(0), myOptions);
	            
	            var coorMarcador = new google.maps.LatLng(-31.632389, -60.699459);
	                
	            var marcador = new google.maps.Marker({
	                position: coorMarcador,
	                map: map,
	                title: "Dónde estoy?"
	            });
			}

	</script>

	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>

