
	<footer>
		<section class="home-footer">

			<div class="footer-block">

				<nav class="footer-links footer-info">
					<h3>TU SALIDA</h3>
					<div class="about">
						<ul>
							<li><a href="<?php echo $url?>/novedades">Novedades</a></li>
							<li><a href="<?php echo $url?>/laposta">La Posta</a></li>
						</ul>
					</div>

					<div class="contact">
						<ul>
							<li><a href="<?php echo $url?>/quees">¿Qué es?</a></li>
							<li><a href="<?php echo $url?>/contacto">Contacto</a></li>
						</ul>
					</div>
				</nav>

				<article class="footer-redes footer-info">
					<h3>SEGUINOS EN</h3>
					<ul>
						<li><a href="http://facebook.com/TuSalidaBar" class="link-face"></a></li>
	      				<li><a href="http://twitter.com/tusalidaok" class="link-twitter"></a></li>
	       				<li><a href="https://plus.google.com/u/0/106453338753507424328" class="link-plus"></a></li>
					</ul>
				</article>

				<article class="footer-news footer-info">
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

	<div id="fb-root"></div>

	<script src="<?php echo $url?>/assets/js/jquery-1.11.1.min.js"></script>

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
			$('#form-contacto').submit(function() {
				$.post("enviar.php", $("#form-contacto").serialize(),  function(response) {			
					$('#respuesta').css("display","block");
					$('#respuesta').html(response);
				});
				return false;
			});
		});

		$(".menu-login").click(function(event){
			<?php $_SESSION['lastpage'] = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; ?>
			window.location = "http://<?php echo $_SERVER['HTTP_HOST'] ?>/loginfb";
		});
		$(".menu-logout").click(function(event){
			<?php $_SESSION['lastpage'] = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; ?>
			window.location = "http://<?php echo $_SERVER['HTTP_HOST'] ?>/logout";
		});

	    $(function() {
	        var btn_movil = $('.nav-mobile'),
	           	menu = $('.menu').find('ul');
	        btn_movil.on('click', function (e) {
	            e.preventDefault();
	            var el = $(this);
	            el.toggleClass('nav-active');
	            menu.toggleClass('open-menu');
	        })
	    });
	</script>

	<?php
	if($actual != "novedades" && $actual != "laposta" && $actual != "blog") {
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

	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<?php
		if(null != $busqueda) {
			?>
			<script src="<?php echo $url?>/assets/js/busqueda.min.js"></script>

			<script>
		    	var nombres = $.parseJSON('<?php echo json_encode($nombres)?>');
		    	var slugs = $.parseJSON('<?php echo json_encode($slugs)?>');
		    	var latitudes = $.parseJSON('<?php echo json_encode($latitudes)?>');
		    	var longitudes = $.parseJSON('<?php echo json_encode($longitudes)?>');
		    	var tipos = $.parseJSON('<?php echo json_encode($tipos)?>');
		    	var urlBusqueda = "<?php echo $url ?>" + "/busqueda/" + "<?php echo $busqueda ?>";
		    	setLugares("<?php echo $url ?>", nombres, latitudes, longitudes, tipos, slugs);

				$(document).on("ready", function() {
					var comida = "<?php echo $comidaBusqueda->slug; ?>";
					$(".cs-select option").each(function() {
						if ($(this).val() == comida) {
							$(this).attr("selected", "selected");
						}
					});
					$(".cs-select").change(function(){
						window.location = "<?php echo $url ?>" + "/busqueda/" + "<?php echo $busqueda ?>/" + $(this).val();
					});
				});
			</script>

			<?php
		}
	?>

	<?php
		if (in_array("lugares", $current)) { ?>
	    	<script>
				var votesUserAjax, ratingUser = null;
				var lugar = $.parseJSON('<?php echo $lugar?>');
				var urlLike = "<?php echo $lugar->slug; ?>/votelike";

				function getVotesUserAjax() {
					return $.parseJSON('<?php echo json_encode($votesUser)?>');
				}
				function getRatingUser() {
					return "<?php echo $ratingUser ?>";
				}
				function getUserStatus() {
					return "<?php echo Auth::check(); ?>";
				}
				function callbackLogin() {
					<?php $_SESSION['lastpage'] = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; ?>
					window.location = "http://<?php echo $_SERVER['HTTP_HOST']; ?>/loginfb";
				}
			</script>
	    	<script src="<?php echo $url?>/assets/js/all.lugar.js"></script>
    	<?php
    	} ?>

	<script src="<?php echo $url?>/assets/js/all.js"></script>

</body>
</html>