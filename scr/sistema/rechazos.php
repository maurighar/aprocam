<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="icon" type="image/ico" href="../favicon.ico">
		<title>RUTA - Rechazo</title>
		<link rel="stylesheet" href="../css/normalize.css" />
		<link rel="stylesheet" href="../css/main.css" />
		<style type="text/css">
			thead .col0 {width: 70px;}
			thead .col1 {width: 40px;}
			thead .col2 {width: 60px;}
			thead .col3 {width: 10px;}
			thead .col4 {width: 60px;}
			thead .col5 {width: 300px;}
			thead .col6 {width: 70px;}
			thead .col7 {width: 150px;}
			thead .col8 {width: 60px;}
			thead .col9 {width: 77px;}
			thead .col10 {width: 105px;}
			thead .col11 {width: 56px;}
			thead .col12 {width: 60px;}
			thead .col13 {width: 60px; }
			.celda_verde { background: green;}
			
			.al_derecha {
				text-align: right;
			}
		</style>
	</head>
	
	<body>
		<?php
			function color_envio($estado) {
				if ($estado > 0) {
					return 'class="celda_verde"' ;
				}
			}

			function enlace_ID($nro_fecha,$nro_id) {
				if ($nro_fecha > 0) {
					echo $nro_fecha;
				} else {
					echo '<a href="rechazos.php?id='. $nro_id . '">Marcar</a>';
				}
			}

			require 'rechazos_actualiza.php';
			
			require '../encabezado.php';
			require 'encabezado_rechazos.php';
		?>

		<table>
			<thead>
				<tr>
					<th class="col0">estado</th>
					<th class="col1">centro</th>
					<th class="col2">Exped.</th>
					<th class="col3">tipo</th>
					<th class="col4">procesado</th>
					<th class="col5">obs</th>
					<th class="col6">cuit</th>
					<th class="col7">razon</th>
					<th class="col8">fecha</th>
					<th class="col12">planilla</th>
					<th class="col13">envio</th>
				</tr>
			</thead>
			<tbody  class="consulta_tabla">
			
				<?php
					require 'connect_db.php';
					$resultado = $mysqli->query("SELECT * FROM aprocam.rechazos");
					while ($fila = $resultado->fetch_assoc()) {
				?>
				
					<tr class="consulta_tabla">
						<td class="col0"><?php echo $fila['estado']; ?></td>
						<td class="al_derecha"><?php echo $fila['centro']; ?></td>
						<td class="al_derecha">
							<a href="consulta.php?Tipo=4&valorconsulta=<?php echo $fila['expediente']; ?>"><?php echo $fila['expediente']; ?></a>
						</td>
						<td class="col3"><?php echo $fila['tipo']; ?></td>
						<td class="col4"><?php echo $fila['procesado']; ?></td>
						<td class="col5"><?php echo $fila['obs']; ?></td>
						<td class="al_derecha"><?php echo $fila['cuit']; ?></td>
						<td class="col7"><?php echo $fila['razon']; ?></td>
						<td class="col8"><?php echo $fila['fecha']; ?></td>
						<td class="col12"><?php echo $fila['planilla']; ?></td>
						<td <?php echo color_envio($fila['envio']); ?>><?php enlace_ID($fila['envio'],$fila['id']); ?></td>
					</tr>

				<?php
					}
					$mysqli->close();
				?>
			</tbody>	
			<tfoot>
				<td align=right colspan="11" rowspan="1">
					Desarrollado por Mauricio A. Ghilardi
				</td>
			</tfoot>
	</table>

	<?php require 'footer.php'; ?>
	</body>
</html>