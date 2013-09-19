
	<!-- HEADER -->
	
	<?php
		include "app/views/header.php";
		$my_query = new WP_Query('showposts=5');
	?>

	<section id="barra-novedades" class="barra-content">
		<div id="barra">
			<div id="barra-titulo">
				<h2><b class="font-bold">NOVEDADES</b></h2>
				<div id="barra-back">
				</div>
			</div>
		</div>
	</section>

	<section id="content-novedades">

		<?php query_posts('category_name=novedades&showposts=5'); ?>

		<?php if (have_posts()) : ?>

	 		<?php while (have_posts()) : the_post(); ?>

				<div class="post">
			 		<!--titulo-->
					<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<!--fin titulo-->

					<h3><?php the_time('j F Y') ?></h3>

					<!--post-->
					<div class="post-info">
						<?php the_content(); ?>
					</div>
				</div>

				<div class="meta">
					<p><?php the_tags(); ?></p>
				</div>

			<?php endwhile; ?>

		<?php else : ?>
			<h1>Lo que buscas no se encuentra</h1>			
		<?php endif; ?>

	</section>

	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>