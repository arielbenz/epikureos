<?php include "../app/views/header.php";?>

<?php include "../app/views/menu.php";?>

		<section id="container-post">

			<?php while ( have_posts() ) : the_post(); ?>

				<nav id="nav-single">
					
					<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
				</nav><!-- #nav-single -->

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

			<?php endwhile; // end of the loop. ?>

		</section><!-- #primary -->

<?php include "../app/views/footer.php";?>