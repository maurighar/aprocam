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

	$actualizar = "UPDATE empresas SET socio = $socio, nombre = '$nombre', calle = '$calle', numero = '$numero', piso = '$piso', depto = '$depto', provincia = '$provincia', localidad = '$localidad', telefono = '$telefono', email = '$email' WHERE cuit = $cuit";

	require '../sistema/connect_db.php';
	$mensaje = $mysqli->query("$actualizar");

	$mysqli->close();
	header("Location: empresa.php?cuit=$cuit&mensaje=$mensaje");
?>

	socio = $socio, nombre = $nombre, calle = $calle, numero = $numero, piso = $piso, depto = $depto, provincia = $provincia, localidad = $localidad, telefono = $telefono, email = $email