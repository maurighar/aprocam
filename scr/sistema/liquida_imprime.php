<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<link rel="icon" image="type/ico" href="../favicon.ico" />
		<title>RUTA - Consulta</title>
		<link rel="stylesheet" href="../css/normalize.css" />	
		<link rel="stylesheet" href="../css/main.css" />
		<link rel="stylesheet" media="print" href="../css/imprimir.css" />

		<style type="text/css">
			body {
				background: #FFF;
			}
			table, td,tr {
				border: 0 solid white;
				background: #FFF;
			}
			.al_derecha {
				text-align: right;
			}
		</style>
		
	</head>
	<body>

		<?php
			$valor = $_GET["lote"] ;
			require 'connect_db.php';
			$resultado = $mysqli->query("SELECT *, IF(tipo = 'EMPRESA','ALTA',tipo) as tipo2 FROM aprocam.control WHERE control.lote = $valor ORDER BY tipo2, expediente" );
		?>

		<table>
		<tbody>
			<?php
				while ($fila = $resultado->fetch_assoc()) {
					echo '<tr>';
					echo '<td class="al_derecha">' . $fila['expediente']. '</td>';
					echo '<td class="col1">' . $fila['nombre'] . '</td>';
					echo '<td class="col2">' . $fila['cuit'] . '</td>';
					echo '<td class="col3">' . $fila['dominio'] . '</td>';
					echo '<td class="col4">' . $fila['tipo'] . '</td>';
					echo '<td class="fechas">' . $fila['fecha'] . '</td>';
					echo '<td class="al_derecha">' . $fila['lote'] . '</td>';
					echo '<td class="al_derecha">' . $fila['lote'] . '</td>';
					echo '</tr>';
				} 
			$mysqli->close();
			?>

		</tbody>
	</table>

	</body>
</html>
