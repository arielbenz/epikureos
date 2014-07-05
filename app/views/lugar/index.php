
	<!-- HEADER -->

	<?php 
		include "app/views/header.php";
		include "app/views/lugar/timeago.php";
	?>

	<script src="<?php echo $url?>/js/starrr.js"></script>

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
				<p><?php echo $lugar->descripcion; ?></p>
			</div>

			<!-- <div id="lugar-utiles">
				
			</div> -->

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

		<div class="comentarios-lugar">
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

	<!-- Google Maps -->
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<script>

		function meterAnimate() {
			var meterid = 1;
			if(votesUserAjax == null) {
				votesUserAjax = $.parseJSON('<?php echo json_encode($votesUser)?>');
			}
			if(ratingUser == null) {
				ratingUser = "<?php echo $ratingUser ?>";
			}

	      	$(".meter > span").each(function() {
	      		var user = "<?php echo Auth::check(); ?>";
	      		var rateg = "<?php echo $ratingUser ?>";
	      		if(user) {
	      			
	      			if(ratingUser != -1) {
	      				if (votesUserAjax[meterid] == 0) {
		      				$(".voteocasion-up"+meterid).css("display", "initial");
		      				$(".voteocasion-up"+meterid).css("background-color", "#58ba48");
			      			$(".voteocasion-down"+meterid).css("display", "none");
		      			} else {
		      				$(".voteocasion-up"+meterid).css("display", "none");
			      			$(".voteocasion-down"+meterid).css("display", "initial");
		      			}
		      			
	      			} else {
	      				
	      					$(".voteocasion-up"+meterid).css("display", "initial");
	      					$(".voteocasion-up"+meterid).css("background-color", "#58ba48");
			      			$(".voteocasion-down"+meterid).css("display", "none");
	      				
	      			}
	      			
		      	} else {
		      		$(".voteocasion-up"+meterid).css("display", "initial");
		      		$(".voteocasion-down"+meterid).css("display", "none");
		      	}

				$(this)
					.data("origWidth", $(this).width())
					.width(0)
					.animate({
						width: $(this).data("origWidth")
					}, 1200);
				meterid = meterid + 1;
			});
		}



		$(document).on("ready", inicio);

		var lugar = $.parseJSON('<?php echo $lugar?>');
		var votesUserAjax = null;
		var ratingUser = null;

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

			$(".vote").click(function(event) {

				var user = "<?php echo Auth::check() ?>";
				
				if(user) {
					var lugarid = <?php echo $lugar->id; ?>;
					var ocasionid = $(this).attr("id");
					var name = $(this).attr("name");

					var params = {  'lugarid' : lugarid, 'ocasionid' : ocasionid, 'name' : name };

				   	$.ajax({
		                type: "POST",
			            url: "<?php echo $lugar->slug; ?>/votelike",
			            data: params,
			            cache: false,
			            success: function (data) {
			            	if(data.message == "") {
			            		var votos = data.votosLugar;
				            	var ocasiones = data.totalOcasiones;
				            	votesUserAjax = data.votesUser;
				            	ratingUser = data.ratingUser;
				            	var html = "";
				            	var voto = 0;

				            	var j = 1;
								for(var i in votos) {
									voto = 0;
									if(votos[i] > 0) {
										voto = (votos[i]*100)/(data.totalVotos);
									}
									html = html.concat("<div class='lugar-votos-ocasion'><span class='lugar-votos-desc'>" + i + "</span><span class='lugar-votos-voto'>" + votos[i] + " Votos</span><div class='meter orange nostripes'><span style='width:" + voto + "%'></span></div></div>");

									j = j + 1;
								}

								$(".lugar-ocasion-votos").html(html);

								$(".meter > span").each(function() {
									$(this)
								});
								meterAnimate();
			            	} else {
			            		console.log(data.message);
			            	}
			            },
			            error: function(data) {
			                console.log("Error al votar");
			            }  
			        });
					event.preventDefault();
				} else {
					bootbox.dialog({
						message: "Debe iniciar sesión para poder votar",
					  	title: "Votación",
					  	buttons: {
						    danger: {
					      	label: "Cancelar",
					      	className: "btn-danger",
					      	callback: function() {}
					    },
					    main: {
					    	label: "Iniciar Sesión",
					      	className: "btn-primary",
					      	callback: function() {
						      	<?php $_SESSION['lastpage'] = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; ?>
					         	window.location = "http://<?php echo $_SERVER['HTTP_HOST']; ?>/loginfb";
					      	}
					    }
					  }
					});
					event.preventDefault();
				}
		 	});

			$(function(){
				var reviewBox = $('#post-review-box');
				var newReview = $('#new-review');
				var openReviewBtn = $('#open-review-box');
				var closeReviewBtn = $('#close-review-box');
				var ratingsField = $('#ratings-hidden');

				$(".glyphicon").click(function() {
					console.log($("#ratings-hidden").val());
				});

				<?php
					if($errors->first('comment') || $errors->first('rating')) {
				?>
					openReviewBtn.click();
				<?php
					}
				?>

				$('.starrr').on('starrr:change', function(e, value){
		        	ratingsField.val(value);
		      	});

		      	meterAnimate();

		      	$("#owl-demo").owlCarousel({
		      		autoPlay: 4000,
    				navigation : false,
      				slideSpeed : 300,
      				paginationSpeed : 400,
      				singleItem: true
				});
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