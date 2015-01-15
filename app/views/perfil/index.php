
	<!-- HEADER -->
	
	<?php
		include "app/views/header.php";
		include "app/views/lugar/timeago.php";
	?>

	<!-- CONTENT -->

	<div class="page-section">

		<section class="barra-content barra-content--perfil">
			<div class="barra">
				<div class="barra-titulo">
					<h2><b class="font-normal">TU</b><b class="font-bold">PERFIL</b></h2>
				</div>
			</div>
		</section>

		<div class="content-perfil">

			<div class="perfil-bar"></div>

			<div class="perfil-data">

				<div class="perfil-data-avatar">
					<img src="<?php echo $user->photo; ?>" alt="">
				</div>

				<div class="perfil-data-name">
					<h3><?php echo $user->name; ?></h3>
				</div>
			</div>

			<div class="section__review">

				<div class="section__review__comentarios">
		
					<?php 
					if($comentarios != null) {
						foreach($comentarios as $comentario) { ?>

						<div class="section__review-comment">
							<div class="section__review-photo">
								<a href="http://<?php echo $comentario->lugar->getSlugCiudad($comentario->lugar->ciudad); ?>.epikureos.com/lugares/<?php echo $comentario->lugar->slug ?>">
									<img src="<?php echo $url ?>/assets/images/<?php echo $comentario->lugar->getSlugCiudad($comentario->lugar->ciudad); ?>/<?php echo $comentario->lugar->slug ?>/thumb.jpg">
								</a>
		    				</div>
							
							<div class="section__review-votes">
								<div class="section__review-votesrating">
								<?php
								for ($i = 1; $i <= 5; $i++) { ?>
			    					<span class="glyphicon glyphicon-star<?php
			    						if($i <= $comentario->review->rating) {
			    							echo "";
					    				} else {
					    					echo "-empty";
					    				}
									?>"></span>
			    				<?php
			    				} ?>
			    				</div>
			    				<span class="section__review-username"><?php echo $comentario->lugar->nombre; ?></span>
							</div>

							<span class="section__review-commentdate">
								<?php 
									$time_ago =strtotime($comentario->created_at); 
									echo time_stamp($time_ago);
							 	?>
							 </span>

							<div class="section__review-commentuser">
								<?php echo $comentario->comment; ?>
							</div> 
						</div>
						<?php
						}
					} else {
						echo "Sin comentarios todavía";
					} ?>

					</div>
				</div>

				<div class="perfil-right">

					<h3>Sidebar</h3>
					
				</div>

			</div>

		</div>

	</div>

	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>