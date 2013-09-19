
	<!-- HEADER -->
	
	<?php include "app/views/header.php";?>

	<section id="barra-contacto" class="barra-content">
		<div id="barra">
			<div id="barra-titulo">
				<h2>CONTACTO</h2>
				<div id="barra-back">
				</div>
			</div>
		</div>
	</section>

	<section id="content-contacto">

		<article id="header-contacto">
			<h2>¡TU OPINIÓN NOS INTERESA!</h2>
			<p>Aquí encontrarás la forma más rápida de contacterte con nosotros. Prometemos responderte los antes posible</p>
			<p>¡Estamos en contacto!</p>
		</article>

		<article id="info-contacto">
			<h2><b class="font-normal">INFO</b><b class="font-bold">CONTACTO</b></h2>
			<div id="info-data">
				<p><strong>t.</strong>  342-5055-444</p>
				<p><strong>t.</strong>  11-364-265-64</p>
				<p id="info-mail"><strong>@</strong> hola@epikureos.com</p>
			</div>
		</article>

		<article id="mensaje-contacto">
			<h2>DEJÁNOS TU MENSAJE</h2>
			
			<form id="form-contacto" action="enviar.php" method="POST">
				<input id="form-nombre" type="text" name="nombre" placeholder="Nombre*" required></input>
				<input id="form-mail" type="email" name="mail" placeholder="Correo Electrónico*" required></input>
				<textarea id="form-comentario" name="comentario" placeholder="Comentario*" required></textarea>
				<input id="form-enviar" type="submit" value="ENVIAR"/>
				<!-- <button id="form-enviar">ENVIAR</button> -->
			</form>

			<div id="exito" style="display:none">
            	Sus datos han sido recibidos con éxito.
        	</div>

        	<div id="fracaso" style="display:none">
	            Se ha producido un error durante el envío de datos.
	        </div>
			
		</article>

	</section>

	<section id="content-lugar">
		<h3>AGREGÁ TU LUGAR FAVORITO</h3>
		<article id="lugar-info">

			<form id="form-lugar" action="" method="POST">

				<div id="personal-data">
					<h2><b class="font-normal">TUS</b><b class="font-bold">DATOS</b></h2>
					<input id="personal-nombre" type="text" name="nombre" placeholder="Nombre" required></input>
					<input id="personal-apellido" type="text" name="apellido" placeholder="Apellido" required></input>
					<input id="personal-telefono" type="text" name="telefono" placeholder="Teléfono" required></input>
					<input id="personal-mail" type="email" name="mail" placeholder="Correo Electrónico" required></input>
				</div>

				<div id="sitio-data">
					<h2><b class="font-normal">EL</b><b class="font-bold">SITIO</b></h2>
					<input id="lugar-nombre" type="text" name="nombreLugar" placeholder="Nombre" required></input>
					<select>
						<option value="" disabled selected>Rubro</option>
						<option value ="resto">RESTÓ</option>
					</select>
					<input id="lugar-direccion" type="text" name="direccionLugar" placeholder="Dirección" required></input>
					<select>
						<option value="" disabled selected>Ciudad</option>
						<option value ="santafe">SANTA FE</option>
					</select>
				</div>

				<input id="form-reportar" type="submit" value="REPORTAR"/>

			</form>	

		</article>
	</section>

	<!-- FOOTER -->

	<footer>
		<section id="home-footer">

			<nav id="footer-links" class="footer-info">
				<h3>Epikureos</h3>
				<div id="about">
					<ul>
						<li><a href="">¿Qué es?</a></li>
						<li><a href="">Nuestra Filosofía</a></li>
						<li><a href="">FAQ</a></li>
					</ul>
				</div>

				<div id="contact">
					<ul>
						<li><a href="">Agregá tu lugar favorito</a></li>
						<li><a href="">Contacto</a></li>
					</ul>
				</div>
			</nav>

			<article id="footer-redes" class="footer-info">
				<h3>SEGUINOS EN</h3>
			</article>

			<article id="footer-news" class="footer-info">
				<h3>RECIBÍ TODAS LAS<br>NOVEDADES</h3>
				<form id="form-footer">
					<input type="email" placeholder="Ingresá tu mail..." required></input>
				</form>
			</article>

			<article id="footer-terminos">
				<small>Términos de uso y políticas de seguridad | Copyright 2013 Epikureos</small>
			</article>

			<article id="footer-design">
				<p>Diseñado por R</p>
			</article>
			
		</section>
	</footer>

	<script>
			//Nuestro código
			var $nombre = $('#form-nombre'),
				$mail = $('#form-mail'),
				$enviar = $('#form-enviar'),
				$mensaje = $('#form-comentario');

			$('#form-contacto').submit(function() {
				$.ajax({
					type:"POST",
					url: "enviar.php",
					data:{id:"fgfg"}
					}).done(function(msg){
						alert($nombre.val());
					});
			});

			// function enviar() {
			// 	$.ajax({
			// 		type:"POST",
			// 		url: "enviar.php",
			// 		data:{id:$nombre.val()}
			// 		}).done(function(msg){
			// 			alert($nombre.val());
			// 		});
			// }

		</script>
</body>
</html>