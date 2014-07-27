
	<!-- HEADER -->

	<?php include "app/views/header.php";?>

	<?php
		$nombres = array();
	 	$latitudes = array();
	 	$longitudes = array();

	 	$i = 0;
	?>

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
		</div><div class="comida-select">
		<label>
			<select class="cs-select">
				<option value="" disabled selected>Tipo de Comida</option>
				 <?php foreach ($comidas as $comida): ?>
					<option value="<?php echo $comida->slug ?>"><?php echo $comida->descripcion ?></option>
				<?php endforeach; ?>
			</select>
		</label>
		</div><div id="search-combo">
			<form class="form-search" action="<?php echo $url?>/busqueda" method="POST">
				<input id="input-search" type="text" name="lugar" placeholder="Buscá otro lugar..." required></input>
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

		    

		</div>

		<div id="result-footer">
			<?php echo $lugares->links(); ?>
		</div>
		
	</section>

	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	
	<script src="<?php echo $url?>/js/busqueda.min.js"></script>

	<script>
    	var nombres = $.parseJSON('<?php echo json_encode($nombres)?>');
    	var latitudes = $.parseJSON('<?php echo json_encode($latitudes)?>');
    	var longitudes = $.parseJSON('<?php echo json_encode($longitudes)?>');
    	setLugares(nombres, latitudes, longitudes);
	</script>

	

	<script>
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

