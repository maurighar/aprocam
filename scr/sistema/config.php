<?php
	$titulo_pagina = 'RUTA - Configuración';
	require 'header.php';
?>

<section>
	<fieldset>
		<legend>Importación</legend>
		<p>
			Antes de importar se debe generar el archivo <a href="importar.csv" target="_blank">importar.csv</a>. <br>
			<a href="csv_to_table.php" class="enlace_boton">Ver</a>
			<a href="importar_control.php" class="enlace_boton" target="_blank">Importar Control</a>
		</p>
	</fieldset>

	<fieldset>
		<legend>Validar CUIT</legend>
		<p>
			Valida los números de CUIT de la base de datos.<br>
			<a href="config_valida_cuit.php" class="enlace_boton" target="_blank">Validar</a>
		</p>
	</fieldset>

	<fieldset>
		<legend>Estadisicas</legend>
		<p>
			Graficos de estadisticas.<br>
			<a href="estadistica.php" class="enlace_boton">Calcular</a>
		</p>
	</fieldset>



	<fieldset>
		<legend>Importación Rechazos</legend>
		<p>
			Antes de importar se debe generar el archivo <a href="rechazo.csv" target="_blank">rechazo.csv</a>. <br>
			<a href="importar_rechazo.php" class="enlace_boton" target="_blank">Importar Rechazo</a>
		</p>
	</fieldset>

</section>




<?php require 'footer.php'; ?>