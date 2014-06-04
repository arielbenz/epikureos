
	<!-- HEADER -->

	<?php include "app/views/header.php";?>

	<?php
		$nombres = array();
	 	$latitudes = array();
	 	$longitudes = array();

	 	$i = 0;
	?>

	<!-- JAVASCRIPT -->

	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	
	<script>

		var popup;

		function setLugares(nombres, latitudes, longitudes) {

			var latlon = new google.maps.LatLng(-31.632389, -60.699459);
	        var myOptions = {
	            zoom: 14,
	            center: latlon,
	            scrollwheel: false,
	            mapTypeId: google.maps.MapTypeId.ROADMAP
	        };

	        var map = new google.maps.Map($("#mapa").get(0), myOptions);
	        var bounds = new google.maps.LatLngBounds();

			for(i = 0; i < nombres.length; i++) {
				var marker = new google.maps.LatLng(latitudes[i], longitudes[i]);
				addMark(map, marker, nombres[i], bounds);
			}

			//centerMap
			if(nombres.length > 1) {
				map.fitBounds(bounds);
				map.setCenter(bounds.getCenter());
			}
		}

		function addMark(map, location, title, bounds) {
            var marcador = new google.maps.Marker({
	            position: location,
	            map: map,
	            title: title
	        });

	        bounds.extend(marcador.position);

			google.maps.event.addListener(marcador, "mouseover", function() {
				if(!popup){
	                popup = new google.maps.InfoWindow();
	            }
	            var note = "<div class='info-window'><p>"+ title +"</p></div>";
	            popup.setContent(note);
	            popup.open(map, this);
			});
        }

	</script>

	<!-- CONTENT -->

	<section id="barra-busqueda" class="barra-content">
		<div id="barra">
			<div id="barra-titulo">
				<h2><b class="font-normal">RESULTADOS</b><b class="font-bold">BÚSQUEDA</b></h2>
			</div>
		</div>
	</section>

	<section id="mapa">

	</section>

	<section id="content-busqueda">

		<div id="search-header">
			<h3><b class="font-normal"><?php echo $lugares->getTotal();?> RESULTADOS PARA </b><b class="font-bold">"<?php echo strtoupper($busqueda);?>"</b></h3>	
		</div>

		<div id="search-combo">
			<form class="form-search" action="<?php echo $url?>/busqueda" method="POST">
				<input id="input-search" type="text" name="lugar" placeholder="Buscar..." required></input>
			</form>
		</div>

		<!-- <div id="result-bar">
			<div id="result-bar-etiquetas">
				<p>Etiquetas</p>
			</div>
			<div id="result-bar-filter">
				<p>Ordenar por</p>
			</div>
		</div> -->

		<div id="results">
		    
		    <?php foreach ($lugares as $lugar): ?>
		        
		        <div class="box-result">
	 				<div class="box-result-image">
	 					<a href="<?php echo $url?>/lugares/<?php echo $lugar->slug?>">
	 						<img src="<?php $foto = Lugar::getThumb($lugar->id)->url; echo $foto;?>"/>
	 					</a>
	 				</div>
	 				<div class="box-result-data">
	 					<div class="data-left">
	 						<span class="lugar-ratings-stars">
			                	<?php	
								for ($i = 1; $i <= 5; $i++) { ?>
			    					<span class="glyphicon glyphicon-star<?php
			    						if($i <= $lugar->rating_cache) {
			    							echo "";
					    				} else {
					    					echo "-empty";
					    				}
									?>">
									</span>
			    				<?php
			    				}
			    				?>
								
								<?php
			    					echo number_format($lugar->rating_cache, 1);
			    					echo " estrellas";
			    				?>
		    				</span>
	 						<div class="box-result-title">
	 							<a href="<?php echo $url?>/lugares/<?php echo $lugar->slug?>"> <?php echo $lugar->nombre; ?>  </a>
	 						</div>
	 						<div class="box-result-address">
	 							<?php echo $lugar->direccion; ?>
	 						</div>
	 					</div>
	 					<!-- <div class="data-right"><a href="<?php echo $url?>/lugares/<?php echo $lugar->slug; ?>/vote">Votar</a></div> -->
	 				</div>
	 			</div>

	 			<?php
					$nombres[$i] = $lugar->nombre;
					$latitudes[$i] = $lugar->latitud;
					$longitudes[$i] = $lugar->longitud;
					$i = $i + 1;
				?>

		    <?php endforeach; ?>

		    <script>
		    	var nombres = $.parseJSON('<?php echo json_encode($nombres)?>');
		    	var latitudes = $.parseJSON('<?php echo json_encode($latitudes)?>');
		    	var longitudes = $.parseJSON('<?php echo json_encode($longitudes)?>');
		    	setLugares(nombres, latitudes, longitudes);
	 		</script>

		</div>

		<div id="result-footer">
			<?php echo $lugares->links(); ?>
		</div>
		
	</section>

	<!-- <section id="home-publicidad">
		<article id="publicidad1" class="class-publi"></article>
		<article id="publicidad2" class="class-publi"></article>
		<article id="publicidad3" class="class-publi"></article>
		<article id="publicidad4" class="class-publi"></article>
	</section> -->

	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>

