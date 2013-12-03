<!DOCTYPE html>
<html lang="es">

<?php
	$cad = $_SERVER['REQUEST_URI'];
	$actual = explode("/", $cad)[2];
	$url = URL::to('/');
	require_once($_SERVER ['DOCUMENT_ROOT'].'epikureos/blog/wp-config.php');
?>

<head>
	<meta charset="utf-8" />
	<title>Alta Salida - Un nuevo hábito gastronómico</title>

	<link rel="stylesheet" href="<?php echo $url;?>/css/normalize.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/open-sans.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/titillium-web.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/style.css" />
	<link rel="stylesheet" href="<?php echo $url;?>/css/<?php echo $actual; ?>.css" />
