<?php
	if (isset( $_GET["id"])){
		$id_marca = $_GET["id"] ;
		$feche_entrega = date("d-m-Y") ;

		$actualizar = "UPDATE control SET entregado='$feche_entrega' WHERE  id=$id_marca";

		require 'connect_db.php';
		require 'mensaje.php';
		mensaje_actualizacion($marcado = $mysqli->query("$actualizar"));
		$mysqli->close();
	}
?>