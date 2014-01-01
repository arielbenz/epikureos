
	<!-- HEADER -->

	<?php include "app/views/header.php";?>

	<link rel="stylesheet" href="<?php echo $url;?>/css/lugar.css" />

	<?php include "app/views/menu.php";?>

	<!-- CONTENT -->

	<section id="barra-lugar" class="barra-content">
		<div id="barra">
			<div id="barra-titulo">
				<h2><b class="font-normal">ALTO</b><b class="font-bold">LUGAR</b></h2>
			</div>
		</div>
	</section>

	<section id="content-lugar">

		<div id="info-barra">

		</div>

		<div id="info-lugar-left">
			<div id="lugar-title">
				<div id="lugar-nombre">
					<h2><?php echo $lugar->nombre; ?></h2>
				</div>

				<div id="lugar-direccion" class="lugar-title-comun">
					<?php echo $lugar->direccion; ?>
				</div>

				<div id="lugar-tel" class="lugar-title-comun">
					<?php echo $lugar->telefono; ?>
				</div>

				<div id="lugar-web" class="lugar-title-comun">
					<?php echo $lugar->web; ?>
				</div>
			</div>

			<div id="lugar-descripcion">
				<?php echo $lugar->descripcion; ?>
			</div>

			<div id="lugar-utiles">
				
			</div>

		</div>

		<div id="info-lugar-middle">
			<div id="lugar-mapa">

			</div>
		</div>

		<div id="info-lugar-right">
			<div id="lugar-fotos">
			</div>
			<div id="lugar-links">
				<ul>
					<li><a href=<?php
									if ($lugar->facebook == "")
										echo "#";
									else
										echo $lugar->facebook;
								?> 
 							 class="contacto-face"></a></li>

      				<li><a href=<?php if ($lugar->twitter == "")
										echo "#";
									else
										echo $lugar->twitter;
								 ?> class="contacto-twitter"></a></li>
       				<li><a href="#" class="contacto-plus"></a></li>
				</ul>
			</div>
		</div>

		<div id="tags-barra">

		</div>

		<div id="comentarios-lugar">

		</div>

	</section>

	<script src="<?php echo $url;?>/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<script>

		$(document).on("ready", inicio);

		var lugar = $.parseJSON('<?php echo $lugar?>');

		function inicio ()
		{
            var latlon = new google.maps.LatLng(lugar.latitud, lugar.longitud);
	        var myOptions = {
	            zoom: 16,
	            center: latlon,
	            scrollwheel: false,
	            mapTypeId: google.maps.MapTypeId.ROADMAP
	        };
        	var map = new google.maps.Map($("#lugar-mapa").get(0), myOptions);

        	var marcador = new google.maps.Marker({
	            position: latlon,
	            map: map
	        });
	        
		}

	</script>


<!-- FOOTER -->

<?php include "app/views/footer.php";?>