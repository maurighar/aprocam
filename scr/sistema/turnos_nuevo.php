<?php

function trae_valor($valor,$estado){ if ($estado) echo 'value="'.$valor.'"'; }

$estado_carga = ($_REQUEST["estado"] === 'editar');

$titulo_pagina = 'RUTA - Turnos Nuevo';
require 'header.php';?>

<h1>Turnos para tramites RUTA<br>
Nuevo</h1>


<form method="post" action="turnos_carga.php" enctype="application/x-www-form-urlencoded">
	<fieldset>
		<legend>Carga de datos</legend>
			<div class="flota">
				<label>Razón social:</label>
				<input type="text" name="nombre" size="55" required />
			</div>

			<div class="flota">
				<label>CUIT:</label>
				<input type="text" name="cuit" />
			</div>

			<div class="clear flota">
				<label>Cantidad:</label>
				<input type="text" name="cantidad" />
			</div>

			<div class="flota">
				<label>Tipo de tramite:</label>
				<select name="tipo" id="tipo" />
					<?php select_turno(''); ?>
				</select>
			</div>


			<div class="clear">
				<input type="hidden" name="estado" value="<?php echo $_REQUEST["estado"];?>" />
				<input type="hidden" name="id" value="<?php //echo $fila['id'];?>" />
				<input type="submit" name="submit" value="Cargar" />
			</div>


	</fieldset>
</form>






<?php require 'footer.php'; ?>