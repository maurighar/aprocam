<?php 
	$valor_id = $_GET["id"] ;
	$cuit = $_GET["cuit"] ;


	require '../sistema/connect_db.php';

	$resultado = $mysqli->query("DELETE FROM unidades WHERE id = $valor_id");

	header("Location: empresa.php?cuit=$cuit");
?>