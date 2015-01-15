
	<!-- HEADER -->
	
	<?php include "app/views/header.php";?>

	<?php
		$nombres = array();
	 	$latitudes = array();
	 	$longitudes = array();
	 	$niveles = array();
	 	$slugs = array();

	 	$i = 0;
	?>

	<!-- CONTENT -->

	<section class="barra-content barra-content--terminos">
		<div class="barra">
			<div class="barra-titulo">
				<h2><b class="font-normal">SANTAFE</b><b class="font-bold">ALACARTA</b></h2>
			</div>
		</div>
	</section>

	<section id="mapa">

	</section>

	<section class="content-busqueda">
		<div class="evento-info">
			<ul>
				<li class="evento-info-data">
					<img src="<?php echo $url ?>/assets/img/map-icons/pinmap-alta.png">
					<p>Alta Cocina ($140)</p>
				</li>
				
				<li class="evento-info-data">
					<img src="<?php echo $url ?>/assets/img/map-icons/pinmap-regional.png">
					<p>Regional ($120)</p>
				</li>
				<li class="evento-info-data">
					<img src="<?php echo $url ?>/assets/img/map-icons/pinmap-tabla.png">
					<p>A la tabla ($90)</p>
				</li>
			</ul>
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
					$niveles[$i] = $lugar->enNivel($lugar->nivel_id);
					$i = $i + 1;
				?>

		    <?php endforeach; ?>

		</div>

		<div class="result-footer">
			<?php echo $lugares->links(); ?>
		</div>
		
	</section>

	<div id="cronograma" class="crono-section">

		<div class="crono-section-title">
			<h2>CRONOGRAMA DE ACTIVIDADES</h2>
		</div>

		<div class="crono-section-dia">
			<div id="martes" class="dia-title">MARTES 14</div>
			<ul class="dia-actividades">
				<li>
					<div class="crono crono-dia crono-dia--hoy"><p>8:30 a 12 y 14 a 19</p></div>
					<div class="crono crono-actividad crono-actividad--hoy"><p>Muestra "La Historia en los platos y platos con Historia"</p></div>
					<div class="crono crono-lugar crono-lugar--hoy"><p>Museo Etnográfico y Colonial</p></div>
				</li>
				<li>
					<div class="crono crono-dia crono-dia--hoy"><p>8:30 a 19:00</p></div>
					<div class="crono crono-actividad crono-actividad--hoy"><p>Muestra "Del cuenco al descartable a la hora de comer"</p></div>
					<div class="crono crono-lugar crono-lugar--hoy"><p>Museo Histórico Provincial</p></div>
				</li>
				<li>
					<div class="crono crono-dia crono-dia--hoy"><p>9:00 a 14:00</p></div>
					<div class="crono crono-actividad crono-actividad--hoy"><p>Muestra "Sabores y lugares de época"</p></div>
					<div class="crono crono-lugar crono-lugar--hoy"><p>Archivo General de la Provincia</p></div>
				</li>
				<li>
					<div class="crono crono-dia crono-dia--hoy"><p>10:00 a 24:00</p></div>
					<div class="crono crono-actividad crono-actividad--hoy"><p>Exposición Fotográfica</p></div>
					<div class="crono crono-lugar crono-lugar--hoy"><p>Pastelería Dai Sladky</p></div>
				</li>
				<li>
					<div class="crono crono-dia crono-dia--hoy"><p>14:00</p></div>
					<div class="crono crono-actividad crono-actividad--hoy crono-actividad--pre" data-tooltip="Actividad gratuita, con cupo limitado e inscripción previa"><p>Visita al Mercado de Productores</p></div>
					<div class="crono crono-lugar crono-lugar--hoy"><p>Mercado de Productores</p></div>
				</li>
				<li>
					<div class="crono crono-dia crono-dia--hoy"><p>17:00</p></div>
					<div class="crono crono-actividad crono-actividad--hoy"><p>Visita a la Casa de la Cervecería Santa Fe</p></div>
					<div class="crono crono-lugar crono-lugar--hoy"><p>Cervecería Santa Fe</p></div>
				</li>
				<li>
					<div class="crono crono-dia crono-dia--hoy"><p>18:00</div>
					<div class="crono crono-actividad crono-actividad--hoy crono-actividad--pre" data-tooltip="Actividad gratuita, con cupo limitado e inscripción previa"><p>Charla "Historia de la coctelería y sus clásicos". Degustación.</p></div>
					<div class="crono crono-lugar crono-lugar--hoy"><p>Museo Histórico Provincial</p></div>
				</li>
				<li>
					<div class="crono crono-dia crono-dia--hoy"><p>19:00</p></div>
					<div class="crono crono-actividad crono-actividad--hoy crono-actividad--pre" data-tooltip="Actividad gratuita, con cupo limitado e inscripción previa"><p>Clase Abierta de Cocina para Celíacos</p></div>
					<div class="crono crono-lugar crono-lugar--hoy"><p>Asoc. Hotelera Gastronómica</p></div>
				</li>
				<li>
					<div class="crono crono-dia crono-dia--hoy"><p>19:00</p></div>
					<div class="crono crono-actividad crono-actividad--hoy"><p>Exhibición Trabajos Finales Gastronomía</p></div>
					<div class="crono crono-lugar crono-lugar--hoy"><p>Instituto Sol</p></div>
				</li>
				<li>
					<div class="crono crono-dia crono-dia--hoy"><p>19:30</p></div>
					<div class="crono crono-actividad crono-actividad--hoy"><p>Inauguración Muestra Plásticos Santafesinos</p></div>
					<div class="crono crono-lugar crono-lugar--hoy"><p>Alianza Francesa</p></div>
				</li>
				<li>
					<div class="crono crono-dia crono-dia--hoy"><p>20:00</p></div>
					<div class="crono crono-actividad crono-actividad--hoy crono-actividad--pre" data-tooltip="Actividad gratuita, con cupo limitado e inscripción previa"><p>Cata de Té</p></div>
					<div class="crono crono-lugar crono-lugar--hoy"><p>Instituto Sol</p></div>
				</li>
				<li>
					<div class="crono crono-dia crono-dia--hoy"><p>20:30</div>
					<div class="crono crono-actividad crono-actividad--hoy"><p>Inauguración Muestra Temática "A punto caramelo"</p></div>
					<div class="crono crono-lugar crono-lugar--hoy"><p>Hall Escuela de Artes Visuales "Juan Mantovani"</p></div>
				</li>
			</ul>
		</div>

		<div class="crono-section-dia">
			<div id="miercoles" class="dia-title">MIÉRCOLES 15</div>
			<ul class="dia-actividades">
				<li>
					<div class="crono crono-dia"><p>8:30 a 12 y 14 a 19</p></div>
					<div class="crono crono-actividad"><p>Muestra "La Historia en los platos y platos con Historia"</p></div>
					<div class="crono crono-lugar"><p>Museo Etnográfico y Colonial</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>8:30 a 19:00</p></div>
					<div class="crono crono-actividad"><p>Muestra "Del cuenco al descartable a la hora de comer"</p></div>
					<div class="crono crono-lugar"><p>Museo Histórico Provincial</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>9:00 a 14:00</p></div>
					<div class="crono crono-actividad"><p>Muestra "Sabores y lugares de época"</p></div>
					<div class="crono crono-lugar"><p>Archivo General de la Provincia</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>9 a 12 y 16:30 a 20</p></div>
					<div class="crono crono-actividad"><p>Muestra Plásticos Santafesinos</p></div>
					<div class="crono crono-lugar"><p>Alianza Francesa</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>9:00 a 21:00</p></div>
					<div class="crono crono-actividad"><p>Muestra Temática "A punto caramelo"</p></div>
					<div class="crono crono-lugar"><p>Hall Escuela de Artes Visuales "Juan Mantovani"</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>10:00 a 24:00</p></div>
					<div class="crono crono-actividad"><p>Exposición Fotográfica</p></div>
					<div class="crono crono-lugar"><p>Pastelería Dai Sladky</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00</div>
					<div class="crono crono-actividad"><p>Visita a la Casa de la Cervecería Santa Fe</p></div>
					<div class="crono crono-lugar"><p>Cervecería Santa Fe</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>18:00</p></div>
					<div class="crono crono-actividad"><p>Visita guiada y degustación de Vinos</p></div>
					<div class="crono crono-lugar"><p>Museo Etnográfico y Colonial</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>18:00</p></div>
					<div class="crono crono-actividad"><p>Circuito peatonal Bares Antiguos</p></div>
					<div class="crono crono-lugar"><p>Punto de encuentro Plaza 25 de mayo</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>19:00</p></div>
					<div class="crono crono-actividad"><p>Exhibición Trabajos Finales Gastronomía</p></div>
					<div class="crono crono-lugar"><p>Instituto Sol</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>19:30</p></div>
					<div class="crono crono-actividad crono-actividad--pre" data-tooltip="Actividad gratuita, con cupo limitado e inscripción previa"><p>Charla de Coctelería "Diseñando Sabores". Con degustación.</p></div>
					<div class="crono crono-lugar"><p>Falucho Bar</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>20:00</div>
					<div class="crono crono-actividad crono-actividad--pre" data-tooltip="Actividad gratuita, con cupo limitado e inscripción previa"><p>Cata de Café</p></div>
					<div class="crono crono-lugar"><p>Instituto Sol</p></div>
				</li>
			</ul>
		</div>

		<div class="crono-section-dia">
			<div id="jueves" class="dia-title">JUEVES 16</div>
			<ul class="dia-actividades">
				<li>
					<div class="crono crono-dia"><p> 8:30 a 12 y 14 a 19</p></div>
					<div class="crono crono-actividad"><p>Muestra "La Historia en los platos y platos con Historia"</p></div>
					<div class="crono crono-lugar"><p>Museo Etnográfico y Colonial</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>8:30 a 19:00</p></div>
					<div class="crono crono-actividad"><p>Muestra "Del cuenco al descartable a la hora de comer"</p></div>
					<div class="crono crono-lugar"><p>Museo Histórico Provincial</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>9 a 14 y 16 a 19</p></div>
					<div class="crono crono-actividad"><p>Muestra y visita guiada "Sabores y lugares de época"</p></div>
					<div class="crono crono-lugar"><p>Archivo General de la Provincia</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>9 a 21</p></div>
					<div class="crono crono-actividad"><p>Muestra Temática "A punto caramelo"</p></div>
					<div class="crono crono-lugar"><p>Hall Escuela de Artes Visuales "Juan Mantovani"</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>9 a 12 y 16:30 a 20</p></div>
					<div class="crono crono-actividad"><p>Muestra Plásticos Santafesinos</p></div>
					<div class="crono crono-lugar"><p>Alianza Francesa</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>10:00 a 24:00</p></div>
					<div class="crono crono-actividad"><p>Exposición Fotográfica</p></div>
					<div class="crono crono-lugar"><p>Pastelería Dai Sladky</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>09:00</div>
					<div class="crono crono-actividad"><p>"Cocinando con el SOL". Sabores Saludables</p></div>
					<div class="crono crono-lugar"><p>Peatonal San Martín</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00</p></div>
					<div class="crono crono-actividad"><p>Visita a la Casa de la Cervecería Santa Fe</p></div>
					<div class="crono crono-lugar"><p>Cervecería Santa Fe</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>18:00</p></div>
					<div class="crono crono-actividad"><p>Ciclo Cine Gastronómico</p></div>
					<div class="crono crono-lugar"><p>Cine América</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>19:00</p></div>
					<div class="crono crono-actividad"><p>Exhibición Trabajos Finales Gastronomía</p></div>
					<div class="crono crono-lugar"><p>Instituto Sol</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>19:30</p></div>
					<div class="crono crono-actividad"><p>Graciela Audero "La alimentación y la cocina están de moda"</p></div>
					<div class="crono crono-lugar"><p>Alianza Francesa</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>20:00</div>
					<div class="crono crono-actividad crono-actividad--pre" data-tooltip="Actividad gratuita, con cupo limitado e inscripción previa"><p>Cata de Vinos</p></div>
					<div class="crono crono-lugar"><p>Instituto Sol</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>21:00</div>
					<div class="crono crono-actividad crono-actividad--pre" data-tooltip="Actividad gratuita, con cupo limitado e inscripción previa"><p>Tour de Bares. Con degustación de Cóctels.</p></div>
					<div class="crono crono-lugar"><p>Salida desde Instituto Sol</p></div>
				</li>
			</ul>
		</div>
		<div class="crono-section-dia">
			<div id="viernes" class="dia-title">VIERNES 17</div>
			<ul class="dia-actividades">
				<li>
					<div class="crono crono-dia"><p> 8:30 a 12 y 14 a 19</p></div>
					<div class="crono crono-actividad"><p>Muestra "La Historia en los platos y platos con Historia"</p></div>
					<div class="crono crono-lugar"><p>Museo Etnográfico y Colonial</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>8:30 a 19:00</p></div>
					<div class="crono crono-actividad"><p>Muestra "Del cuenco al descartable a la hora de comer"</p></div>
					<div class="crono crono-lugar"><p>Museo Histórico Provincial</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>9:00 a 14:00</p></div>
					<div class="crono crono-actividad"><p>Muestra "Sabores y lugares de época"</p></div>
					<div class="crono crono-lugar"><p>Archivo General de la Provincia</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>9:00 a 21:00</p></div>
					<div class="crono crono-actividad"><p>Muestra Temática "A punto caramelo"</p></div>
					<div class="crono crono-lugar"><p>Hall Escuela de Artes Visuales "Juan Mantovani"</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>9 a 12 y 16:30 a 20</p></div>
					<div class="crono crono-actividad"><p>Muestra Plásticos Santafesinos</p></div>
					<div class="crono crono-lugar"><p>Alianza Francesa</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>10:00 a 24:00</p></div>
					<div class="crono crono-actividad"><p>Exposición Fotográfica</p></div>
					<div class="crono crono-lugar"><p>Pastelería Dai Sladky</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>09:00</div>
					<div class="crono crono-actividad crono-actividad--pre" data-tooltip="Actividad gratuita, con cupo limitado e inscripción previa"><p>Visita al Mercado de Productores</p></div>
					<div class="crono crono-lugar"><p>Mercado de Productores</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00</p></div>
					<div class="crono crono-actividad"><p>Visita a la Casa de la Cervecería Santa Fe</p></div>
					<div class="crono crono-lugar"><p>Cervecería Santa Fe</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>19:00</p></div>
					<div class="crono crono-actividad"><p>Exhibición Trabajos Finales Gastronomía</p></div>
					<div class="crono crono-lugar"><p>Instituto Sol</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>20:00</p></div>
					<div class="crono crono-actividad crono-actividad--pre" data-tooltip="Actividad gratuita, con cupo limitado e inscripción previa"><p>Cata de Aceite de Oliva</p></div>
					<div class="crono crono-lugar"><p>Instituto Sol</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>20:00</p></div>
					<div class="crono crono-actividad"><p>Ciclo Cine Gastronómico</p></div>
					<div class="crono crono-lugar"><p>Cine América</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>21:30</div>
					<div class="crono crono-actividad crono-actividad--pre" data-tooltip="Actividad gratuita, con cupo limitado e inscripción previa"><p>Charla y degustación Cervezas Artesanales</p></div>
					<div class="crono crono-lugar"><p>Instituto Sol</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>21:30</div>
					<div class="crono crono-actividad"><p>Teatro: "Cocinando con Elisa"</p></div>
					<div class="crono crono-lugar"><p>Sala Marechal - Teatro Municipal</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>23:00</div>
					<div class="crono crono-actividad"><p>Ciclo Cine Gastronómico</p></div>
					<div class="crono crono-lugar"><p>Cine América</p></div>
				</li>
			</ul>
		</div>

		<div class="crono-section-dia">
			<div id="sabado" class="dia-title">SÁBADO 18</div>
			<ul class="dia-actividades">
				<li>
					<div class="crono crono-dia"><p>10:00 a 24:00</p></div>
					<div class="crono crono-actividad"><p>Exposición Fotográfica</p></div>
					<div class="crono crono-lugar"><p>Pastelería Dai Sladky</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>10:30</div>
					<div class="crono crono-actividad"><p>Ciclo Cine Gastronómico</p></div>
					<div class="crono crono-lugar"><p>Cine América</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>11:00</p></div>
					<div class="crono crono-actividad"><p>Circuito Peatonal Bares Antiguos</p></div>
					<div class="crono crono-lugar"><p>Encuentro San Martin esq. Hipolito Irigoyen</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>15:00</p></div>
					<div class="crono crono-actividad"><p>Exhibición Trabajos Finales Gastronomía</p></div>
					<div class="crono crono-lugar"><p>Instituto Sol</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>15:00</p></div>
					<div class="crono crono-actividad crono-actividad--pre" data-tooltip="Actividad gratuita, con cupo limitado e inscripción previa"><p>"Cómo armar un bar en casa y ser un buen anfitrión". Degustación.</p></div>
					<div class="crono crono-lugar"><p>Instituto Sol</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>16:00 a 19:00</p></div>
					<div class="crono crono-actividad"><p>Muestra "La Historia en los platos y platos con Historia"</p></div>
					<div class="crono crono-lugar"><p>Museo Etnográfico y Colonial</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>16:00 a 19:00</div>
					<div class="crono crono-actividad"><p>Muestra "La Historia en los platos y platos con Historia"</p></div>
					<div class="crono crono-lugar"><p>Museo Histórico Provincial</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>16:00 a 19:00</div>
					<div class="crono crono-actividad"><p>Muestra Plásticos Santafesinos</p></div>
					<div class="crono crono-lugar"><p>Alianza Francesa</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>18:00</div>
					<div class="crono crono-actividad"><p>"Cocinando con el SOL". Sabores Saludables</p></div>
					<div class="crono crono-lugar"><p>Costanera de Santa Fe</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>19:00</div>
					<div class="crono crono-actividad"><p>Coctelería en la Laguna</p></div>
					<div class="crono crono-lugar"><p>Costanera de Santa Fe</p></div>
				</li>
			</ul>
		</div>

		<div class="crono-section-dia">
			<div id="domingo" class="dia-title">DOMINGO 19</div>
			<ul class="dia-actividades">
				<li>
					<div class="crono crono-dia"><p>10:00 a 24:00</p></div>
					<div class="crono crono-actividad"><p>Exposición Fotográfica</p></div>
					<div class="crono crono-lugar"><p>Pastelería Dai Sladky</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>16:00 a 19:00</p></div>
					<div class="crono crono-actividad"><p>Muestra "La Historia en los platos y platos con Historia"</p></div>
					<div class="crono crono-lugar"><p>Museo Etnográfico y Colonial</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>16:00 a 19:00</div>
					<div class="crono crono-actividad"><p>Muestra "La Historia en los platos y platos con Historia"</p></div>
					<div class="crono crono-lugar"><p>Museo Histórico Provincial</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>16:00 a 19:00</div>
					<div class="crono crono-actividad"><p>Muestra Plásticos Santafesinos</p></div>
					<div class="crono crono-lugar"><p>Alianza Francesa</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00 a 23:00</div>
					<div class="crono crono-actividad"><p>Cierre Semana Gastronómica</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00 a 23:00</p></div>
					<div class="crono crono-actividad"><p>Muestra Fotográfica Temática Escuela Leandro Alem</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00 a 23:00</p></div>
					<div class="crono crono-actividad"><p>Muestra Fotográfica "Bares y Bodegones" de Oscar Dechiara</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00 a 23:00</p></div>
					<div class="crono crono-actividad"><p>Intervención Artística "Desborde de la fuente imposible"</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00 a 23:00</p></div>
					<div class="crono crono-actividad"><p>Instalación con delantales y gorros de cocina. Esc. "Juan Mantovani"</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00 a 23:00</p></div>
					<div class="crono crono-actividad"><p>Caricaturas Gastronómicas</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00 a 23:00</p></div>
					<div class="crono crono-actividad"><p>Feria de Productos Orgánicos</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00 a 23:00</p></div>
					<div class="crono crono-actividad"><p>"Colores, Aromas y Sabores de Santa Fe" Microemprendedores</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00 a 23:00</p></div>
					<div class="crono crono-actividad"><p>Productos de mi Tierra - Provincia de Santa Fe</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00 a 23:00</p></div>
					<div class="crono crono-actividad"><p>Artesanías en Pan</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00 a 23:00</p></div>
					<div class="crono crono-actividad"><p>Tallado de Frutas y Hortalizas</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00 a 23:00</p></div>
					<div class="crono crono-actividad"><p>Manjares del Litoral</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00 a 23:00</p></div>
					<div class="crono crono-actividad"><p>Fabricación en vivo de Cerveza Artesanal Intervenida. Degustación</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00 a 23:00</p></div>
					<div class="crono crono-actividad"><p>El Alfajor: Tradición Santafesina</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>17:00 a 18:00</p></div>
					<div class="crono crono-actividad"><p>Taller de Pastelería para niños</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>18:30 a 19:30</p></div>
					<div class="crono crono-actividad"><p>Show de Coctelería Internacional</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
				<li>
					<div class="crono crono-dia"><p>20:00 a 21:30</p></div>
					<div class="crono crono-actividad"><p>Clase Magistral de Cocina a cargo del Chef Pedro Lambertini</p></div>
					<div class="crono crono-lugar"><p>Plaza Pueyrredon - Mercado Progreso</p></div>
				</li>
			</ul>
		</div>

		<div class="crono-section-info">
			<p>Actividad gratuita, con cupo limitado e inscripción previa, desde el lunes 6 de octubre de 9 a 12 y de 16 a 21 hs. en el Instituto Sol - Tel. 4525035 - 4561947</p>
		</div>

	</div>

	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	
	<script src="<?php echo $url?>/assets/js/dist/busqueda-santa.min.js"></script>

	<script>
    	var nombres = $.parseJSON('<?php echo json_encode($nombres)?>');
    	var slugs = $.parseJSON('<?php echo json_encode($slugs)?>');
    	var latitudes = $.parseJSON('<?php echo json_encode($latitudes)?>');
    	var longitudes = $.parseJSON('<?php echo json_encode($longitudes)?>');
    	var niveles = $.parseJSON('<?php echo json_encode($niveles)?>');
    	setLugares("<?php echo $url ?>", nombres, latitudes, longitudes, niveles, slugs);

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