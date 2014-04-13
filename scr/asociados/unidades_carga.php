<?php

	$dominio = strtoupper($_POST['dominio_txt']);
	$cuit = $_GET["cuit"];

	$fecha = date("Y-m-d");

	$actualizar = "INSERT INTO unidades (cuit,dominio,fecha) VALUES ('$cuit', '$dominio', '$fecha')";

	require '../sistema/connect_db.php';
	$mensaje = $mysqli->query("$actualizar");

	$mysqli->close();
	header("Location: unidades_alta.php?mensaje=$mensaje");
?>