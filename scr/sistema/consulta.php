<?php
	$valor = $_REQUEST["valorconsulta"] ;
	$tipo = $_REQUEST["Tipo"] ;

	switch ($tipo) {
		case 1 :
			header("Location: consulta_razon.php?valorconsulta=$valor&Tipo=$tipo");
			break;

		default:
			header("Location: consulta_gral.php?valorconsulta=$valor&Tipo=$tipo");
			break;
	}
?>