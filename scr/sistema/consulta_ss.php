<?php require 'header.php'; ?>

		<title>Consulta Sin Sistema</title>

		<style type="text/css">
		  thead .col0 {width: 50px;}
		  .col0 {text-align: right;}
		  thead .col1 {width: 175px;}
		  thead .col2 {width: 70px;}
		  .col2 {text-align: right;}
		  thead .col3 {width: 50px;}
		  thead .col4 {width: 98px;}
		  thead .col5 {width: 80px;}
		  thead .col6 {width: 40px;}
		  .col6 {text-align: right;}
		  thead .col7 {width: 150px;}
		  thead .col8 {width: 60px;}
		  thead .col9 {width: 20px;}
		</style>

	</head>
	<body>
		<?php require 'encabezado.php'; ?>
		<table caption="control (11 rows)">
		  <thead>
			<tr>
			  <th class="col0">Exped.</th>
			  <th class="col1">nombre</th>
			  <th class="col2">CUIT</th>
			  <th class="col3">dominio</th>
			  <th class="col4">tipo</th>
			  <th class="col5">fecha</th>
			  <th class="col6">lote</th>
			  <th class="col7">rechazo</th>
			  <th class="col8">certificado</th>
			  <th class="col9">Entr.</th>
			</tr>
		  </thead>
		  <tbody>
			<tr>

			<?php
			$valor = $_GET["valorconsulta"] ;
			$tipo = $_GET["Tipo"] ;
			echo "Valor consultado: (" . $valor . ")</br>";

			require 'connect_db.php';
			echo $mysqli->host_info . "\n" . "</br>";

			switch ($tipo) {
			  case 1 :
				 $resultado = $mysqli->query("SELECT * FROM aprocam.sin_sistema WHERE sin_sistema.nombre like '%" . $valor . "%'");
				 break;
			  case 2 :
				 $resultado = $mysqli->query("SELECT * FROM aprocam.sin_sistema WHERE sin_sistema.dominio =  '" . $valor . "'");
				 break;
			  case 3 :
				 $resultado = $mysqli->query("SELECT * FROM aprocam.sin_sistema WHERE sin_sistema.expediente = " . $valor );
				 break;
			}

			for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
				$fila = $resultado->fetch_assoc();
				echo '<tr>' ;
				echo '<td class="col0">' . $fila['expediente'] . '</td>';
				echo '<td class="col1">' . $fila['nombre'] . '</td>';
				echo '<td class="col2">' . $fila['cuit'] . '</td>';
				echo '<td class="col3">' . $fila['dominio'] . '</td>';
				echo '<td class="col4">' . $fila['tipo'] . '</td>';
				echo '<td class="col5">' . $fila['fecha'] . '</td>';
				echo '<td class="col6">' . $fila['lote'] . '</td>';
				# resalta los rechazos
				if (empty($fila['rechazo'])) {
					echo '<td class="col7">'. $fila['rechazo'] . '</td>';
				} else {
				   echo '<td class="cellred" bgcolor="red">'. $fila['rechazo'] . '</td>';
				}
				# resalta los certificados que llegaron
				if ($fila['certificado']>0) {
					echo '<td bgcolor="green">' . $fila['certificado'] . '</td>';
				} else {
					echo '<td class="col8">' . $fila['certificado'] . '</td>';
				}
				# resalta los certificados entregados
				if (empty($fila['entregado'])) {
					echo '<td class="col9">' . $fila['entregado'] . '</td>';
				} else {
					echo '<td bgcolor="green">' . $fila['entregado'] . '</td>';
				}


				echo '</tr>' ;
				}

			?>
			<td  align=right colspan="12" rowspan="1">
			Desarrollado por Mauricio A. Ghilardi
			</td>
		</tbody>
	</table>
	</body>
</html>
