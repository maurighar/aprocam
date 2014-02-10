<?php
	if (isset( $_POST["Obs"])){
		$id_marca = $_GET["id"] ;
		$obserb = $_POST["Obs"] ;
		$actualizar = "UPDATE control SET obs='$obserb' WHERE  id=$id_marca";
		require 'connect_db.php';
		
		require 'mensaje.php';
		mensaje_actualizacion($marcado = $mysqli->query("$actualizar"));
		$mysqli->close();
	}
?>