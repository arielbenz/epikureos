
	<!-- HEADER -->
	
	<?php include "app/views/header.php";?>

	<link rel="stylesheet" href="<?php echo $url;?>/css/laposta.css" />

	<?php include "app/views/menu.php";?>

	<!-- CONTENT -->

	<section id="barra-laposta" class="barra-content">
		<div id="barra">
			<div id="barra-titulo">
				<h2><b class="font-normal">LA</b><b class="font-bold">POSTA</b></h2>
			</div>
		</div>
	</section>

	<section id="content-laposta">

		<?php query_posts('category_name=laposta&showposts=5'); ?>

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

	<section id="home-publicidad">
		<article id="publicidad1" class="class-publi"></article>
		<article id="publicidad2" class="class-publi"></article>
		<article id="publicidad3" class="class-publi"></article>
		<article id="publicidad4" class="class-publi"></article>
	</section>

	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>