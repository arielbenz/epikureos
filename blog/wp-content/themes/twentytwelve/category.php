
<?php include "../app/views/header.php";?>

	<?php
		if ($actual == 'novedades') { ?>
			<link rel="stylesheet" href="<?php echo $url;?>/css/novedades.css" />
		<?php
		} else if($actual == 'laposta') { ?>
			<link rel="stylesheet" href="<?php echo $url;?>/css/laposta.css" />
	<?php	
		}
	?>

<?php include "../app/views/menu.php";?>

	<?php

		if ($actual == 'novedades') { ?>
			
			<section id="barra-novedades" class="barra-content">
				<div id="barra">
					<div id="barra-titulo">
						<div class="font-bold">NOVEDADES</div>
					</div>
				</div>
			</section>

		<?php

		} else if($actual == 'laposta') { ?>

			<section id="barra-laposta" class="barra-content">
				<div id="barra">
					<div id="barra-titulo">
						<div class="font-normal">LA</div><div class="font-bold">POSTA</div>
					</div>
				</div>
			</section>
	
	<?php } ?>

	<div class="bar-blog"></div>

	<div id="container-post">

		<div id="content-post" >

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
											<?php the_time('j F Y') ?>
										</div>

										<figure>

											<?php $postimageurl = get_post_meta(get_the_ID(), 'thumb-mini', true);
												if ($postimageurl) { ?>
													<img src="<?php echo $postimageurl; ?>"/>
												<?php } else { ?> 
													<img src="<?php bloginfo('template_url'); ?>/images/thumb.jpg"/> 
											<?php } ?>

										</figure>	
									</div>
									
									<!--titulo-->
									<div class="imagen-info" href="<?php the_permalink(); ?>">
										<h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>
									</div>
					
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

<?php include "../app/views/footer.php";?>