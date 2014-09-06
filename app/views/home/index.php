
	<!-- HEADER -->
	
	<?php
		include "app/views/header.php";
	?>

	<!-- HOME -->	
	
	<section id="home-search">

		<article id="search">
			<div class="search-section">
				<div class="search-home">
					<form id="form-search" action="<?php echo $url?>/busqueda" method="POST">
						<input type="text" name="lugar" placeholder="Ingresá tu lugar, comida o bebida favorita..." required></input><button type="submit">Buscar</button>
					</form>
				</div>
				<nav id="nav-search">
					<ul>
						<li><a href="<?php echo $url?>/busqueda/restobar" title="Bares y Restos">BAR/RESTO</a></li>
						<li><a href="<?php echo $url?>/busqueda/restaurante" title="Restaurantes">RESTAURANTES</a></li>
						<li><a href="<?php echo $url?>/busqueda/cafe" title="Cafeterías">CAFETERÍAS</a></li>
						<li><a href="<?php echo $url?>/busqueda/heladerias" title="Heladerías">HELADERÍAS</a></li>
					</ul>
				</nav>
			</div>
		</article>
		
	</section>

	<section id="home-info">

		<div class="home-recomended">
			<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/busqueda/cafe/reuniontrabajo">
				<figure class="effect-oscar">
					<img src="<?php echo $url?>/img/recomend1.jpg" alt="img08"/>
					<figcaption>
						<p class="font-normal">Bares para una</p>
						<h2 class="font-normal">Reunión de <span class="font-bold">Trabajo</span></h2>
					</figcaption>			
				</figure>
			</a>

			<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/busqueda/bar/afteroffice">
				<figure class="effect-oscar">
					<img src="<?php echo $url?>/img/recomend2.jpg" alt="img08"/>
					<figcaption>
						<p class="font-normal">Bares para</p>
						<h2 class="font-normal"><span class="font-bold">after </span>office</h2>
					</figcaption>			
				</figure>
			</a>

			<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/busqueda/restaurante/pareja">
				<figure class="effect-oscar">
					<img src="<?php echo $url?>/img/recomend3.jpg" alt="img08"/>
					<figcaption>
						<p class="font-normal">Restaurantes para</p>
						<h2 class="font-normal">ir en <span class="font-bold">pareja</span></h2>
					</figcaption>			
				</figure>
			</a>
		</div>

		<div class="seccion-novedades">
			<section id="laposta">

				<div id="etiqueta-laposta">
					<img src="<?php echo $url?>/img/laposta.png">
				</div>

				<?php query_posts('category_name=laposta&showposts=1'); ?>

				<?php if (have_posts()) : ?>

					<?php while (have_posts()) : the_post(); ?>
						<div class="posta">
							<div class="imagen-laposta">
								<?php $postaimagen = get_post_meta(get_the_ID(), 'thumb', true);
									if ($postaimagen) { ?>
									<img src="<?php echo $postaimagen; ?>" alt="alt"/> 
									<?php } else { ?> 
									<img src="<?php bloginfo('template_url'); ?>/images/thumb.jpg" alt="alt"/> 
								<?php } ?>
							</div>

						</div>
					<?php endwhile; ?>

				<?php else : ?>
					<h1>Lo que buscas no se encuentra</h1>			
				<?php endif; ?>
				
		 		<div class="title-laposta">
		 			<div class="calendar">
		 				<div class="icon-calendar">

						</div>
		 				<div class="post-fecha">
							<?php the_time('j M') ?>
						</div>
		 			</div>
		 			<div class="bottom-info">
		 				<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<div class="extract">
							<?php the_excerpt()?>
						</div>
		 			</div>
		 		</div>

			</section>
			
			<section id="noticias">
				
				<?php query_posts('category_name=novedades&showposts=2'); ?>

				<?php if (have_posts()) : ?>

					<?php while (have_posts()) : the_post(); ?>
						<div class="noticia">

							<!--imagen noticia-->
							<div class="imagen-noticia">
								<?php $postimageurl = get_post_meta(get_the_ID(), 'thumb', true);
									if ($postimageurl) { ?>
									<a href="<?php the_permalink(); ?>"><img src="<?php echo $postimageurl; ?>" alt="alt"/> </a>
									<?php } else { ?> 
									<img src="<?php bloginfo('template_url'); ?>/images/thumb.jpg" alt="alt"/> 
								<?php } ?>
							</div>

							<!--titulo noticia-->
					 		<div class="title-noticia">
								<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					 		</div>

							<!-- <h3><?php the_time('j F Y') ?></h3> -->
						</div>
					<?php endwhile; ?>

				<?php else : ?>
					<h1>Lo que buscas no se encuentra</h1>			
				<?php endif; ?>
				<!--fin loop-->
			</section>
		</div>
		
	</section>

	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>