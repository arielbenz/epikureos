
	<!-- HEADER -->

	<?php 
		include "app/views/header.php";
		include "app/views/lugar/timeago.php";
	?>

	<!-- CONTENT -->

	<div class="page-section">

		<section class="barra-content barra-content--lugar">
			<div class="barra">
				<div class="barra-titulo">
					<h2><b class="font-normal">TU</b><b class="font-bold">LUGAR</b></h2>
				</div>
			</div>
		</section>

		<section class="content-lugar">

			<div class="bar-breadcrumb">
				<span><a href="/">Tu Salida en <?php echo $ciudad; ?></a> >> <a href="<?php echo $url; ?>/busqueda/<?php echo $categoria->slug; ?>"><?php echo $categoria->descripcion; ?></a> >> <strong><?php echo $lugar->nombre ?></strong></span>
			</div>

			<div class="lugar-info">

				<div class="lugar-info__desc">
					<div class="lugar-info__desc-title">

						<div class="lugar-info__desc-ratings">
							<span class="lugar-info__desc-ratings-stars">
			                	<?php for ($i = 1; $i <= 5; $i++) { ?>
			    					<span class="glyphicon glyphicon-star<?php if($i <= $lugar->rating_cache) { echo ""; } else { echo "-empty"; } ?>"></span>
			    				<?php }	?>
								<?php echo number_format($lugar->rating_cache, 1); echo "  estrellas"; ?>
		    				</span>
		    				<span class="lugar-info__desc-ratings-reviews"><?php echo $lugar->comentarios()->count(); echo " reseñas"; ?></span>	
		              	</div>

						<div class="lugar-title-left">
							<div class="lugar-nombre">
								<h1><?php echo $lugar->nombre; ?></h1>
							</div>
						</div>

						<div class="lugar-title-contact">
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

						<div class="lugar-info__desc-social">
							<ul>
								<?php
									if ($lugar->facebook != "")
										echo "<li><a href='$lugar->facebook'><img src='$url/assets/img/face-lugar.png'></a></li>";

									if ($lugar->twitter != "")
										echo "<li><a href='$lugar->twitter'><img src='$url/assets/img/twitter-lugar.png'></a></li>";
								?>
							</ul>
						</div>

					</div>

					<div class="lugar-info__desc-desc">
						<p><?php echo $lugar->descripcion; ?></p>
					</div>
				</div>

				<div class="lugar-info__mapa">
					<div id="lugar-mapa">

					</div>
				</div>

				<div class="lugar-info__slide">
					<div class="lugar-info__slide-fotos">
						<div id="owl-demo" class="owl-carousel owl-theme">
							<?php 
								for ($idslide = 1; $idslide <= $cantSlides; $idslide++) { 
									?>
									<div class="item"><img src="<?php echo $url ?>/assets/images/<?php echo $city; ?>/<?php echo $lugar->slug ?>/slide<?php echo $idslide ?>.jpg"></div>
									<?php	
								}
							?>
						</div>
					</div>
					<div class="lugar-info__slide-share">
						<h4>COMPARTÍ TU LUGAR</h4>
						<ul><li><a href="http://www.facebook.com/sharer.php?u=<?php echo URL::current();?>" target="_blank" class="contacto-face"></a></li><li><a href="https://twitter.com/intent/tweet?text=<?php echo $lugar->nombre; ?>&url=<?php echo URL::current();?>&via=tusalidaok" target="_blank" class="contacto-twitter"></a></li><li><a href="https://plus.google.com/share?url=<?php echo URL::current();?>" target="_blank" class="contacto-plus"></a></li></ul>
					</div>
				</div>

			</div>

			<div class="section__review">

				<?php if($lugar->getPromo($lugar->promo_id) != "None") { ?>

					<!-- <div class="promo">
						<a href="<?php echo Promo::find($lugar->promo_id)->url; ?>">
							<img src="<?php echo $url ?>/assets/images/<?php echo $city; ?>/<?php echo $lugar->slug ?>/promos/<?php echo $lugar->promo_id ?>.jpg">
						</a>
					</div> -->

				<?php } ?>

				<div class="section__review__comentarios">

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
		            
		            <div class="section__review-box">
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
									<textarea class="new-review" class="form-control animated" placeholder="Dejá tu opinión... ¿Te gustó <?php echo $lugar->nombre; ?>? ¿Qué recomendas?" name="comment"><?php echo Input::old('comment',""); ?></textarea>
								</div>
			                </div>

			                <div class="form-buttons-review">
								<div class="form-buttons">
									<?php if (!Auth::check()) { echo "<span class='form-buttons-login'><a href='/loginfb'>Iniciá sesión para dejar tu opinión</a></span>"; } 
											else { echo "<button class='button button-comment button-comment-user type='submit'>Comentar</button>"; } ?>								
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
									} ?>
							</div>
		                </form>
		            </div>

						<?php
							if($comentarios != null) {
								foreach($comentarios as $comentario) {

								?>
									<div class="section__review-comment">
										<div class="section__review-photo">
					    					<img src="<?php echo $comentario->user->photo; ?>" alt="">
					    				</div>
										
										<div class="section__review-votes">
											<div class="section__review-votesrating">
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
						    				<span class="section__review-username"><?php echo $comentario->user->name; ?></span>
										</div>

										<span class="section__review-commentdate"><?php 
											$time_ago =strtotime($comentario->created_at); 
											echo time_stamp($time_ago); 

										 ?></span>

										<div class="section__review-commentuser">
											<?php echo $comentario->comment; ?>
										</div> 
									</div>

								<?php
								}
								?>
								<div class="section__review-navigation">
									<?php echo $comentarios->links(); ?>
								</div>
								<?php
							}
						?>
				</div>

			</div>

			<div class="lugar-contentrating">

				<div class="lugar-contentrating-votos">
					<h3>Recomendado para:</h3>
			
					<div class="lugar-contentrating-ocasion">
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

				<div class="lugar-contentrating-buttons">
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

	</div>

<!-- FOOTER -->

<?php include "app/views/footer.php";?>