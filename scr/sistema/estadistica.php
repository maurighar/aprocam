<?php
	$titulo_pagina = 'Sistema RUTA';
	require 'header.php';
?>
<script src="/js/jquery-2.1.1.min.js"></script>
<script src="/js/highcharts.js"></script>

<?php
//
//
	require 'connect_db.php';
	//$consulta = "SELECT lote,tipo,sum(1) FROM aprocam.control WHERE tipo != '' and expediente > 199999 and lote > 700 GROUP BY lote,tipo ORDER BY lote,tipo";
	$consulta = 'SELECT week(fecha,1),year(fecha),tipo, SUM(1) FROM aprocam.control WHERE tipo != '' AND expediente > 199999 and year(fecha)>2010 GROUP BY year(fecha),week(fecha,1),lote,tipo ORDER BY year(fecha),week(fecha,1),lote,tipo'
	$resultado = $mysqli->query("$consulta");

	while ($linea = $resultado->fetch_object()) {



		// Debo completar todos los items para el grafico




	}
?>



<div id="grafico_barras" style="width:100%; height:400px;"></div>
<script>
	$(function () {
	$('#grafico_barras').highcharts({
		chart: {
			type: 'line'
		},
		title: {
			text: 'Tramites'
		},
		xAxis: {
			categories: ['842','843','844','845', '846']
		},
		yAxis: {
			title: {
				text: 'Cantidad'
			}
		},
		series: [{
			name: 'Empresa',
			data: [4,3,4,5,6]
		}, {
			name: 'Altas',
			data: [35,44,27,45,49]
		}, {
			name: 'Bajas',
			data: [20,20,10,21,23]
		}, {
			name: 'Reimpresiones',
			data: [2,1,0,4,1]
		}, {
			name: 'Modificaciones',
			data: [4,2,2,0,1]
		}, {
			name: 'Revalidas',
			data: [276,168,160,223,205]
		}]
	});
})
</script>

<?php require 'footer.php'; ?>