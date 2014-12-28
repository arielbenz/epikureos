
	<!-- HEADER -->
	
	<?php include "app/views/header.php"; ?>

	<!-- HOME -->

	<div class="page-section">
	
		<section class="home-search <?php echo $class_hora_dia; ?>">

			<article class="search">
				<div class="search-section">
					<div class="search-home">
						<form class="form-search" action="<?php echo $url?>/busqueda" method="POST">
							<input class="form-search-input" type="text" name="lugar" placeholder="Ingresá tu lugar, comida o bebida favorita..." required></input><button type="submit">Buscar</button>
						</form>
					</div>
					<nav class="nav-search">
						<ul>
							<li><a href="<?php echo $url?>/busqueda/restobar" title="Bares y Restos">BAR/RESTO</a></li>
							<li><a href="<?php echo $url?>/busqueda/restaurante" title="Restaurantes">RESTAURANTES</a></li>
							<li><a href="<?php echo $url?>/busqueda/cafe" title="Cafeterías">CAFETERÍAS</a></li>
							<li><a href="<?php echo $url?>/busqueda/hoteles" title="Hoteles">HOTELES</a></li>
						</ul>
					</nav>
				</div>
			</article>
			
		</section>

		<section class="home-tiles">

			<div class="partner-section">
				<div class="partner-section-logos">
					<ul>
						<li class="logo-sol"><a href="http://www.institutosol.edu.ar"><img src="<?php echo $url?>/assets/img/logo_sol.png"></a></li>
						<li class="logo-campari"><a href="http://www.campari.com/ar/es/"><img src="<?php echo $url?>/assets/img/lg_campari.png"></a></li>
					</ul>
				</div>
			</div>

			<!-- <div class="evento-section">
				<a href="http://santafe.tusalida.net/santafealacarta"><img src="<?php echo $url?>/assets/img/santafealacarta.jpg"></a>
			</div> -->

			<!-- <div class="home-recomended">
				<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/busqueda/cafe/reuniontrabajo">
					<figure class="effect-oscar">
						<img src="<?php echo $url?>/assets/img/recomend1.jpg" alt="img08"/>
						<figcaption>
							<p class="font-normal">Bares para una</p>
							<h2 class="font-normal">Reunión de<span class="font-bold">Trabajo</span></h2>
						</figcaption>			
					</figure>
				</a>

				<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/busqueda/bar/afteroffice">
					<figure class="effect-oscar">
						<img src="<?php echo $url?>/assets/img/recomend2.jpg" alt="img08"/>
						<figcaption>
							<p class="font-normal">Bares para</p>
							<h2 class="font-normal"><span class="font-bold">after </span>office</h2>
						</figcaption>			
					</figure>
				</a>

				<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/busqueda/restaurante/pareja">
					<figure class="effect-oscar">
						<img src="<?php echo $url?>/assets/img/recomend3.jpg" alt="img08"/>
						<figcaption>
							<p class="font-normal">Restaurantes para</p>
							<h2 class="font-normal">ir en <span class="font-bold">pareja</span></h2>
						</figcaption>			
					</figure>
				</a>
			</div> -->

			<div class="seccion-novedades">

				<section class="tile-home__laposta">

					<div class="tile-home__laposta__flag">
						<img src="<?php echo $url?>/assets/img/laposta.png">
					</div>

					<?php query_posts('category_name=laposta&showposts=1'); ?>

					<?php if (have_posts()) : ?>

						<?php while (have_posts()) : the_post(); ?>
							<div class="tile-home__laposta__imagen">
								<?php $postaimagen = get_post_meta(get_the_ID(), 'thumb', true);
									if ($postaimagen) { ?>
									<img src="<?php echo $postaimagen; ?>" alt="alt"/> 
									<?php } else { ?> 
									<img src="<?php bloginfo('template_url'); ?>/images/thumb.jpg" alt="alt"/> 
								<?php } ?>
							</div>
						<?php endwhile; ?>

					<?php else : ?>
						<h1>Lo que buscas no se encuentra</h1>			
					<?php endif; ?>
					
			 		<div class="tile-home__laposta__title">
			 			<div class="tile-home__laposta__calendar">
			 				<div class="icon-calendar">

							</div>
			 				<div class="post-fecha">
								<?php the_time('j M') ?>
							</div>
			 			</div>
			 			<div class="tile-home__laposta__info">
			 				<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							<div class="tile-home__laposta__extract">
								<?php the_excerpt()?>
							</div>
			 			</div>
			 		</div>

				</section>
				
				<section class="tile-home__noticias">
					
					<?php query_posts('category_name=novedades&showposts=2'); ?>

					<?php if (have_posts()) : ?>

						<?php while (have_posts()) : the_post(); ?>
							<div class="tile-home__noticia">
								<div class="tile-home__noticia__imagen">
									<?php $postimageurl = get_post_meta(get_the_ID(), 'thumb', true);
										if ($postimageurl) { ?>
										<a href="<?php the_permalink(); ?>"><img src="<?php echo $postimageurl; ?>" alt="alt"/> </a>
										<?php } else { ?> 
										<img src="<?php bloginfo('template_url'); ?>/images/thumb.jpg" alt="alt"/> 
									<?php } ?>
								</div>

						 		<div class="tile-home__noticia__title">
									<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						 		</div>
							</div>
						<?php endwhile; ?>

					<?php else : ?>
						<h1>Lo que buscas no se encuentra</h1>			
					<?php endif; ?>
				</section>
			</div>
			
		</section>

	</div>

	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>