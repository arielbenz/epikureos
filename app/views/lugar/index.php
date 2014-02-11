
	<!-- HEADER -->

	<?php include "app/views/header.php";?>

	<link rel="stylesheet" href="<?php echo $url;?>/css/lugar.css" />

	<?php include "app/views/menu.php";?>

	<!-- CONTENT -->

	<section id="barra-lugar" class="barra-content">
		<div id="barra">
			<div id="barra-titulo">
				<h2><b class="font-normal">TU</b><b class="font-bold">LUGAR</b></h2>
			</div>
		</div>
	</section>

	<section id="content-lugar">

		<div id="info-barra">

		</div>

		<div id="info-lugar-left">
			<div id="lugar-title">

				<div id="lugar-title-left">
					<div id="lugar-nombre">
						<h1><?php echo $lugar->nombre; ?></h1>
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

				<div id="lugar-title-right">
					<ul>
						<?php
							if ($lugar->facebook != "")
								echo "<li><a href='$lugar->facebook'><img src='$url/img/face-lugar.png'></a></li>";

							if ($lugar->twitter != "")
								echo "<li><a href='$lugar->twitter'><img src='$url/img/twitter-lugar.png'></a></li>";
						?>
					</ul>
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
				<img src="<?php echo $url ?>/images/<?php echo $lugar->slug ?>/slide1.png">
			</div>

			<div id="lugar-links">
				<h4>RECOMENDÁ TU LUGAR</h4>
				<ul>
       				<!-- Facebook -->
					<li><a href="http://www.facebook.com/sharer.php?u=<?php echo URL::current();?>" target="_blank" class="contacto-face"></a></li>
					 
					<!-- Twitter -->
					<li><a href="https://twitter.com/intent/tweet?text=<?php echo $lugar->nombre; ?>&url=<?php echo URL::current();?>&via=altasalida" target="_blank" class="contacto-twitter"></a></li>

					<!-- Google+ -->
					<li><a href="https://plus.google.com/share?url=<?php echo URL::current();?>" target="_blank" class="contacto-plus"></a></li> 
				</ul>
			</div>

		</div>

		<div id="tags-barra">
			<div class="fb-comments" data-href="http://altasalida.com" data-numposts="5" data-colorscheme="light"></div>
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

		Share = {
			facebook: function(purl, ptitle, pimg, text) {
			url = 'http://www.facebook.com/sharer.php?s=100';
			url += '&p[title]=' + encodeURIComponent(ptitle);
			url += '&p[summary]=' + encodeURIComponent(text);
			url += '&p[url]=' + encodeURIComponent(purl);
			url += '&p[images][0]=' + encodeURIComponent(pimg);
			Share.popup(url);
			},
			twitter: function(purl, ptitle) {
			url = 'http://twitter.com/share?';
			url += 'text=' + encodeURIComponent(ptitle);
			url += '&url=' + encodeURIComponent(purl);
			url += '&counturl=' + encodeURIComponent(purl);
			Share.popup(url);
			},
			popup: function(url) {
			window.open(url,'','toolbar=0,status=0,width=626, height=436');
			}
		};

	</script>


<!-- FOOTER -->

<?php include "app/views/footer.php";?>