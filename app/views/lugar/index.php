
	<!-- HEADER -->

	<?php include "app/views/header.php";?>

	<script src="<?php echo $url?>/js/expanding.js"></script>
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

    				<span class="lugar-ratings-reviews">
						<?php
                			echo $lugar->rating_count;
                			echo " reseñas";
                		?>
                	</span>	
              	</div>

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

			<!-- <div id="lugar-utiles">
				
			</div> -->

		</div>

		<div id="info-lugar-middle">
			<div id="lugar-mapa">

			</div>
		</div>

		<div id="info-lugar-right">
			<div id="lugar-fotos">
				<img src="<?php echo $url ?>/images/<?php echo $lugar->slug ?>/slide1.jpg">
			</div>

			<div id="lugar-links">
				<h4>RECOMENDÁ TU LUGAR</h4>
				<ul><li><a href="http://www.facebook.com/sharer.php?u=<?php echo URL::current();?>" target="_blank" class="contacto-face"></a></li><li><a href="https://twitter.com/intent/tweet?text=<?php echo $lugar->nombre; ?>&url=<?php echo URL::current();?>&via=tusalidaok" target="_blank" class="contacto-twitter"></a></li><li><a href="https://plus.google.com/share?url=<?php echo URL::current();?>" target="_blank" class="contacto-plus"></a></li></ul>
			</div>

		</div>

		<div class="comentarios-lugar">
			<div class="row" style="height: 33px;"></div>

			<div class="review-new">
				<?php
					if (Auth::check()) {
				?>
						<a href="#reviews-anchor" id="open-review-box" class="btn-leave-comment">Dejar un comentario</a>
    			<?php
    				} else {
    			?>
    					<a href="/loginfb" class="btn-leave-comment">Iniciar Sesión</a>
    			<?php
    				}
				?>
				
            </div>
            
            <div class="row" id="post-review-box" style="display:none;">
				<form method="POST" action="<?php echo URL::current();?>" accept-charset="UTF-8">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input id="ratings-hidden" name="rating" type="hidden">                  
					<textarea id="new-review" class="form-control animated" placeholder="Ingresá un comentario..." name="comment"></textarea>

					<div class="text-right">
                    	<div class="stars starrr" data-rating="0"></div>
                    
	                    <a href="#" id="close-review-box" class="btn btn-cancel">
	                    	<span class="glyphicon glyphicon-remove"></span>Cancelar
	                   	</a>
	                    <button class="btn btn-success btn-lg" type="submit">Aceptar</button>
                  	</div>
                </form>
            </div>

				<?php

				foreach($reviews as $review)
				{ ?>
					<div class="review">
						<div class="review-comment-photo">
	    					<img src="<?php echo $review->user->photo; ?>" alt="">
	    				</div>
						
						<div class="review-data">
							<div class="review-comment-rating">
							<?php	
							for ($i = 1; $i <= 5; $i++) { ?>
		    					<span class="glyphicon glyphicon-star<?php
		    						if($i <= $review->rating) {
		    							echo "";
				    				} else {
				    					echo "-empty";
				    				}
								?>"></span>
		    				<?php
		    				} ?>
		    				</div>
		    				<span class="review-comment-username"><?php echo $review->user->name; ?></span>
						</div>

						<span class="review-comment-date"><?php echo $review->timeago ?></span>

						<div class="review-comment">
							<?php echo $review->comment; ?>
						</div> 
					</div>
					<?php
				}

				$reviews->links();
			?>
		</div>

	</section>

	<script>

		$(function(){

			// initialize the autosize plugin on the review text area
			$('#new-review').autosize({append: "\n"});

			var reviewBox = $('#post-review-box');
			var newReview = $('#new-review');
			var openReviewBtn = $('#open-review-box');
			var closeReviewBtn = $('#close-review-box');
			var ratingsField = $('#ratings-hidden');

			openReviewBtn.click(function(e) {
				reviewBox.slideDown(400, function() {
			    	$('#new-review').trigger('autosize.resize');
			    	newReview.focus();
			  	});
			
				openReviewBtn.fadeOut(100);
				closeReviewBtn.show();
				$('.review-new').css("margin-bottom", "0px");
			});

			closeReviewBtn.click(function(e) {
				e.preventDefault();
				reviewBox.slideUp(300, function() {
			    	newReview.focus();
			    	openReviewBtn.fadeIn(200);
			  	});
				closeReviewBtn.hide();
				$('.review-new').css("margin-bottom", "33px");
			});

			$('.starrr').on('starrr:change', function(e, value){
	        	ratingsField.val(value);
	      	});

      	});

	</script>

	<!-- Google Maps -->

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