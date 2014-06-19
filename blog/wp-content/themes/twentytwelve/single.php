<?php include "../app/views/header.php";?>

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
	<?php	
		}
	?>

	<div class="bar-blog"></div>
	

	<div id="container-post" class="container-<?php echo $actual; ?>">

		<div id="content-post" >

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="post">

			 		<!--titulo-->
					<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

					<!--fecha-->
										
					<h3><?php the_time('j F Y') ?></h3>

					<?php
						if ($actual == 'laposta') { ?>

							<!--imagen novedades-->
							<div class="imagen">
								<?php $postimageurl = get_post_meta(get_the_ID(), 'thumb', true);
									if ($postimageurl) { ?>
										<a href="<?php the_permalink(); ?>"><img src="<?php echo $postimageurl; ?>" alt="alt"/> </a>
									<?php } else { ?> 
										<img src="<?php bloginfo('template_url'); ?>/images/thumb.jpg" alt="alt"/> 
								<?php } ?>
							</div>

						<?php
							}
						?>	

					<!--post-->
					<div class="post-info">
						<?php the_content(); ?>
					</div>

				</div>

				<!-- <div class="meta">
					<p><?php the_tags(); ?></p>
				</div> -->

			<?php endwhile; ?>

		</div>

		<?php get_sidebar(); ?>
	
	</div>

<?php include "../app/views/footer.php";?>