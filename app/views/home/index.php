
	<!-- HEADER -->
	
	<?php
		include "app/views/header.php";
		$my_query = new WP_Query('showposts=2');
		$my_query_posta = new WP_Query('showposts=1');
	?>

	<?php include "app/views/menu.php";?>

	<!-- HOME -->	
	
	<section id="home-search">
		<article id="search">

			<form id="form-search" action="<?php echo $url?>/busqueda" method="POST">
				<input type="text" name="lugar" placeholder="Ingresá tu lugar favorito..." required></input>
				<button type="submit">Buscar</button>
			</form>	

		</article>
		<nav id="nav-search">
			<ul>
				<li><a href="<?php echo $url?>/busqueda/restobar" title="Bares y Restos">BAR/RESTO</a></li>
				<li><a href="<?php echo $url?>/busqueda/restaurant" title="Restaurantes">RESTAURANTES</a></li>
				<li><a href="<?php echo $url?>/busqueda/cafe" title="Cafeterías">CAFETERÍAS</a></li>
				<li><a href="<?php echo $url?>/busqueda/heladerias" title="Heladerías">HELADERÍAS</a></li>
			</ul>
		</nav>
	</section>

	<section id="home-promo">
		<article id="promo"></article>
		<article id="lugar"></article>
	</section>

	<section id="home-info">

		<section id="laposta">

			<div id="etiqueta-laposta">
				<img src="<?php echo $url?>/img/laposta.png">
			</div>

			<?php query_posts('category_name=laposta&showposts=1'); ?>

			<?php if (have_posts()) : ?>

				<?php while (have_posts()) : the_post(); ?>
					<div class="posta">

						<!--Imagen la posta-->
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

			<!--titulo laposta-->
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
			
			<article id="ultimasnoticias">
				<h3>ÚLTIMAS NOTICIAS</h3>
			</article>

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

			<article id="masnoticias">
				<h4><a href="<?php echo $url?>/novedades">MÁS NOTICIAS</h4>
			</article>
		</section>
		
	</section>

	<section id="home-publicidad">
		<article id="publicidad1" class="class-publi"></article>
		<article id="publicidad2" class="class-publi"></article>
		<article id="publicidad3" class="class-publi"></article>
		<article id="publicidad4" class="class-publi"></article>
	</section>


	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>