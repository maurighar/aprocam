<?php
$titulo_pagina = 'RUTA - Liquidación Listado';
require 'header.php'; ?>


<section>

	<div class="divisor">
		<?php
			require 'connect_db.php';
			$resultado = $mysqli->query("SELECT * FROM liquidacion ORDER BY liquidacion DESC" );
		?>

		<table id="consulta_liquidacion">
			<thead>
				<tr>
					<th>Liquidación</th>
					<th>Fecha</th>
					<th>Empresa</th>
					<th>Altas</th>
					<th>Bajas</th>
					<th>Reimpre.</th>
					<th>Modif.</th>
					<th>Revalidas</th>
					<th>..</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($linea = $resultado->fetch_object()) { ?>
				<tr>
					<td> <?= $linea->liquidacion ?> </td>
					<td> <?= $linea->fecha ?> </td>
					<td> <?= $linea->cant_empresa ?> </td>
					<td> <?= $linea->cant_alta ?> </td>
					<td> <?= $linea->cant_baja ?> </td>
					<td> <?= $linea->cant_reimp ?> </td>
					<td> <?= $linea->cant_modif ?> </td>
					<td> <?= $linea->cant_reval ?> </td>
					<td> <a href="liquida_control.php?lote=<?= $linea->liquidacion ; ?>">Procesar</a> </td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<td align=right colspan="10" rowspan="1">
				Desarrollado por Mauricio A. Ghilardi
				</td>
			</tfoot>
		</table>
	</div>

</section>

<?php require 'footer.php'; ?>