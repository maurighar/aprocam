<!DOCTYPE html>
<html lang='es'>
	<head>
		<title>RUTA - Observaciones</title>
		<link rel="icon" type="image/ico" href="../../favicon.ico">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../css/normalize.css" />
		<link rel="stylesheet" href="../../css/main.css" />
		<!--
		<style type="text/css">

		</style>
		-->

		</head>

	<body>
		<?php
			require '../../encabezado.php';
			require 'encabezado_rechazos.php';
		?>

		<?php

			$valor_id = $_GET["id"] ;

			require '../../config/connect_db.php';

			$resultado = $mysqli->query("SELECT * FROM aprocam.control WHERE id = " . $valor_id);
			$fila = $resultado->fetch_assoc();

			#echo '<textarea readonly="readonly" cols="50" rows="10" name="rechazo">' . $fila['rechazo'] . '</textarea>';
			echo "<p>";
			echo  "Empresa: " . $fila['nombre'] . "<br>";
			echo  "CUIT: " . $fila['cuit'] . "<br>";
			echo  "Dominio: " . $fila['dominio'] . "<br>";
			echo  "Fecha: " . $fila['fecha'] . "<br>";
			echo  "Causa del rechazo: " . $fila['rechazo'];
			echo "</p>";

		?>
		<br />
		<a href="javascript:history.back()"> Volver Atrás</a> 
	</body>
</html>
