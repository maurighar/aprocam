<?php
require 'connect_db.php';

$_selec = 'SELECT max(expediente) as exped FROM aprocam.tempo_control ORDER BY expediente';
$resultado = $mysqli->query("$_selec");

$linea = $resultado->fetch_object();

for ($i = ($linea->exped+1); $i <= ($linea->exped+100); $i++) {
    $actualizar = "INSERT INTO tempo_control (expediente) VALUES ($i)";

    $mensaje = $mysqli->query("$actualizar");
}

?>
