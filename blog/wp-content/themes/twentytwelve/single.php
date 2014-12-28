<?php include "../app/views/header.php";?>

	<?php

		if ($actual == 'novedades') { ?>
			
			<section class="barra-content barra-content--novedades">
				<div class="barra">
					<div class="barra-titulo">
						<h2><b class="font-bold">NOVEDADES</b></h2>
					</div>
				</div>
			</section>

		<?php

		} else if($actual == 'laposta') { ?>

			<section class="barra-content barra-content--laposta">
				<div class="barra">
					<div class="barra-titulo">
						<h2><b class="font-normal">LA</b><b class="font-bold">POSTA</b></h2>
					</div>
				</div>
			</section>
	<?php	
		}
	?>

	<div class="container-post container-<?php echo $actual; ?>">

		<div class="content-post" >

			<?php while ( have_posts() ) : the_post(); ?>

					<div class="post-header">
						<h1 class="post-header-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>										
						<h3 class="post-header-date"><?php the_time('j F Y') ?></h3>
					</div>

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

				<!-- <div class="meta">
					<p><?php the_tags(); ?></p>
				</div> -->

			<?php endwhile; ?>

		</div>

		<?php get_sidebar(); ?>
	
	</div>

<?php include "../app/views/footer.php";?>