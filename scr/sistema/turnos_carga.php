<?php

public function genera_orden($fecha_actual){
	$consulta = $mysqli->query("SELECT max(orden) FROM turnos WHERE FECHA = $fecha_actual");

	if ($consulta->num_rows() > 0)  return $consulta->row();
	else  return 1;
}

require 'connect_db.php';

$nombre = $_REQUEST['nombre'];
$cuit = $_REQUEST['cuit'];
$cantida = $_REQUEST['cantida'];
$tipo = $_REQUEST['tipo'];
$estado = $_REQUEST['estado'];

if (isset( $_REQUEST["id"])){
	$id = $_REQUEST["id"];

	//$consulta = "UPDATE turnos SET entregado='$fecha' WHERE id=$id_marca";

} else {

	$fecha = date("d-m-Y");


	$consulta = "INSERT INTO liquidacion (nombre,cuit,cantida,tipo,estado,fecha) VALUES ('$nombre',$cuit,$cantida,$tipo,$estado,'$fecha')";
}


require 'mensaje.php';
mensaje_actualizacion($marcado = $mysqli->query("$consulta"));
$mysqli->close();

