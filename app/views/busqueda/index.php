
	<!-- HEADER -->

	<?php include "app/views/header.php";?>

	<link rel="stylesheet" href="<?php echo $url;?>/css/busqueda.css" />
	
	<?php include "app/views/menu.php";?>

	<!-- CONTENT -->

	<section id="barra-busqueda" class="barra-content">
		<div id="barra">
			<div id="barra-titulo">
				<h2><b class="font-normal">RESULTADOS</b><b class="font-bold">BÚSQUEDA</b></h2>
			</div>
		</div>
	</section>

	<section id="mapa">

	</section>

	<section id="content-busqueda">

		<div id="search-header">
			
		</div>

		<div id="search-combo">
			<form class="form-search" action="<?php echo $url?>/busqueda" method="POST">
				<input id="input-search" type="text" name="lugar" placeholder="Buscar..." required></input>
			</form>
		</div>

		<!-- <div id="result-bar">
			<div id="result-bar-etiquetas">
				<p>Etiquetas</p>
			</div>
			<div id="result-bar-filter">
				<p>Ordenar por</p>
			</div>
		</div> -->

		<div id="results"></div>

		<div id="result-footer">
			<div id="Pagination" class="pagination"></div>
		</div>


	</section>

	<!-- <section id="home-publicidad">
		<article id="publicidad1" class="class-publi"></article>
		<article id="publicidad2" class="class-publi"></article>
		<article id="publicidad3" class="class-publi"></article>
		<article id="publicidad4" class="class-publi"></article>
	</section> -->

	<!-- JAVASCRIPT -->

	<script src="<?php echo $url;?>/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script src="<?php echo $url;?>/js/jquery.pagination.js"></script>

	<script>

		$(document).on("ready", inicio);

		var map;
		var popup;
		var busqueda = '<?php echo $busqueda?>';
		var url = '<?php echo $url?>';
		var lugares = $.parseJSON('<?php echo $lugaresJson?>');
		var thumbs = $.parseJSON('<?php echo $thumbs?>');

		var faceimg =  url + '/img/face-lugar.png';
		var twitterimg = url + '/img/twitter-lugar.png';

		function inicio ()
		{
            //Carga de lugares
            
            if (lugares.lenght > 0) {
            	var optInit = getOptionsFromForm();
            	console.log("Hay resultados");
            } else {
            	var optInit = getOptionsFromForm();
            	initializeMap(14);
		        console.log("No hay resultados");
            }
            	

	        $("#Pagination").pagination(lugares.length, optInit);
		}

		function initializeMap(zoom) {
			var latlon = new google.maps.LatLng(-31.632389, -60.699459);
	        var myOptions = {
	            zoom: zoom,
	            center: latlon,
	            scrollwheel: false,
	            mapTypeId: google.maps.MapTypeId.ROADMAP
	        };
        	map = new google.maps.Map($("#mapa").get(0), myOptions);
		}


		function getOptionsFromForm() {
            var opt = {callback: pageselectCallback};
            return opt;
        }

        function pageselectCallback(page_index, jq) {
            var items_per_page = '6';
            var max_elem = Math.min((page_index + 1) * items_per_page, lugares.length);
            var newcontent = '';

            if (lugares.length == 1) {
            	initializeMap(16);
            } else {
            	initializeMap(15);
            }

            if (lugares.length > 0) {
            	
	        	var bounds = new google.maps.LatLngBounds();

	            for(var i = page_index * items_per_page; i < max_elem; i++)
	            {
	               	newcontent += '<div class="box-result">';
	                newcontent += '<div class="box-result-image"><a target="_blank" href="' + url + '/lugares/' + lugares[i].slug + '"><img src="' + thumbs[i] + '"/></a></div>';
	                newcontent += '<div class="box-result-data">';
	                newcontent += '<div class="data-left">';
	                newcontent += '<div class="box-result-title"><a target="_blank" href="' + url + '/lugares/' + lugares[i].slug + '">' + lugares[i].nombre + '</a></div>';
	                newcontent += '<div class="box-result-address">' + lugares[i].direccion + '</div>';
	                newcontent += '</div>';
	                // newcontent += '<div class="data-right"><ul>';
	               	// newcontent += '<li><a href=' + lugares[i].facebook + '><img src="' + faceimg + '"></a></li>';
	               	// if (lugares[i].twitter != '')
	               	// 	newcontent += '<li><a href=' + lugares[i].twitter + '><img src="' + twitterimg + '"></a></li>';
	                // newcontent += '</ul></div>';
	                newcontent += '</div>';
	                newcontent += '</div>';

	                var marker = new google.maps.LatLng(lugares[i].latitud, lugares[i].longitud);
		            addMark(marker, lugares[i].nombre, bounds);
	            }

				if (lugares.length > 1) {
					map.fitBounds(bounds);
					map.setCenter(bounds.getCenter());
				} else {
					map.setCenter(bounds.getCenter());
				}

	            $('#results').html(newcontent);
        	}

        	$('#search-header').html('<h3><b class="font-normal">' + lugares.length + ' RESULTADOS PARA </b><b class="font-bold">"' + busqueda.toUpperCase() + '"</b></h3>');

	        return false;
        }

         function addMark(location, title, bounds) {

         	var infowindow = new google.maps.InfoWindow({
			    content: "<div class='info-window'>"+ title +"</div>"
			});

            var marcador = new google.maps.Marker({
	            position: location,
	            map: map,
	            title: title
	        });

	        bounds.extend(marcador.position);

			google.maps.event.addListener(marcador, "mouseover", function() {
				if(!popup){
	                popup = new google.maps.InfoWindow();
	            }
	            var note = "<div class='info-window'><p>"+ title +"</p></div>";
	            popup.setContent(note);
	            popup.open(map, this);
			});
        }
	</script>
	

	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>

