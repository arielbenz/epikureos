
	<!-- HEADER -->
	
	<?php include "app/views/header.php";?>

	<?php
		$nombres = array();
	 	$latitudes = array();
	 	$longitudes = array();
	 	$tipos = array();
	 	$slugs = array();

	 	$i = 0;
	?>

	<!-- CONTENT -->

	<section id="barra-terminos" class="barra-content">
		<div id="barra">
			<div id="barra-titulo">
				<h2><b class="font-normal">SANTAFE</b><b class="font-bold">ALACARTA</b></h2>
			</div>
		</div>
	</section>

	<section id="mapa">

	</section>

	<section class="content-busqueda">

		<div class="evento-section">
			<a href="http://santafealacarta2014.com.ar"><img src="<?php echo $url?>/img/santafealacarta.jpg"></a>
		</div>
	
		<div class="search-results">
		    <?php foreach ($lugares as $lugar): ?>
		        
		        <div class="box-result">
	 				<div class="box-result-image">
	 					<a href="<?php echo $url?>/lugares/<?php echo $lugar->slug?>">
	 						<img src="<?php echo $url ?>/images/<?php echo $city; ?>/<?php echo $lugar->slug ?>/thumb.jpg">
	 					</a>
	 				</div>
	 				<div class="box-result-data">
	 					<div class="box-result-rating">
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
					$slugs[$i] = $lugar->slug;
					$latitudes[$i] = $lugar->latitud;
					$longitudes[$i] = $lugar->longitud;
					$tipos[$i] = $lugar->enMapa($lugar->mapa_id);
					$i = $i + 1;
				?>

		    <?php endforeach; ?>

		</div>

		<div id="result-footer">
			<?php echo $lugares->links(); ?>
		</div>
		
	</section>

	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	
	<script src="<?php echo $url?>/js/busqueda.min.js"></script>

	<script>
    	var nombres = $.parseJSON('<?php echo json_encode($nombres)?>');
    	var slugs = $.parseJSON('<?php echo json_encode($slugs)?>');
    	var latitudes = $.parseJSON('<?php echo json_encode($latitudes)?>');
    	var longitudes = $.parseJSON('<?php echo json_encode($longitudes)?>');
    	var tipos = $.parseJSON('<?php echo json_encode($tipos)?>');
    	setLugares("<?php echo $url ?>", nombres, latitudes, longitudes, tipos, slugs);

		var urlBusqueda = "<?php echo $url ?>" + "/busqueda/" + "<?php echo $busqueda ?>";
		$(document).on("ready", function() {
			var comida = "<?php echo $comidaBusqueda->slug; ?>";
			$(".cs-select option").each(function() {
				if ($(this).val() == comida) {
					$(this).attr("selected", "selected");
				}
			});
			$(".cs-select").change(function(){
				window.location = "<?php echo $url ?>" + "/busqueda/" + "<?php echo $busqueda ?>/" + $(this).val();
			});
		});
	</script>

	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>