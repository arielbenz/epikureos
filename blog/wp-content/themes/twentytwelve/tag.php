
<?php include "../app/views/header.php";?>

	<section id="barra-novedades" class="barra-content">
		<div id="barra">
			<div id="barra-titulo">
				<div class="font-bold">BÚSQUEDA</div>
			</div>
		</div>
	</section>

	<div class="bar-blog"></div>

	<div id="container-post">

		<div id="content-post" >

			<?php if (have_posts()) : ?>

		 		<?php while (have_posts()) : the_post(); ?>

					<div class="post-novedades">
						
						<!--imagen novedades-->
						<div class="imagen-novedades">
							<?php $postimageurl = get_post_meta(get_the_ID(), 'thumb-mini', true);
								if ($postimageurl) { ?>
									<a href="<?php the_permalink(); ?>"><img src="<?php echo $postimageurl; ?>" alt="alt"/> </a>
								<?php } else { ?> 
									<img src="<?php bloginfo('template_url'); ?>/images/thumb.jpg" alt="alt"/> 
							<?php } ?>
						</div>

						<div class="info-novedades">
							<!--titulo-->
							<div class="post-title">
								<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							</div>
							
							<!--fecha-->
							<div class="post-fecha">
								<?php the_time('j F Y') ?>
							</div>

							<!--post-->
							<div class="post-info">
								<?php the_excerpt()?>
							</div>

						</div>
					</div>

				<?php endwhile; ?>

				<div id="pagination">
					<div id="nav-pages">
						<?php my_pagination(); ?>
					</div>
				</div>

			<?php else : ?>
				<h1>Lo que buscas no se encuentra</h1>			
			<?php endif; ?>

		</div>

		<?php
			get_sidebar();
		?>

	</div>

<?php include "../app/views/footer.php";?>