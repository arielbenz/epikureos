<!DOCTYPE html>
<html lang="es">

<?php
	$cad = $_SERVER['REQUEST_URI'];
	$current = explode("/", $cad);

	if (in_array("novedades", $current)) {
    	$actual = "novedades";
	} else if (in_array("laposta", $current)) {
		$actual = "laposta";
	} else if (in_array("promos", $current)) {
		$actual = "promos";
	} else if (in_array("quees", $current)) {
		$actual = "quees";
	} else if (in_array("contacto", $current)) {
		$actual = "contacto";
	}

	//Sitio online
	//$url = URL::to('/');
	//require_once($_SERVER ['DOCUMENT_ROOT'].'/blog/wp-config.php');

	//localhost
	$url = "http://".$_SERVER['HTTP_HOST'].'/epikureos';
	require_once($_SERVER ['DOCUMENT_ROOT'].'epikureos/blog/wp-config.php');
?>

<head>
	<title>Alta Salida - Tus salidas en un solo lugar</title>

	<meta charset="utf-8" />
	<meta description = "Alta Salida - Tus salidas en un solo lugar"/>

	<meta name="keywords" content="Salidas, Comidas, Bebidas, Santa Fe, Gastronomía" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<link rel="shorcut icon" type="image/x-icon" href="<?php echo $url;?>/img/favicon.ico" />

