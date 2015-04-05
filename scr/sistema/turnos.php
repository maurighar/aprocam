<?php
	$titulo_pagina = 'RUTA - Turnos';
	require 'header.php';
	$op = $_REQUEST["op"];
?>

<h1>Turnos para tramites RUTA</h1>

	<fieldset >
		<a class="enlace_boton" href="turnos_nuevo.php?estado=nuevo&estado='pen'">Nuevo</a>
		<a class="enlace_boton" href="turnos_anteriores.php">Turnos Anteriores</a>
	</fieldset>

<?php
	switch ($op) {
		case 'consulta' :
			require 'turnos_consulta.php';
			break;

		case 'edit' :
			require 'turnos_edit.php';
			break;

	}
?>


<?php require 'footer.php'; ?>