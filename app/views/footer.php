
	<footer>
		<section id="home-footer">

			<div class="footer-block">

				<nav id="footer-links" class="footer-info">
					<h3>TU SALIDA</h3>
					<div id="about">
						<ul>
							<li><a href="<?php echo $url?>/novedades">Novedades</a></li>
							<li><a href="<?php echo $url?>/laposta">La Posta</a></li>
						</ul>
					</div>

					<div id="contact">
						<ul>
							<li><a href="<?php echo $url?>/quees">¿Qué es?</a></li>
							<li><a href="<?php echo $url?>/contacto">Contacto</a></li>
						</ul>
					</div>
				</nav>

				<article id="footer-redes" class="footer-info">
					<h3>SEGUINOS EN</h3>
					<ul>
						<li><a href="http://facebook.com/TuSalidaBar" class="link-face"></a></li>
	      				<li><a href="http://twitter.com/tusalidaok" class="link-twitter"></a></li>
	       				<li><a href="https://plus.google.com/u/0/106453338753507424328" class="link-plus"></a></li>
					</ul>
				</article>

				<article id="footer-news" class="footer-info">
					<h3>MANTENTE INFORMADO</h3>

					<div class="input">
						<div class="form-icon">
							<div class="icon mail"></div>
						</div>

						<div id="mc_embed_signup">
							<form id="form-footer" action="http://tusalida.us8.list-manage.com/subscribe/post?u=0c8dcb8d56d850adea5b44305&amp;id=a048191a2d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
								<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Ingresá tu mail..." required>
							    <div style="position: absolute; left: -5000px;"><input type="text" name="b_0c8dcb8d56d850adea5b44305_a048191a2d" value=""></div>
								<div class="clear"><input type="submit" value="LISTO" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
							</form>
						</div>
					</div>				
				</article>

			</div>

			<div class="footer-copy">
				<article class="footer-terminos">
					<small><a href="<?php echo $url?>/terminos">Términos y condiciones de uso</a> | Copyright 2014 Tu Salida</small>
				</article>

				<article class="footer-design">
					<p>Diseñado por Nicolás Rebaudino</p>
				</article>
			</div>
			
		</section>
	</footer>

	<script async src="<?php echo $url?>/js/modernizr.min.js"></script>
	<script async src="<?php echo $url?>/js/bootstrap.min.js"></script>
	<script async src="<?php echo $url?>/js/bootbox.min.js"></script>

	<script>
		$(document).on("ready", function() {
			$("select option").each(function() {
				if ($(this).val() == city) {
					$(this).attr("selected", "selected");
				}
			});
			$(".select-city").change(function(){
				window.location = "http://" + $(this).val() + ".epikureos.com";
			});
		});
	</script>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&appId=1493433700874584&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<script>
		$(".menu-login").click(function(event){
			<?php $_SESSION['lastpage'] = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; ?>
			window.location = "http://<?php echo $_SERVER['HTTP_HOST'] ?>/loginfb";
		});
		$(".menu-logout").click(function(event){
			<?php $_SESSION['lastpage'] = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; ?>
			window.location = "http://<?php echo $_SERVER['HTTP_HOST'] ?>/logout";
		});
	</script>

	<?php
	if($actual != "novedades" && $actual != "laposta") {
		if(Session::has('message')) {
			?>
			<script>
				bootbox.dialog({
					message: "<?php echo Session::get('message'); ?>",
				  	title: "Error",
				  	buttons: {
					    danger: {
				      	label: "Aceptar",
				      	className: "btn-primary",
				      	callback: function() {}
				    }
				  }
				});
			</script>
			<?php
		}
	}
	?>

</body>
</html>