<?php require 'header.php'; ?>

		<title>RUTA - Consulta</title>
		<style type="text/css">
			thead tr {background-color: ActiveCaption; color: CaptionText;}
			th, td {vertical-align: top; font-family: "Tahoma"; font-size: 8pt; padding: 3px; }
			tr:nth-child(2n+1)  { background: #E0E0E0; }
			tr:nth-child(2n+0)  { background: #FFFFFF; }
			table, td {border: 1px solid silver;}
			table {border-collapse: collapse;}
			thead .col0 {width: 50px;}
			.col0 {text-align: right;}
			thead .col1 {width: 230px;}
			thead .col2 {width: 70px;}
			.col2 {text-align: right;}
			thead .col3 {width: 50px;}
			thead .col4 {width: 84px;}
			thead .col5 {width: 60px;}
			thead .col6 {width: 40px;}
			.col6 {text-align: right;}
			thead .col7 {width: 77px;}
			.col7 {text-align: right;}
			thead .col8 {width: 60px;}
			thead .col9 {width: 60px;}
			thead .col10 {width: 50px;}
			thead .col11 {width: 60px;}
			thead .col12 {width: 45px;}
			thead .col13 {width: 45px;}
			.tdrojo {background-color: "red";}
			tr:nth-child(2n+1)  {
				background: #ddd;
			}
			tr:nth-child(2n+0)  {
				background: #fff;
			}
			tbody tr:hover {
				background: #BDC3C7;
			}
		</style>

	</head>
	<body>
		<?php require 'certificados_actualiza.php'; ?>
		<?php
			require 'encabezado.php';

			function color_tipo($tramite) {
				switch ($tramite) {
					case 'ALTA' :
						return "CCFF99" ;
						break;
					case 'EMPRESA' :
						return "CCFF99" ;
						break;
					case 'BAJA' :
						return "FF9900" ;
						break;
					case 'REVALIDA' :
						return "FFFF99" ;
						break;
				}
			}

			require 'connect_db.php';
			$resultado = $mysqli->query('SELECT * FROM aprocam.control WHERE control.entregado = "" AND control.certificado = 0 AND expediente > 199999 AND (tipo = "ALTA.S" OR tipo = "ALTA" OR tipo = "EMPRESA" )');
		?>

		<table caption="control (11 rows)">
			<thead>
				<tr>
					<th class="col0">exped.</th>
					<th class="col1">nombre</th>
					<th class="col2">cuit</th>
					<th class="col3">dominio</th>
					<th class="col4">tipo</th>
					<th class="col5">fecha</th>
					<th class="col6">lote</th>
					<th class="col8">certificado</th>
				</tr>
			</thead>
		<tbody>
			<?php
				for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
					$fila = $resultado->fetch_assoc();
			?>
			<tr>
				<td class="col0">
					<?php echo $fila['expediente']?>
				</td>

				<td class="col1">
					<?php echo $fila['nombre']?>
				</td>

				<td class="col2">
					<?php echo $fila['cuit']?>
				</td>

				<td class="col3">
					<?php echo $fila['dominio']?>
				</td>

				<td class="col4" bgcolor=<?php echo color_tipo($fila['tipo'])?>>
					<?php echo $fila['tipo']?>
				</td>

				<td class="col5">
					<?php echo $fila['fecha']?>
				</td>

				<td class="col6">
					<?php echo $fila['lote']?>
				</td>

				<td class="col8">
					<?php echo "<a href=\"?id=" . $fila['id'] . "\">Marcar</a>"; ;?>
				</td>
			</tr>
		<?php } ?>

		<tfoot>
			<td align=right colspan="8" rowspan="1">
			Desarrollado por Mauricio A. Ghilardi
			</td>
		</tfoot>
	</table>
	<a href="../index.php">
		Volver a Home
	</a>
	<?php require 'footer.php'; ?>
	</body>
</html>