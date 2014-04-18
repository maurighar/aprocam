<?php
	$lote = $_POST['liquidacion_txt'];  //campo liquidacion
	$alta = $_POST['alta_txt'];
	$revalidas = $_POST['revalidas_txt'];
	$fecha = $_POST['fecha_txt'];


//falta cambiar aca



	$actualizar = "UPDATE liquidacion SET socio = $socio, nombre = '$nombre', calle = '$calle', numero = '$numero', piso = '$piso', depto = '$depto', provincia = '$provincia', localidad = '$localidad', telefono = '$telefono', email = '$email' WHERE cuit = $cuit";

	require '../sistema/connect_db.php';
	$mensaje = $mysqli->query("$actualizar");

	$mysqli->close();
	header("Location: empresa.php?cuit=$cuit&mensaje=$mensaje");
?>