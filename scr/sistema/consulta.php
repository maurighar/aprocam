<?php
	$titulo_pagina = 'RUTA - Consulta';
	require 'header.php';
?>

	<?php require 'consulta_actualiza.php'; ?>

	<h1>Consulta de tramites ruta</h1>

<?php
	$tipo_val = $_REQUEST["Tipo"] ;
	if ($tipo_val == 6){
		require 'rechazo/encabezado_rechazos.php';
	}

	$valor = $_REQUEST["valorconsulta"] ;
	$tipo = $_REQUEST["Tipo"] ;


	//echo "Valor consultado: (" . $valor . ")</br>";

	require 'connect_db.php';


	/*
		Aca selecciono que archivo de consulta se carga
	 */

	switch ($tipo) {
		case 1 :
			require 'consulta_razon.php';
			break;

		case 2 :
			require 'consulta_cuit.php';
			break;

		default:
			require 'consulta_gral.php';
			break;
	}


?>







<div class="noprint">
	<a href="../index.php">Volver a Home</a>
</div>

<div class="imprimir">
	<br><br><br>
	<p class="firma">
		Firma,   aclaración y   DNI
	</p>
</div>

<?php require 'footer.php'; ?>