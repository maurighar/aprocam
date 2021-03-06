<?php

	require 'funciones.php';
	function imprime_suma($legajos) {
		echo '<tr><td class="al_derecha"></td><td></td><td></td><td></td><td class="fechas"></td>';
		echo '<td class="al_derecha">L:' . $legajos . '</td>';
		echo '<td class="al_derecha">$ ' . $legajos*VALOR_TRAMITE . ',00</td></tr>';
	}

	function imprime_tipo_tramite($tipo) {
		echo '<tr><td  class="tipo" colspan="7" rowspan="1">';
		echo $tipo;
		echo '</td></tr>';
	}
?>


<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<link rel="icon" image="type/ico" href="../favicon.ico" />
		<title>RUTA - Consulta</title>


		<style type="text/css">
			body {
				background: #FFF;
				font-family: Verdana,Tahoma;
				font-size: 0.7em;
				padding: 0;
				margin: 0;
			}
			table {
				margin: 25px auto;
			}
			table, td,tr {
				border: 0 solid white;
				background: #FFF;
			}
			th, td {
				vertical-align: top;
				font-family: Tahoma;
				font-size: 1em;
				padding: 3px ;
			}
			.al_derecha {
				text-align: right;
			}
			.tipo {
				border: 2px solid;
				text-align: center;
			}

			.cabecera {
				text-align: center;
			}

			.columna1 {width: 120px;}
			.columna2,.columna3 {width: 40px;}
			.columna4,.columna5 {width: 80px;}
			.columna6 {width: 100px;}
			.columna_importe{width: 50px;}

			.tabla_suma {
				border: 1px solid;
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
			$cuit_anterior = 0;
			$tipo_tramite = '';


			$valor = $_GET["lote"] ;
			$sinordenar = $_GET["sinordenar"] ;

			require 'connect_db.php';

			$resultado = $mysqli->query("SELECT * FROM liquidacion WHERE liquidacion = $valor" );
			$liquida = $resultado->fetch_assoc();

			$fecha_liq = new DateTime($liquida['fecha']);
			$fecha_liq = $fecha_liq->format('d-m-Y');
		?>

		<div class="cabecera">
			<p>
				Registro de expedientes <br>
				Centro de Recepción: 1012 <br>
				<?php
					echo "Liquidación: ";
					echo $liquida['liquidacion'];
					echo ' ('. $liquida['alta'] . ' - ' . $liquida['revalida'] . ') Fecha: ' . $fecha_liq;
				;?>
			</p>

		</div>

	<?php require 'liquida_totales.php'; ?>

		<table>
		<tbody>
			<?php
				if ($sinordenar === 'SI')
					$orden = 'expediente';
				else
					$orden = 'tipo2, expediente';

				$consulta = "SELECT *, IF(tipo = 'EMPRESA','ALTA',tipo) as tipo2 FROM aprocam.control WHERE control.lote = $valor and tipo != 'ANULADO' ORDER BY $orden";

				$resultado = $mysqli->query("$consulta");


				while ($fila = $resultado->fetch_assoc()) {
					// La primera vez coloco el numero de cuit
					if ($cuit_anterior === 0)
						$cuit_anterior = $fila['cuit'] ;

					// Compruebo que cambio de cuit
					// Sino agrego una nueva linea
					if ($cuit_anterior != $fila['cuit']) {
						imprime_suma($contador);
						$cuit_anterior = $fila['cuit'];
						$contador = 0;
					}

					// Compruebo que cambio el tipo de tramite
					// Si cambia agrego cartel del tipo
					if ($tipo_tramite != $fila['tipo2'] && $sinordenar === 'NO') {
						$tipo_tramite = $fila['tipo2'];
						imprime_tipo_tramite($tipo_tramite);
					}

					$mas_rptc = $fila["rptc"]>0?'+RPTC':'' ;
					echo '<tr>';
					echo '<td class="al_derecha">' . ($contador!=0?'':$fila['expediente']) . '</td>';
					echo '<td>' . ($contador!=0?'':$fila['nombre'] . '</td>');
					echo '<td>' . $fila['dominio'] . '</td>';
					echo '<td>' . $fila['tipo'] .$mas_rptc. '</td>';
					echo '<td class="fechas">' . $fila['fecha'] . '</td>';
					echo '<td class="al_derecha"></td>';
					echo '<td class="al_derecha columna_importe"></td>';
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


<!-- 	<div >
	<table class="tabla_suma">
		<tbody>
			<tr>
				<td class="columna1">Forma de Pago: Cheque</td>
				<td class="columna2 al_derecha">Reg.Altas (V)</td>
				<td class="columna3 al_derecha"><?php echo $alta?></td>
				<td class="columna4 al_derecha">$&nbsp;<?php echo $alta*VALOR_TRAMITE?>,00</td>
			</tr>
			<tr>
				<td></td>
				<td class="al_derecha">(E)</td>
				<td class="al_derecha"><?php echo $empresa?></td>
				<td class="al_derecha">$&nbsp;<?php echo $empresa*VALOR_TRAMITE*2?>,00</td>
			</tr>
			<tr>
				<td></td>
				<td class="al_derecha">Bajas</td>
				<td class="al_derecha"><?php echo $baja?></td>
				<td class="al_derecha">$&nbsp;<?php echo $baja*VALOR_TRAMITE?>,00</td>
			</tr>
			<tr>
				<td></td>
				<td class="al_derecha">Reimpresiones</td>
				<td class="al_derecha"><?php echo $reimpre?></td>
				<td class="al_derecha">$&nbsp;<?php echo $reimpre*VALOR_TRAMITE?>,00</td>
			</tr>
			<tr>
				<td></td>
				<td class="al_derecha">Revalidas</td>
				<td class="al_derecha"><?php echo $revalida?></td>
				<td class="al_derecha">$&nbsp;<?php echo $revalida*VALOR_TRAMITE?>,00</td>
			</tr>
			<tr>
				<td></td>
				<td class="al_derecha">Modificaciones</td>
				<td class="al_derecha"><?php echo $modif?></td>
				<td class="al_derecha">$&nbsp;<?php echo $modif*VALOR_TRAMITE?>,00</td>
			</tr>

			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>

			<tr>
				<td></td>
				<td class="al_derecha">Total de legajos: </td>
				<td class="al_derecha"><?php echo ($empresa+$alta+$baja+$modif+$reimpre+$revalida)?></td>
				<td class="al_derecha">$&nbsp;<?php echo ($empresa*2+$alta+$baja+$modif+$reimpre+$revalida)*VALOR_TRAMITE?>,00</td>
			</tr>

			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>

			<tr>
				<td></td>
				<td class="al_derecha">35% s/: </td>
				<td class="al_derecha"></td>
				<td class="al_derecha">$&nbsp;<?php echo ($empresa*2+$alta+$baja+$modif+$reimpre+$revalida)*VALOR_TRAMITE*.35 ?>,00</td>
			</tr>

		</tbody>

	</table>
	</div> -->

	</body>
</html>