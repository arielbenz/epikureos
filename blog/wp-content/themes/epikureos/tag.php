
<?php 
	$seccion = "blog";
	include "../app/views/header.php";
?>

	<section class="barra-content barra-content--novedades">
		<div class="barra">
			<div class="barra-titulo">
				<h2><div class="font-bold">BÚSQUEDA</div></h2>
			</div>
		</div>
	</section>

	<div class="tiles-container">

		<div class="tiles-container__novedades">

			<div class="tiles-section">

			<?php if (have_posts()) :

	 		while (have_posts()) : the_post(); ?>

				<div class="tile-laposta">
							
					<!--imagen novedades-->
					<div class="tile-laposta-imagen">

						<!--fecha posta-->
						<div class="tile-laposta-imagen__fecha">
							<p><?php the_time('j M Y') ?><p>
						</div>

						<figure>
							<a href="<?php the_permalink(); ?>">
							<?php $postimageurl = get_post_meta(get_the_ID(), 'thumb-mini', true);
								if ($postimageurl) { ?>
									<img src="<?php echo $postimageurl; ?>"/>
								<?php } else { ?> 
									<img src="<?php bloginfo('template_url'); ?>/images/thumb.jpg"/> 
							<?php } ?>
							</a>
						</figure>

						<!--titulo posta-->
						<a href="<?php the_permalink(); ?>">
							<div class="tile-laposta-imagen__info">
								<h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>
							</div>
						</a>
					</div>

					<div class="tile-laposta__info">
						<?php the_excerpt()?>
					</div>
				</div>

			<?php endwhile; ?>

			<div class="pagination">
				<div class="nav-pages">
					<?php my_pagination(); ?>
				</div>
			</div>

			<?php else : ?>
				<h1>Lo que buscas no se encuentra</h1>
			<?php endif; ?>

			</div>

			<?php get_sidebar(); ?>

		</div>
	</div>

<?php include "../app/views/footer.php";?>