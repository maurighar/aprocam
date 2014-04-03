<?php

	$socio = $_POST['socio_txt'];
	$nombre = $_POST['nombre_txt'];
	$cuit = $_POST['cuit_txt']; //campo clave
	$calle = $_POST['calle_txt'];
	$numero = $_POST['numero_txt'];
	$piso = $_POST['piso_txt'];
	$depto = $_POST['depto_txt'];
	$provincia = $_POST['provincia_txt'];
	$localidad = $_POST['localidad_txt'];
	$telefono = $_POST['telefono_txt'];
	$email = $_POST['email_txt'];

	$fecha = date("Y-m-d");

	$actualizar = "INSERT INTO empresas (socio,nombre,cuit,calle,numero,piso,depto,provincia,localidad,telefono,email,fecha) VALUES ($socio, '$nombre', $cuit, '$calle', '$numero', '$piso', '$depto', '$provincia', '$localidad', '$telefono', '$email','$fecha')";

	require '../sistema/connect_db.php';
	$mensaje = $mysqli->query("$actualizar");

	$mysqli->close();
	header("Location: empresa_alta.php?mensaje=$mensaje");
?>