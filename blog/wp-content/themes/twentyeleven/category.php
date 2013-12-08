
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
	<?php	
		}
	?>

	
	<div class="bar-blog"></div>


	<div id="container-post">

		<div id="content-post" >

			<?php if (have_posts()) : ?>

		 		<?php while (have_posts()) : the_post(); ?>

					<div class="post-novedades">
				 		<!--imagen noticia-->
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

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>
				<h1>Lo que buscas no se encuentra</h1>			
			<?php endif; ?>

		</div>

		<?php get_sidebar(); ?>

	</div>



	<?php include $_SERVER ['DOCUMENT_ROOT'].'epikureos/app/views/footer.php';?>