<?php
	$liquidacion = $_POST['liquidacion_txt'];
	$alta = $_POST['alta_txt'];
	$revalidas = $_POST['revalidas_txt'];
	$fecha = $_POST['fecha_txt'];

	$actualizar = "INSERT INTO liquidacion (liquidacion,alta,revalida,fecha) VALUES ($liquidacion,$alta,$revalidas,'$fecha')";

	require '../sistema/connect_db.php';
	$mensaje = $mysqli->query("$actualizar");

	$mysqli->close();
	header("Location: liquida_cabecera.php?mensaje=$mensaje");
?>