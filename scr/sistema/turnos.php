<?php
$titulo_pagina = 'RUTA - Turnos';
require 'header.php';?>

<h1>Turnos para tramites RUTA</h1>


	<fieldset >
		<a  class="enlace_boton" href="turnos_nuevo.php?estado=nuevo">Nuevo</a>
		<a  class="enlace_boton" href="turnos_anteriores.php">Turnos Anteriores</a>
	</fieldset>

<?php
	require 'connect_db.php';
	$resultado = $mysqli->query("SELECT * FROM liquidacion ORDER BY liquidacion DESC LIMIT 10" );
?>

<table id="consulta_turnos">
	<thead>
		<tr>
			<th>Liquidación</th>
			<th>Fecha</th>
			<th>..</th>
			<th>..</th>
		</tr>
	</thead>
	<tbody>
		<?php while ($linea = $resultado->fetch_object()) { ?>
		<tr>
			<td> <?php echo $linea->liquidacion ?> </td>
			<td> <?php echo $linea->fecha ?> </td>
			<td> <a href="liquida_control.php?lote=<?php echo $linea->liquidacion ; ?>">Consultar</a> </td>
			<td> <a href="liquida_imprime.php?lote=<?php echo $linea->liquidacion ; ?>&sinordenar=NO">Ver</a> </td>
		</tr>
		<?php } ?>
	</tbody>
	<tfoot>
		<td align=right colspan="5" rowspan="1">
		Desarrollado por Mauricio A. Ghilardi
		</td>
	</tfoot>
</table>




<?php require 'footer.php'; ?>