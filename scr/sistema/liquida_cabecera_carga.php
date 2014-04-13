<?php
	$liquidacion = $_POST['liquidacion_txt'];
	$alta = $_POST['alta_txt'];
	$revalidas = $_POST['revalidas_txt'];
	$fecha = $_POST['fecha_txt'];

	$actualizar = "INSERT INTO liquidacion (liquidacion,alta,revalidas,fecha) VALUES ($liquidacion,$alta,$revalidas,'$fecha')";

	require '../sistema/connect_db.php';
	$mensaje = $mysqli->query("$actualizar");

	$mysqli->close();
	header("Location: empresa_alta.php?mensaje=$mensaje");
?>