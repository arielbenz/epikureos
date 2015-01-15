
<?php 
	$category = get_the_category(); 
	$seccion = $category[0]->slug;
	
	include "../app/views/header.php";
?>

	<?php

		if ($seccion == 'novedades') { ?>
			
			<section class="barra-content barra-content--novedades">
				<div class="barra">
					<div class="barra-titulo">
						<h2><b class="font-bold">NOVEDADES</b></h2>
					</div>
				</div>
			</section>

		<?php

		} else if($seccion == 'laposta') { ?>

			<section class="barra-content barra-content--laposta">
				<div class="barra">
					<div class="barra-titulo">
						<h2><b class="font-normal">LA</b><b class="font-bold">POSTA</b></h2>
					</div>
				</div>
			</section>
	
	<?php } ?>

	<div class="tiles-container tiles-container__<?php echo $seccion;?>">

		<div class="tiles-section">

			<?php if (have_posts()) :

		 	while (have_posts()) : the_post(); 

			if ($seccion == 'novedades') { ?>

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

				<?php

				} else if($seccion == 'laposta') { ?>

				<div class="tile-laposta">

					<!--imagen posta-->
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

				<?php }	?>

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

		<?php
			get_sidebar();
		?>

	</div>

<?php include "../app/views/footer.php";?>