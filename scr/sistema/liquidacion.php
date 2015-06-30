<?php
$titulo_pagina = 'RUTA - Liquidación';
require 'header.php';

$lote_txt = '';
$total_txt = '';
$revalida_txt = '';
$alta_txt = '';
$baja_txt = '';
$empresa_txt = '';
$reimpre_txt = '';
$modif_txt = '';

?>

<section>
	<fieldset >
		<legend>Opciones liquidación</legend>
		<a class="enlace_boton" href="liquida_cabecera.php">Cargar</a>
		<a class="enlace_boton" href="liquidacion_listado.php">Listado</a>
	</fieldset>

	<div class="divisor">
		<?php
		require 'connect_db.php';
		$resultado = $mysqli->query("SELECT * FROM liquidacion ORDER BY liquidacion DESC LIMIT 10" );
		?>

		<table id="consulta_liquidacion">
			<thead>
				<tr>
					<th data-column-id="liquid" data-type="numeric">Liquidación</th>
					<th data-column-id="fecha">Fecha</th>
					<th data-column-id="totales">Total</th>
					<th>..</th>
					<th>..</th>
				</tr>
			</thead>
			<tbody>
			<?php
				while ($linea = $resultado->fetch_assoc()) {
					$totales = $linea['cant_empresa']+$linea['cant_empresa']+$linea['cant_alta']+$linea['cant_baja']+$linea['cant_reimp']+$linea['cant_modif']+$linea['cant_reval'];
					$lote_txt .= "'". $linea['liquidacion'] . "',";
					$total_txt .= $totales . ",";
					$revalida_txt .= $linea['cant_reval'] . ",";
					$alta_txt .= $linea['cant_alta'] . ",";
					$baja_txt .= $linea['cant_baja'] . ",";
					$empresa_txt .= $linea['cant_empresa'] . ",";
					$reimpre_txt .= $linea['cant_reimp'] . ",";
					$modif_txt .= $linea['cant_modif'] . ",";
			?>

				<tr>
					<td> <?= $linea['liquidacion'] ?> </td>
					<td> <?= $linea['fecha'] ?> </td>
					<td> <?= $totales ?> </td>
					<td> <a href="liquida_control.php?lote=<?= $linea['liquidacion'] ; ?>">Procesar</a> </td>
					<td> <a href="liquida_imprime_rptc.php?lote=<?= $linea['liquidacion'] ; ?>&sinordenar=NO">Listado</a> </td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<td align=right colspan="5" rowspan="1">
				Desarrollado por Mauricio A. Ghilardi
				</td>
			</tfoot>
		</table>
	</div>


	<div id="grafico_barras" style="margin: 1em auto; width:95%; height:400px;"></div>


	<fieldset>
		<legend>Controlar liquidación</legend>
		<form method="get" action="liquida_control.php" enctype="application/x-www-form-urlencoded">
			<label>Liquidación:</label>
			<input type="text" name="lote" placeholder="Ingrese el Nº de lote" required/>

			<input type="submit" name="submit" value="Buscar" /></a>
		</form>
	</fieldset>
</section>

<script src="../js/jquery-2.1.0.min.js"></script>
<script src="../js/highcharts.js"></script>
<script src="../js/jquery.bootgrid.min.js"></script>

<script>
$(function () {
	//$("#consulta_liquidacion").bootgrid();

	$('#grafico_barras').highcharts({
		chart: {
			type: 'line'
		},
		title: {
			text: 'Liquidaciones'
		},
		xAxis: {
			categories: [<?= $lote_txt;  ?>]
		},
		yAxis: {
			title: {
				text: 'Cantidad'
			},
			min: 0
		},
		series: [{
			name: 'Emresas',
			data: [<?= $empresa_txt;  ?>]
		}, {
			name: 'Altas',
			data: [<?= $alta_txt;  ?>]
		}, {
			name: 'Bajas',
			data: [<?= $baja_txt;  ?>]
		},{
			name: 'Reimpre.',
			data: [<?= $reimpre_txt;  ?>]
		},{
			name: 'Modif.',
			data: [<?= $modif_txt;  ?>]
		}, {
			name: 'Revalidas',
			data: [<?= $revalida_txt;  ?>]
		},
		{
			name: 'Tramites',
			data: [<?= $total_txt;  ?>]
		}]
	});
})
</script>

<?php require 'footer.php'; ?>

