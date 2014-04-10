<?php
	function imprime_suma($legajos) {
		echo '<tr>';
		echo '<td class="al_derecha"></td>';
		echo '<td class="col1"></td>';
		echo '<td class="col3"></td>';
		echo '<td class="col4"></td>';
		echo '<td class="fechas"></td>';
		echo '<td class="al_derecha">L:' . $legajos . '</td>';
		echo '<td class="al_derecha">$ ' . $legajos*80 . ',00</td>';
		echo '</tr>';
	}
?>


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
			$empresa = 0;
			$alta = 0;
			$baja = 0;
			$modif = 0;
			$reimpre = 0;
			$revalida = 0;
			$contador = 0;
			$exped_anterior = 0;
			$valor_tramite=80;


			$valor = $_GET["lote"] ;
			require 'connect_db.php';
			$resultado = $mysqli->query("SELECT *, IF(tipo = 'EMPRESA','ALTA',tipo) as tipo2 FROM aprocam.control WHERE control.lote = $valor ORDER BY tipo2, expediente" );
		?>

		<table>
		<tbody>
			<?php

	// Falta la cabecera del listado

				while ($fila = $resultado->fetch_assoc()) {
					// La primera vez coloco el numero de expediente
					if ($exped_anterior === 0)
						$exped_anterior = $fila['expediente'] ;

					// Compruebo que cambio de expediente
					// Sino agrego una nueva linea
					if ($exped_anterior != $fila['expediente']) {
						imprime_suma($contador);
						$exped_anterior = $fila['expediente'];
						$contador = 0;
					}




	// Falta el nombre del tipo




					echo '<tr>';
					echo '<td class="al_derecha">' . ($contador!=0?'':$fila['expediente']) . '</td>';
					echo '<td class="col1">' . ($contador!=0?'':$fila['nombre'] . '</td>');
					echo '<td class="col3">' . $fila['dominio'] . '</td>';
					echo '<td class="col4">' . $fila['tipo'] . '</td>';
					echo '<td class="fechas">' . $fila['fecha'] . '</td>';
					echo '<td class="al_derecha"></td>';
					echo '<td class="al_derecha"></td>';
					echo '</tr>';

					//Controlo la cantidad de tramites
					switch ($fila['tipo']) {
						case 'ALTA' :
							$alta++;
							break;
						case 'EMPRESA' :
							$empresa++;
							$contador++;
							break;
						case 'BAJA' :
							$baja++;
							break;
						case 'MODIF' :
							$modif++;
							break;
						case 'REIMPRE.' :
							$reimpre++;
							break;
						case 'REVALIDA' :
							$revalida++;
							break;
						}
					$contador++;
				}

			imprime_suma($contador);
			$mysqli->close();
			?>

		</tbody>
	</table>


	<!-- Falta la suma al pie -->

	<table>

		<tbody>
			<tr>
				<td>Forma de Pago: Cheque</td>
				<td>Reg.Altas (V)</td>
				<td><?php echo $alta?></td>
				<td>$&nbsp;<?php echo $alta*$valor_tramite?>,00</td>
			</tr>
			<tr>
				<td></td>
				<td>(E)</td>
				<td><?php echo $empresa?></td>
				<td>$&nbsp;<?php echo $empresa*$valor_tramite*2?>,00</td>
			</tr>
			<tr>
				<td></td>
				<td>Bajas</td>
				<td><?php echo $baja?></td>
				<td>$&nbsp;<?php echo $baja*$valor_tramite*2?>,00</td>
			</tr>
		</tbody>
		
	</table>




	</body>
</html>
