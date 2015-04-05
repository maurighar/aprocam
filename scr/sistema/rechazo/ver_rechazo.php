<?php
$titulo_pagina = "RUTA - Observaciones";
require '../header.php';

require 'encabezado_rechazos.php';
?>

<?php

	$valor_id = $_GET["id"] ;

	require '../connect_db.php';

	$resultado = $mysqli->query("SELECT *,(fecha+interval 70 day) AS vto,DATEDIFF(CURDATE(),fecha) as cant_dias FROM aprocam.control WHERE id = " . $valor_id);
	$fila = $resultado->fetch_assoc();


	echo '<p class="resaltar">';
	echo 'Empresa: ' . $fila['nombre'] . '<br>';
	echo  "CUIT: " . $fila['cuit'] . '<br>';
	echo  "Dominio: " . $fila['dominio'] . '<br>';
	echo  "Fecha: " . $fila['fecha'] . "<br>";
	echo "Vencimiento: " .$fila['vto']  . "<br>";
	echo "Cantidad de días: " . $fila['cant_dias'] . '<br>' ;

	echo '<p class="resaltarx2">';
	echo "Causa del rechazo: <strong>" . $fila['rechazo'] . "</strong>" ;
	echo "</p>";

?>
<br />
<a href="javascript:history.back()"> Volver Atrás</a>

<?php require '../footer.php'; ?>