<?php
	$nombre = $_POST['nombre'];
	$cuit = $_POST['cuit'];
	$dominio = $_POST['dominio'];
	$tipo = $_POST['tipo'];
	$fecha = $_POST['fecha'];
	$lote = $_POST['lote'];
	$certificado = $_POST['certificado'];
	$envio = $_POST['envio'];
	$entregado = $_POST['entregado'];
	$rechazo = $_POST['rechazo'];
	$rptc = $_POST['rptc'];

	$id=$_POST['id'];

	$actualizar = "UPDATE control SET entregado = '$entregado', nombre = '$nombre', cuit = $cuit, dominio = '$dominio', tipo = '$tipo', fecha = '$fecha', lote = $lote, certificado = '$certificado', rechazo = '$rechazo', envio = '$envio', rptc = $rptc WHERE  id=$id";
	echo $actualizar;
	require 'connect_db.php';
	$mensaje = $mysqli->query("$actualizar");
	$mysqli->close();
	header("Location: modificar.php?id=$id&mensaje=$mensaje");
?>
