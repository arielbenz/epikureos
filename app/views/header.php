<!DOCTYPE html>
<html lang="es">

<?php
	$cad = $_SERVER['REQUEST_URI'];
	$actual = explode("/", $cad)[2];

	$url = "http://localhost/epikureos";
	require_once($_SERVER ['DOCUMENT_ROOT'].'epikureos/blog/wp-config.php');
?>

<head>
	<meta charset="utf-8" />
	<title>Epikureos - Un nuevo hábito gastronómico</title>

	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,900,700,300,200,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/<?php echo $actual; ?>.css" />
	<link rel="stylesheet" href="css/busqueda.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
</head>

<body>

<?php include "app/views/menu.php";?>