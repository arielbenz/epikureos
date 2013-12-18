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
	<meta charset="utf-8" />
	<title>Alta Salida - Un nuevo hábito gastronómico</title>

	<link rel="stylesheet" href="<?php echo $url;?>/css/normalize.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/open-sans.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/titillium-web.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/style.css" />
