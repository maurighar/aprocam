<?php
	$titulo_pagina = 'Sistema RUTA';
	require 'header.php';
?>
<script src="/js/jquery-2.1.1.min.js"></script>
<script src="/js/highcharts.js"></script>

<?php
	require 'connect_db.php';
	$consulta = "SELECT week(fecha,1) as semana,year(fecha) as ano,tipo, SUM(1) as cantidad FROM aprocam.control WHERE tipo != '' AND expediente > 199999 and year(fecha)>2010 GROUP BY year(fecha),week(fecha,1),tipo ORDER BY year(fecha),week(fecha,1),tipo";
	$resultado = $mysqli->query("$consulta");

	$datos = [
		'semana' => '',
		'empresa' => '',
		'alta' => '',
		'baja' => '',
		'modif' => '',
		'reimpre' => '',
		'revalida' => '',
		'anulado' => ''];


	$semana = 0;
	$primer_registro = true;

	while ($linea = $resultado->fetch_object()) {
		if ($primer_registro){
			$primer_registro = false;
			$semana = $linea->semana;
			$tempo = ['semana' => $linea->semana . '/' . $linea->ano,
				'empresa' => '0',
				'alta' => '0',
				'baja' => '0',
				'modif' => '0',
				'reimpre' => '0',
				'revalida' => '0',
				'anulado' => '0'];
		}

		if ($semana != $linea->semana) {
			$datos['semana'] .=  "'" . $tempo['semana'] . "',";
			$datos['alta'] .= $tempo['alta'] . ",";
			$datos['empresa'] .= $tempo['empresa'] . ",";
			$datos['baja'] .= $tempo['baja'] . ",";
			$datos['modif'] .= $tempo['modif'] . ",";
			$datos['reimpre'] .= $tempo['reimpre'] . ",";
			$datos['revalida'] .= $tempo['revalida'] . ",";

			$semana = $linea->semana;
			$tempo = [
				'semana' => $linea->semana . '/' . $linea->ano,
				'empresa' => '0',
				'alta' => '0',
				'baja' => '0',
				'modif' => '0',
				'reimpre' => '0',
				'revalida' => '0',
				'anulado' => '0'];
		}


		switch ($linea->tipo) {
			case 'ALTA' :
				$tempo['alta'] = $linea->cantidad;
				break;
			case 'EMPRESA' :
				$tempo['empresa'] = $linea->cantidad;
				break;
			case 'BAJA' :
				$tempo['baja'] = $linea->cantidad;
				break;
			case 'MODIF' :
				$tempo['modif'] = $linea->cantidad;
				break;
			case 'REIMPRE.' :
				$tempo['reimpre'] = $linea->cantidad;
				break;
			case 'REVALIDA' :
				$tempo['revalida'] = $linea->cantidad;
				break;
		}
	}
?>



<div id="grafico_barras" style="width:100%; height:600px;"></div>
<script>
	$(function () {
	$('#grafico_barras').highcharts({
		chart: {
			type: 'spline'
		},
		title: {
			text: 'Tramites'
		},
		xAxis: {
			categories: [ <?php echo $datos['semana']; ?>]
		},
		yAxis: {
			title: {
				text: 'Cantidad'
			}
		},
		series: [{
			name: 'Empresa',
			data: [<?php echo $datos['empresa']; ?>]
		}, {
			name: 'Altas',
			data: [<?php echo $datos['alta']; ?>]
		}, {
			name: 'Bajas',
			data: [<?php echo $datos['baja']; ?>]
		}, {
			name: 'Reimpresiones',
			data: [<?php echo $datos['reimpre']; ?>]
		}, {
			name: 'Modificaciones',
			data: [<?php echo $datos['modif']; ?>]
		}, {
			name: 'Revalidas',
			data: [<?php echo $datos['revalida']; ?>]
		}]
	});
})
</script>

<?php require 'footer.php'; ?>