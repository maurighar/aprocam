<?php
	if (isset($_REQUEST["obs"])){
		$id_marca = $_REQUEST["id"] ;
		$obserb = $_REQUEST["obs"] ;
		$actualizar = "UPDATE control SET obs='$obserb' WHERE  id=$id_marca";
		require 'connect_db.php';

		require 'mensaje.php';
		mensaje_actualizacion($marcado = $mysqli->query("$actualizar"));
		$mysqli->close();
	}
?>