
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

	<div class="page-section">

		<section class="barra-content barra-content--busqueda">
			<div class="barra">
				<div class="barra-titulo">
					<h2><b class="font-normal">RESULTADOS</b><b class="font-bold">BÚSQUEDA</b></h2>
				</div>
			</div>
		</section>

		<section id="mapa">

		</section>

		<section class="content-busqueda">

			<div class="search-resultnav">

				<div class="search-headernav__info">
					<h3><b class="font-normal"><?php echo $lugares->getTotal();?> RESULTADOS PARA  </b><b class="font-bold">"<?php echo strtoupper($busqueda);?>"</b><b class="font-normal uppertext"> EN <?php echo $ciudad; ?></b></h3>	
				</div>

				<div class="search-headernav__advance">
					<div class="search-headernav__advance__food">
						<select class="cs-select">
							<option value="" disabled selected>Tipo de Comida</option>
							 <?php foreach ($comidas as $comida): ?>
								<option value="<?php echo $comida->slug ?>"><?php echo $comida->descripcion ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					
					<div class="search-headernav__advance__search">
						<form class="form-search" action="<?php echo $url?>/busqueda" method="POST">
							<input id="input-search" type="text" name="lugar" placeholder="Buscá otro lugar..." required></input>
						</form>
					</div>
				</div>

			</div>
		
			<div class="search-results">
			    <?php foreach ($lugares as $lugar): ?>
			        
			        <div class="box-result">
		 				<div class="box-result-image">
		 					<a href="<?php echo $url?>/lugares/<?php echo $lugar->slug?>">
		 						<img src="<?php echo $url ?>/assets/images/<?php echo $city; ?>/<?php echo $lugar->slug ?>/thumb.jpg">
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

			<div class="result-footer">
				<?php echo $lugares->links(); ?>
			</div>
			
		</section>

	</div>

	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>

