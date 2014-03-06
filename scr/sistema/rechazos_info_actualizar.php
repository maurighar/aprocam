<?php
	if (isset( $_POST["info"])){
		$id_marca = $_GET["id"] ;
		$info = $_POST["info"] ;
		$actualizar = "UPDATE rechazos SET info='$info' WHERE  id=$id_marca";
		require 'connect_db.php';
		
		require 'mensaje.php';
		mensaje_actualizacion($marcado = $mysqli->query("$actualizar"));
		$mysqli->close();
	}
?>