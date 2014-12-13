
	<!-- HEADER -->

	<?php 
		include "app/views/header.php";
		include "app/views/lugar/timeago.php";
	?>

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
			<span><a href="/">Tu Salida en <?php echo $ciudad; ?></a> >> <a href="<?php echo $url; ?>/busqueda/<?php echo $categoria->slug; ?>"><?php echo $categoria->descripcion; ?></a> >> <strong><?php echo $lugar->nombre ?></strong></span>
		</div>

		<div class="info-lugar">

			<div id="info-lugar-left">
				<div id="lugar-title">

					<div class="lugar-ratings">
						<span class="lugar-ratings-stars">
		                	<?php for ($i = 1; $i <= 5; $i++) { ?>
		    					<span class="glyphicon glyphicon-star<?php if($i <= $lugar->rating_cache) { echo ""; } else { echo "-empty"; } ?>"></span>
		    				<?php }	?>
							<?php echo number_format($lugar->rating_cache, 1); echo "  estrellas"; ?>
	    				</span>
	    				<span class="lugar-ratings-reviews"><?php echo $lugar->comentarios()->count(); echo " reseñas"; ?></span>	
	              	</div>

					<div id="lugar-title-left">
						<div id="lugar-nombre">
							<h1><?php echo $lugar->nombre; ?></h1>
						</div>
					</div>

					<div id="lugar-title-contact">
						<div class="lugar-title-comun lugar-direccion">
							<?php echo $lugar->direccion; ?>
						</div>

						<div class="lugar-title-comun lugar-tel">
							<?php echo $lugar->telefono; ?>
						</div>

						<div class="lugar-title-comun lugar-web">
							<a href="<?php echo $lugar->web; ?>"><?php echo $lugar->web; ?></a>
						</div>

						<div class="lugar-title-comun lugar-horarios">
							<?php echo $lugar->horario; ?>
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
					<p><?php echo $lugar->descripcion; ?></p>
				</div>
			</div>

			<div id="info-lugar-middle">
				<div id="lugar-mapa">

				</div>
			</div>

			<div id="info-lugar-right">
				<div id="lugar-fotos">
					<div id="owl-demo" class="owl-carousel owl-theme">
						<?php 
							for ($idslide = 1; $idslide <= $cantSlides; $idslide++) { 
								?>
								<div class="item"><img src="<?php echo $url ?>/images/<?php echo $city; ?>/<?php echo $lugar->slug ?>/slide<?php echo $idslide ?>.jpg"></div>
								<?php	
							}
						?>
					</div>
				</div>
				<div id="lugar-links">
					<h4>COMPARTÍ TU LUGAR</h4>
					<ul><li><a href="http://www.facebook.com/sharer.php?u=<?php echo URL::current();?>" target="_blank" class="contacto-face"></a></li><li><a href="https://twitter.com/intent/tweet?text=<?php echo $lugar->nombre; ?>&url=<?php echo URL::current();?>&via=tusalidaok" target="_blank" class="contacto-twitter"></a></li><li><a href="https://plus.google.com/share?url=<?php echo URL::current();?>" target="_blank" class="contacto-plus"></a></li></ul>
				</div>
			</div>

		</div>

		<div class="info-left">

			<?php if($lugar->getPromo($lugar->promo_id) != "None") { ?>

				<div class="promo">
					<a href="<?php echo Promo::find($lugar->promo_id)->url; ?>">
						<img src="<?php echo $url ?>/images/<?php echo $city; ?>/<?php echo $lugar->slug ?>/promos/<?php echo $lugar->promo_id ?>.jpg">
					</a>
				</div>

			<?php } ?>

			<div class="comentarios-lugar">

				<?php if($lugar->enEvento($lugar->evento_id) == "santafealacarta") { ?>

					<div class="menu-lugar">
						<div class="menu-lugar-logo">
							<img src="<?php echo $url ?>/img/santafecarta.jpg">
						</div>
						<div class="menu-lugar-info">
							<?php echo $lugar->menu ?>
						</div>
					</div>

				<?php } ?>

				<div class="comentarios-lugar-alert">
				   	<?php if(Session::get('errors')) { ?>
	                	<div class="alert alert-danger">
	                		<button type="button" class="close" style="float: right; background: transparent;" data-dismiss="alert" aria-hidden="true">&times;</button>
	                  		<h5>Han ocurrido estos errores:</h5>
	                   		<?php
	                   			foreach($errors->all('<p style="color: #fbb714;">:message</p>') as $message) {
	                      		echo $message;
	                   		}
	                   		?>
	                	</div>
	              	<?php } ?>

	              	<?php if(Session::has('review_posted')) { ?>
	                	<div class="alert alert-success">
	                  		<h5>Se ha enviado tu comentario.</h5>
	                	</div>
	              	<?php } ?>
				</div>
	            
	            <div id="post-review-box">
					<form method="POST" action="<?php echo URL::current();?>" accept-charset="UTF-8">
						<div class="form-comment-rating">
							<div class="form-comment">
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

								<input id="ratings-hidden" name="rating" type="hidden" value="<?php  

									if (Auth::check()) {
										$userReview = Review::where('user_id', Auth::user()->id)->where('lugar_id', $lugar->id)->first();
										if ($userReview != null) {
											echo $userReview->rating; 	
										}
									}

								?>">
								<textarea id="new-review" class="form-control animated" placeholder="Dejá tu opinión... ¿Te gustó <?php echo $lugar->nombre; ?>? ¿Qué recomendas?" name="comment"><?php echo Input::old('comment',""); ?></textarea>
							</div>
		                </div>

						<div class="form-buttons">
							
							<?php if (!Auth::check()) { echo "<span class='form-buttons-login'><a href='/loginfb'>Iniciá sesión para dejar tu opinión</a></span>"; } else { echo "<button class='button button-comment button-comment-user type='submit'>Comentar</button>"; } ?>
							
		                </div>
		                <?php if (Auth::check()) {

		                	$rate = 0;
		                	if ($ratingUser != null) { 
		                		$rate = $ratingUser;	
		                	} else { 
		                		$rate = Input::old('rating',0); 
		                	}

		                	echo "<div class='lugar-rating-star'>
									<div class='text-right'>
										<span class='lugar-rating-vote'>Tu voto</span>
										<div class='stars stars-user starrr' data-rating='$rate'>
										</div>
				             		</div>
								</div>";
						}
						?>
	                </form>
	            </div>

					<?php
						if($comentarios != null) {
							foreach($comentarios as $comentario) {

							?>
								<div class="review">
									<div class="review-comment-photo">
				    					<img src="<?php echo $comentario->user->photo; ?>" alt="">
				    				</div>
									
									<div class="review-data">
										<div class="review-comment-rating">
										<?php
										for ($i = 1; $i <= 5; $i++) { ?>
					    					<span class="glyphicon glyphicon-star<?php
					    						if($i <= Review::where('user_id', $comentario->user->id)->where('lugar_id', $lugar->id)->first()->rating) {
					    							echo "";
							    				} else {
							    					echo "-empty";
							    				}
											?>"></span>
					    				<?php
					    				} ?>
					    				</div>
					    				<span class="review-comment-username"><?php echo $comentario->user->name; ?></span>
									</div>

									<span class="review-comment-date"><?php 
										$time_ago =strtotime($comentario->created_at); 
										echo time_stamp($time_ago); 

									 ?></span>

									<div class="review-comment">
										<?php echo $comentario->comment; ?>
									</div> 
								</div>

							<?php
							}
							?>
							<div id="comentarios-links">
								<?php echo $comentarios->links(); ?>
							</div>
							<?php
						}
					?>
			</div>

		</div>

		<div class="lugar-rating-right">

			<div class="lugar-votos">
				<h3>Recomendado para:</h3>
		
				<div class="lugar-ocasion-votos">
					<?php
						$indexOcasion = 1;
						foreach($votosLugar as $ocasion => $voto) {
					?>
						<div class="lugar-votos-ocasion">
							<span class="lugar-votos-desc"><?php echo $ocasion ?></span><span class="lugar-votos-voto"><?php echo $voto ?> Votos</span>
		    				<div class="meter orange nostripes">
								<span style="width: <?php 
									if($voto > 0) {
										echo ($voto*100)/$totalVotos;
									} else {
										echo 0;
									}?>%">
								</span>
							</div>
						</div>
					<?php
						$indexOcasion = $indexOcasion + 1;
						}
					?>
				</div>
			</div>

			<div class="lugar-votos-right">
				<?php
					$indexOcasion = 0;
					foreach($votosLugar as $ocasion => $voto) {
						?>
						<div class="lugar-votos-button">
							<a href class="vote voteocasion voteocasion-up voteocasion-up<?php echo $totalOcasiones[$indexOcasion] ?>" id="<?php echo $totalOcasiones[$indexOcasion] ?>" name="up">+1</a>
							<a href class="vote voteocasion voteocasion-down voteocasion-down<?php echo $totalOcasiones[$indexOcasion] ?>" id="<?php echo $totalOcasiones[$indexOcasion] ?>" name="down">-1</a>
						</div>
						<?php
						$indexOcasion = $indexOcasion + 1;
					}
				?>
			</div>

		</div>

	</section>

<!-- FOOTER -->

<?php include "app/views/footer.php";?>