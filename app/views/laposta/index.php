
<?php include "app/views/header.php";?>

	<?php

		if ($actual == 'novedades') { ?>
			
			<section id="barra-novedades" class="barra-content">
				<div id="barra">
					<div id="barra-titulo">
						<h2><b class="font-bold">NOVEDADES</b></h2>
					</div>
				</div>
			</section>

		<?php

		} else if($actual == 'laposta') { ?>

			<section id="barra-laposta" class="barra-content">
				<div id="barra">
					<div id="barra-titulo">
						<h2><b class="font-normal">LA</b><b class="font-bold">POSTA</b></h2>
					</div>
				</div>
			</section>
	
	<?php } ?>

	<div class="bar-blog"></div>

	<div id="container-post" class="container-<?php echo $actual;?>">

		<div id="content-post" >

			<?php query_posts('category_name=laposta'); ?>

			<?php if (have_posts()) : ?>

		 		<?php while (have_posts()) : the_post(); ?>

						<?php

							if ($actual == 'novedades') { ?>

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
									<?php
										if ($actual == 'novedades') { ?>
											<div class="post-info">
												<?php the_excerpt()?>
											</div>
									<?php
										}
									?>	
								</div>

							<?php

							} else if($actual == 'laposta') { ?>

								<div class="post-laposta">

									<!--imagen novedades-->
									<div class="imagen-laposta">

										<!--fecha-->
										<div class="post-fecha">
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
									</div>
									
									<!--titulo-->
									<a href="<?php the_permalink(); ?>">
										<div class="imagen-info">
											<h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>
										</div>
									</a>
						<?php }	?>

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
			if ($actual == 'novedades') { 
				get_sidebar();
			}
		?>

	</div>

<?php include "app/views/footer.php";?>