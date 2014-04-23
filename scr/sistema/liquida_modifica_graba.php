<?php
	$liquidacion = $_POST['liquidacion_txt'];
	$alta = $_POST['alta_txt'];
	$revalidas = $_POST['revalidas_txt'];
	$fecha = $_POST['fecha_txt'];
	$id = $_GET['id'];


	$actualizar = "UPDATE liquidacion SET liquidacion = $liquidacion, alta = $alta, revalida = $revalidas, fecha = '$fecha' WHERE id = $id";

	require 'connect_db.php';
	$mensaje = $mysqli->query("$actualizar");

	$mysqli->close();

	header("Location: liquida_control.php?lote=$liquidacion&mensaje=$mensaje");
?>