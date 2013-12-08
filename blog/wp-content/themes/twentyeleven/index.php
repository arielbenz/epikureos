
<?php include $_SERVER ['DOCUMENT_ROOT'].'epikureos/app/views/header.php';?>

<?php include $_SERVER ['DOCUMENT_ROOT'].'epikureos/app/views/menu.php';?>


	<section id="content-novedades">

		<?php query_posts('category_name=novedades&showposts=1'); ?>

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

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

		<?php else : ?>
			<h1>Lo que buscas no se encuentra</h1>			
		<?php endif; ?>

	</section>

<?php include $_SERVER ['DOCUMENT_ROOT'].'epikureos/app/views/footer.php';?>