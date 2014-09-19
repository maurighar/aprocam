<?php require 'header.php'; ?>

		<title>Consulta</title>

		<style type="text/css">
			thead .col0 {width: 50px;}
			.col0 {text-align: right;}
			thead .col1 {width: 50px;}
			.col1 {text-align: right;}
			thead .col2 {width: 230px;}
			thead .col3 {width: 70px;}
			.col3 {text-align: right;}
			thead .col4 {width: 77px;}
			thead .col5 {width: 80px;}
			thead .col6 {width: 20px;}
			thead .col7 {width: 20px;}
			.col7 {text-align: right;}
			thead .col8 {width: 20px;}
			thead .col9 {width: 80px;}
			thead .col10 {width: 110px;}
			thead .col11 {width: 30px;}
			thead .col12 {width: 40px;}
			.col12 {text-align: right;}
			thead .col13 {width: 50px;}
			.col13 {text-align: right;}
		</style>
	</head>
	<body>
		<?php require 'encabezado.php'; ?>
		<table caption="control (11 rows)">
				<thead>
					<tr>
						<th class="col0">Centro</th>
						<th class="col1">Exped.</th>
						<th class="col2">Nombre</th>
						<th class="col3">CUIT</th>
						<th class="col4">dominio</th>
						<th class="col5">Fecha</th>
						<th class="col6">Tarj</th>
						<th class="col7">Lote</th>
						<th class="col8">entrega</th>
						<th class="col9">F. Entr</th>
						<th class="col10">Tarjeta</th>
						<th class="col11">Tipo</th>
						<th class="col12">Recibo</th>
						<th class="col13">Nro.</th>
					</tr>
				</thead>
			<tbody>
			<tr>

			<?php
			$valor = $_GET["valorconsulta"] ;
			$tipo = $_GET["Tipo"] ;
			echo "Valor consultado: (" . $valor . ")</br>";

			#consulto el archivo ini de la configuración
			require 'connect_db.php';
			echo $mysqli->host_info . "\n" . "</br>";

			switch ($tipo) {
			  case 1 :
				 $resultado = $mysqli->query("SELECT * FROM aprocam.ruta WHERE ruta.nombre like '%" . $valor . "%'");
				 break;
			  case 2 :
				 $resultado = $mysqli->query("SELECT * FROM aprocam.ruta WHERE ruta.cuit = " . $valor );
				 break;
			  case 3 :
				 $resultado = $mysqli->query("SELECT * FROM aprocam.ruta WHERE ruta.dominio =  '" . $valor . "'");
				 break;
			  case 4 :
				 $resultado = $mysqli->query("SELECT * FROM aprocam.ruta WHERE ruta.expediente = " . $valor );
				 break;
			}

			for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
				$fila = $resultado->fetch_assoc();
				echo '<tr>' ;
				echo '<td class="col0">' . $fila['centro'] . '</td>';
				echo '<td class="col1">' . $fila['expediente'] . '</td>';
				echo '<td class="col2">' . $fila['nombre'] . '</td>';
				echo '<td class="col3">' . $fila['cuit'] . '</td>';
				echo '<td class="col4">' . $fila['dominio'] . '</td>';
				echo '<td class="col5">' . $fila['fecha'] . '</td>';
				echo '<td class="col6">' . $fila['tarj'] . '</td>';
				echo '<td class="col7">' . $fila['lote'] . '</td>';
				echo '<td class="col8">' . $fila['entrega'] . '</td>';
				echo '<td class="col9">' . $fila['fecha_entr'] . '</td>';
				echo '<td class="col10">'. $fila['nrotarjeta'] . '</td>';
				echo '<td class="col11">'. $fila['tipo'] . '</td>';
				echo '<td class="col12">'. $fila['recibo'] . '</td>';
				echo '<td class="col13">'. $fila['nro_recibo'] . '</td>';
				echo '</tr>' ;
				}

			?>
			<tfoot>
			<td  align=right colspan="14" rowspan="1">
			Desarrollado por Mauricio A. Ghilardi
			</td>
			</tfoot>
			</tbody>
		</table>
	</body>
</html>
