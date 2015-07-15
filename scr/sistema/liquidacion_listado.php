<?php
$titulo_pagina = 'RUTA - Liquidación Listado';
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

	<div id="grafico_barras" style="margin: 1em auto; width:95%; height:400px;"></div>


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
					<th>Totales</th>
					<th>..</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($linea = $resultado->fetch_assoc()) {
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
					<td> <?= $linea['cant_empresa'] ?> </td>
					<td> <?= $linea['cant_alta'] ?> </td>
					<td> <?= $linea['cant_baja'] ?> </td>
					<td> <?= $linea['cant_reimp'] ?> </td>
					<td> <?= $linea['cant_modif'] ?> </td>
					<td> <?= $linea['cant_reval'] ?> </td>
					<td> <?= $totales ?> </td>
					<td> <a href="liquida_control.php?lote=<?= $linea['liquidacion'] ; ?>">Procesar</a> </td>
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


<script src="../js/jquery-2.1.0.min.js"></script>
<script src="../js/highcharts.js"></script>

<script>
$(function () {


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
			name: 'Empresas',
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