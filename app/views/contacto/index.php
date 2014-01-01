
	<!-- HEADER -->
	
	<?php include "app/views/header.php";?>

	<link rel="stylesheet" href="<?php echo $url;?>/css/contacto.css" />

	<?php include "app/views/menu.php";?>

	<!-- CONTENT -->

	<section id="barra-contacto" class="barra-content">
		<div id="barra">
			<div id="barra-titulo">
				<h2><b class="font-bold">CONTACTO</b></h2>
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
			<h2><b class="font-bold">INFO</b><b class="font-normal">CONTACTO</b></h2>
			<div id="info-data">
				<p><strong>t.</strong>  342-5055-444</p>
				<p><strong>t.</strong>  11-364-265-64</p>
				<p id="info-mail"><strong>@</strong> info@altasalida.com</p>
			</div>
			<div id="links-contacto">
				<ul>
					<li><a href="http://facebook.com/AltaSalida" class="contacto-face"></a></li>
      				<li><a href="http://twitter.com/altasalida" class="contacto-twitter"></a></li>
       				<li><a href="#" class="contacto-plus"></a></li>
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
				<!-- <button id="form-enviar">ENVIAR</button> -->
			</form>

			<div id="respuesta">

        	</div>
			
		</article>

	</section>

	<!-- <section id="content-lugar">
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
	</section> -->


	<!-- JAVASCRIPT -->

	<script src="<?php echo $url;?>/js/jquery-1.10.2.min.js"></script>

	<script>

		$(document).on("ready", function(){
 
			$('#form-contacto').submit(function() {
		 
				$.post("enviar.php", $("#form-contacto").serialize(),  function(response) {			
					$('#respuesta').css("display","block");
					$('#respuesta').html(response);
				});
				return false;
			});
		});

	</script>

	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>