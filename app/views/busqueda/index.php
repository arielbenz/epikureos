
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
			var ciudad = "<?php echo $city ?>";
			var latlon = null;
			if(ciudad == "santafe") {
				latlon = new google.maps.LatLng(-31.632389, -60.699459);
			} else if(ciudad = "parana") {
				latlon = new google.maps.LatLng(-31.741834, -60.511946);
			}
			
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
			<h3><b class="font-normal"><?php echo $lugares->getTotal();?> RESULTADOS PARA  </b><b class="font-bold">"<?php echo strtoupper($busqueda);?>"</b><b class="font-normal uppertext"> EN <?php echo $ciudad; ?></b></h3>	
		</div><div id="search-combo">
			<form class="form-search" action="<?php echo $url?>/busqueda" method="POST">
				<input id="input-search" type="text" name="lugar" placeholder="Buscar..." required></input>
			</form>
		</div>

		<div id="results">
		    
		    <?php foreach ($lugares as $lugar): ?>
		        
		        <div class="box-result">
	 				<div class="box-result-image">
	 					<a href="<?php echo $url?>/lugares/<?php echo $lugar->slug?>">
	 						<img src="<?php echo $url ?>/images/<?php echo $city; ?>/<?php echo $lugar->slug ?>/thumb.jpg">
	 					</a>
	 				</div>
	 				<div class="box-result-data">
	 					<div>
	 						<span class="lugar-ratings-stars">
			                	<?php	
								for ($star = 1; $star <= 5; $star++) { ?>
			    					<span class="glyphicon glyphicon-star<?php
			    						if($star <= $lugar->rating_cache) {
			    							echo "";
					    				} else {
					    					echo "-empty";
					    				}
									?>">
									</span>
			    				<?php 
			    				}
			    				echo number_format($lugar->rating_cache, 1);
			    				echo " estrellas";
			    				?>
		    				</span>
	    				</div>

 						<div class="box-result-title"><a href="<?php echo $url?>/lugares/<?php echo $lugar->slug?>"><?php echo $lugar->nombre; ?></a></div>
 						<div class="box-result-address">
 							<?php echo $lugar->direccion; ?>
 						</div>
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

	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>

