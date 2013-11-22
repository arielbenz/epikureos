<!DOCTYPE html>
<html lang="es">

<?php
	$cad = $_SERVER['REQUEST_URI'];
	$actual = explode("/", $cad)[2];
	$url = URL::to('/');
?>

<head>
	<meta charset="utf-8" />
	<title>Epikureos - Un nuevo hábito gastronómico</title>

	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,900,700,300,200,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo $url;?>/css/normalize.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/style.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/busqueda.css" />
</head>

<body>
	<!-- HEADER -->

	<?php include "app/views/menu.php";?>

	<!-- BODY -->

	<section id="barra-busqueda" class="barra-content">
		<div id="barra">
			<div id="barra-titulo">
				<h2><b class="font-normal">RESULTADOS</b><b class="font-bold">BÚSQUEDA</b></h2>
				<div id="barra-back">
					<label>

					</label>
				</div>
			</div>
		</div>
	</section>

	<section id="mapa">

	</section>

	<section id="content-busqueda">

		<div id="search-header">
			<h3>RESULTADOS PARA "<?php echo strtoupper($busqueda); ?>"</h3>
		</div>

		<div id="search-combo">
			<input id="input-search" type="text" name="search" placeholder="Buscar..." required></input>
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

	<script src="<?php echo $url;?>/js/jquery.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script src="<?php echo $url;?>/js/jquery.pagination.js"></script>

	<script src="<?php echo $url;?>/js/underscore.js"></script>
	<script src="<?php echo $url;?>/js/backbone.js"></script>

	<script>

		$(document).on("ready", inicio);

		var map;
		var url = '<?php echo $url?>';
		var lugares = $.parseJSON('<?php echo $lugaresJson?>');
		var thumbs = $.parseJSON('<?php echo $thumbs?>');

		function inicio ()
		{
            //Carga de lugares
            var optInit = getOptionsFromForm();
            $("#Pagination").pagination(lugares.length, optInit);
		}

		function initializeMap() {
			var latlon = new google.maps.LatLng(-31.632389, -60.699459);
	        var myOptions = {
	            zoom: 15,
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

            initializeMap();

        	var bounds = new google.maps.LatLngBounds();

            for(var i = page_index * items_per_page; i < max_elem; i++)
            {
               	newcontent += '<div class="box-result">';
                newcontent += '<div class="box-result-image"><a href="' + url + '/lugares/slug-lugar"><img src="' + thumbs[i] + '"/></a></div>';
                newcontent += '<div class="box-result-data">';
                newcontent += '<div class="box-result-title">' + lugares[i].nombre + '</div>';
                newcontent += '<div class="box-result-title">' + lugares[i].nombre + '</div>';
                newcontent += '<div class="box-result-desc">' + lugares[i].descripcion + '</div>';
                newcontent += '</div>';
                newcontent += '</div>';

                console.log(lugares[i]);

                var marker = new google.maps.LatLng(lugares[i].latitud, lugares[i].longitud);

	            addMark(marker, lugares[i].nombre, bounds);
            }

            map.fitBounds(bounds);
			map.setCenter(bounds.getCenter());

            $('#results').html(newcontent);

            $('#search-header').html('<h3>Mostrando ' + page_index * items_per_page + ' de ' + lugares.length + ' resultados</h3>');

	        return false;
        }

         function addMark(location, title, bounds) {
            marcador = new google.maps.Marker({
	            position: location,
	            map: map,
	            title: title
	        });

	        bounds.extend(marcador.position);
        }

	</script>

	<script src="<?php echo $url;?>/js/search.js"></script>

	<!-- FOOTER -->

	<?php include "app/views/footer.php";?>

