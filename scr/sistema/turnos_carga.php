<?php
	if (isset( $_REQUEST["id"])){
		$id = $_REQUEST["id"];
		$feche_entrega = date("d-m-Y") ;

		$nombre = $_REQUEST['nombre']
		$cuit = $_REQUEST['cuit']
		$cantida = $_REQUEST['cantida']
		$tipo = $_REQUEST['tipo']
		$estado = $_REQUEST['estado']



		$actualizar = "UPDATE turnos SET entregado='$feche_entrega' WHERE id=$id_marca";

		require 'connect_db.php';
		require 'mensaje.php';
		mensaje_actualizacion($marcado = $mysqli->query("$actualizar"));
		$mysqli->close();


}