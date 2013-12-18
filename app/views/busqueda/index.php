
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
			<form id="form-search" action="<?php echo $url?>/busqueda" method="POST">
				<input id="input-search" type="text" name="search" placeholder="Buscar..." required></input>
				<button type="submit">Buscar</button>
			</form>	
		</div>

		<div id="result-bar">
			<div id="result-bar-etiquetas">
				<p>Etiquetas</p>
			</div>
			<div id="result-bar-filter">
				<p>Ordenar por</p>
			</div>
		</div>

		<div id="results"></div>

		<div id="result-footer">
			<div id="Pagination" class="pagination"></div>
		</div>


	</section>

	<section id="home-publicidad">
		<article id="publicidad1" class="class-publi"></article>
		<article id="publicidad2" class="class-publi"></article>
		<article id="publicidad3" class="class-publi"></article>
		<article id="publicidad4" class="class-publi"></article>
	</section>

	<!-- JAVASCRIPT -->

	<script src="<?php echo $url;?>/js/jquery.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script src="<?php echo $url;?>/js/jquery.pagination.js"></script>

	<script src="<?php echo $url;?>/js/underscore.js"></script>
	<script src="<?php echo $url;?>/js/backbone.js"></script>

	<script>

		$(document).on("ready", inicio);

		var map;
		var busqueda = '<?php echo $busqueda?>';
		var url = '<?php echo $url?>';
		var lugares = $.parseJSON('<?php echo $lugaresJson?>');
		var thumbs = $.parseJSON('<?php echo $thumbs?>');

		var contentString = '<div id="content">'+
		    '<div id="siteNotice">'+
		    '</div>'+
		    '<h2 id="firstHeading" class="firstHeading">Uluru</h2>'+
		    '<div id="bodyContent">'+
		    '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
		    'Aboriginal people of the area. It has many springs, waterholes, '+
		    'rock caves and ancient paintings. Uluru is listed as a World '+
		    'Heritage Site.</p>'+
		    '<p>Attribution: Uluru, <a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
		    'http://en.wikipedia.org/w/index.php?title=Uluru</a> (last visited June 22, 2009).</p>'+
		    '</div>'+
		    '</div>';

		function inicio ()
		{
            //Carga de lugares
            var optInit = getOptionsFromForm();
            $("#Pagination").pagination(lugares.length, optInit);
            $('#content-busqueda').slideDown();
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
            $("input:text").each(function(){
                opt[this.name] = this.className.match(/numeric/) ? parseInt(this.value) : this.value;
            });
            var htmlspecialchars ={ "&":"&amp;", "<":"&lt;", ">":"&gt;", '"':"&quot;"}
            return opt;
        }

        function pageselectCallback(page_index, jq) {
            var items_per_page = '4';
            var max_elem = Math.min((page_index + 1) * items_per_page, lugares.length);
            var newcontent = '';

            if (lugares.length == 1) {
            	initializeMap(16);
            } else {
            	initializeMap(15);
            }
            	
        	var bounds = new google.maps.LatLngBounds();

            for(var i = page_index * items_per_page; i < max_elem; i++)
            {
               	newcontent += '<div class="box-result">';
                newcontent += '<div class="box-result-image"><a href="' + url + '/lugares/' + lugares[i].slug + '"><img src="' + thumbs[i] + '"/></a></div>';
                newcontent += '<div class="box-result-data">';
                newcontent += '<div class="box-result-title">' + lugares[i].nombre + '</div>';
                newcontent += '<div class="box-result-title">' + lugares[i].direccion + '</div>';
                
                newcontent += '</div>';
                newcontent += '</div>';

                console.log(lugares[i]);

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

            console.log(busqueda);

            $('#search-header').html('<h3><b class="font-normal">' + lugares.length + ' RESULTADOS PARA </b><b class="font-bold">"' + busqueda.toUpperCase() + '"</b></h3>');

	        return false;
        }

         function addMark(location, title, bounds) {
            var marcador = new google.maps.Marker({
	            position: location,
	            map: map,
	            title: title
	        });

	        bounds.extend(marcador.position);

	        var infowindow = new google.maps.InfoWindow({
			    content: contentString
			});

			
        }

	</script>

	<script src="<?php echo $url;?>/js/search.js"></script>

	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>

