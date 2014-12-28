
	<!-- HEADER -->
	
	<?php include "app/views/header.php";?>

	<!-- CONTENT -->

	<div class="page-section">

		<section class="barra-content barra-content--contacto">
			<div class="barra">
				<div class="barra-titulo">
					<h2><b class="font-bold">CONTACTO</b></h2>
				</div>
			</div>
		</section>

		<section class="content-contacto">

			<article id="header-contacto">
				<h2>¡TU OPINIÓN NOS INTERESA!</h2>
				<p>Aquí encontrarás la forma más rápida de contacterte con nosotros. Prometemos responderte los antes posible</p>
				<p>¡Estamos en contacto!</p>
			</article>

			<article id="info-contacto">
				<h2><b class="font-bold">INFO</b><b class="font-normal">CONTACTO</b></h2>
				<div id="info-data">
					<p><strong>t.</strong>  342-5055-444</p>
					<p><strong>t.</strong>  11-364-265-64</p>
					<p id="info-mail"><strong>@</strong> info@tusalida.net</p>
				</div>
				<div id="links-contacto">
					<ul>
						<li><a href="http://facebook.com/TuSalidaBar" class="contacto-face"></a></li>
	      				<li><a href="http://twitter.com/tusalidaok" class="contacto-twitter"></a></li>
	       				<li><a href="https://plus.google.com/u/0/106453338753507424328/" class="contacto-plus"></a></li>
					</ul>
				</div>
			</article>

			<article id="mensaje-contacto">
				<h2><b class="font-bold">TU</b><b class="font-normal">MENSAJE</b></h2>
				
				<form id="form-contacto" action="enviar.php" method="POST">
					<input id="form-nombre" type="text" name="nombre" placeholder="Nombre*" required></input>
					<input id="form-mail" type="email" name="mail" placeholder="Correo Electrónico*" required></input>
					<textarea id="form-comentario" name="comentario" placeholder="Comentario*" required></textarea>
					<input id="form-enviar" type="submit" value="ENVIAR"/>
				</form>

				<div id="respuesta">

	        	</div>
				
			</article>

		</section>

	</div>

	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>