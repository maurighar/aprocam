<?php
$titulo_pagina = 'RUTA - Liquidación';
require 'header.php'; ?>
<?php
	require 'mensaje.php';

	if (isset( $_GET["mensaje"])){
		mensaje_actualizacion($_GET["mensaje"]>0);
	}
?>

<section>


<form method="post" action="liquida_cabecera_carga.php" enctype="application/x-www-form-urlencoded">
	<fieldset>
		<legend>Liquidación</legend>

		<div class="flota">
			<label for="liquidacion">Nº de liquidación: </label>
			<input type="text" id="liquidacion" name="liquidacion_txt" placeholder="Número de liquidación" title="Número de liquidación" required />
		</div>

		<div class="flota">
			<label for="alta">Lote altas: </label>
			<input type="text" id="alta" name="alta_txt" placeholder="Número de lote altas" title="Número de lote altas" required />
		</div>

		<div class="clear flota">
			<label for="revalidas">Lote revalidas: </label>
			<input type="text" id="revalidas" name="revalidas_txt" placeholder="Número de lote revalidas" title="Número de lote revalidas" required />
		</div>

		<div class="flota">
			<label for="fecha_cierre">Fecha de cierre: </label>
			<input type="text" id="fecha_cierre" name="fecha_txt" placeholder="Fecha de cierre" title="Fecha de cierre" required />
			<input type="button" name="boton" onclick="carga_fecha( );" value="Hoy">
			<script>
				function carga_fecha( ) {
					document.getElementById("fecha_cierre").value = moment().format("YYYY-MM-DD");
				}
			</script>
		</div>

		<div class="clear"><input type="submit" id="envia-alta" name="enviar_btn" value=" Agregar " /></div>
	</fieldset>
</form>


</section>

<?php require 'footer.php'; ?>
