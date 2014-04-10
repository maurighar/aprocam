<?php 
	$valor_id = $_GET["cuit"] ;

	require '../sistema/connect_db.php';

	$resultado = $mysqli->query("DELETE FROM empresas WHERE cuit = $valor_id");

	header("Location: ../index.php");
?>