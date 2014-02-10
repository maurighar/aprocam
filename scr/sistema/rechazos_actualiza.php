<?php
	if (isset( $_GET["id"])){
		$id_marca = $_GET["id"] ;
		$fecha_entrega = date("Y-m-d") ;
		$actualizar = "UPDATE rechazos SET envio='" . $fecha_entrega . "' WHERE  id= " . $id_marca;
		require 'connect_db.php';

		require 'mensaje.php';
		mensaje_actualizacion($marcado = $mysqli->query("$actualizar"));
		$mysqli->close();
	}
?>