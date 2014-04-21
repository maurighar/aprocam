<?php
	function verde($valor_controla) {
		if ($valor_controla > 0)
			return " pinta_verde";
	}

	function control($valor, $controla) {
		//
			if ($controla != $valor )
				return " pinta_rojo";
			else if ($controla == $valor) {
				if ($valor > 0)
					return " pinta_verde";
				}
	}

	function imprime_columnas ($arreglo,$paraControlar) {
		echo '<td class="columan_gris centrar ' . control($arreglo['empresa'],$paraControlar['empresa']) . '">' . $arreglo['empresa'] . '</td>';
		echo '<td class="columan_gris centrar ' . control($arreglo['alta'],$paraControlar['alta']) . '">' . $arreglo['alta'] . '</td>';
		echo '<td class="columan_gris centrar ' . control($arreglo['baja'],$paraControlar['baja']) . '">' . $arreglo['baja'] . '</td>';
		echo '<td class="columan_gris centrar ' . control($arreglo['modif'],$paraControlar['modif']) . '">' . $arreglo['modif'] . '</td>';
		echo '<td class="columan_gris centrar ' . control($arreglo['reimpre'],$paraControlar['reimpre']) . '">' . $arreglo['reimpre'] . '</td>';
		echo '<td class="columan_gris centrar ' . control($arreglo['revalida'],$paraControlar['revalida']) . '">' . $arreglo['revalida'] . '</td>';
		echo '</tr>';
	}
?>


<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Sistema RUTA</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<link rel="icon" image="type/ico" href="../favicon.ico" />
		<link rel="stylesheet" href="../css/normalize.css" />
		<link rel="stylesheet" href="../css/main.css" />

		<style>
			.columan_normal {
				background-color: #85FAFA;
			}

			.columan_gris {
				background-color: #FAFD82;
			}
		</style>
	</head>
	<body>
		<?php
			require '../encabezado.php';
			$nro_lote = $_GET["lote"] ;

			$totales = ['empresa' => 0, 'alta' => 0, 'baja' => 0, 'modif' => 0, 'reimpre' => 0, 'revalida' => 0];
			$porExpediente = ['empresa' => 0, 'alta' => 0, 'baja' => 0, 'modif' => 0, 'reimpre' => 0, 'revalida' => 0];
			$control = ['empresa' => 0, 'alta' => 0, 'baja' => 0, 'modif' => 0, 'reimpre' => 0, 'revalida' => 0];

			$cantidad = 0;
			$cantidad_revalida = 0;
			$exped_anterior = 0;

			require 'connect_db.php';
		?>

		<section>
			<h1>
				Lote <?php echo $nro_lote?>
			</h1>

			<div class="divisor">
				<a class="enlace_boton" href="liquida_controlar.php?lote=<?php echo $nro_lote; ?>">Generar control</a>
				<a class="enlace_boton" href="liquida_modifica.php?lote=<?php echo $nro_lote; ?>">Modifica Lote</a>
				<a class="enlace_boton" href="liquida_imprime.php?lote=<?php echo $nro_lote; ?>">Imprimir Liquidación</a>
				<a class="enlace_boton" href="liquida_imprime.php?lote=<?php echo $nro_lote; ?>">Imprimir Sin Ordenar</a>
			</div>

			<div class="divisor">
				<?php
					$_selec = "SELECT * FROM liquidacion WHERE liquidacion = $nro_lote";
					$resultado = $mysqli->query("$_selec");

					$fila = $resultado->fetch_assoc();
					$id_liquida = $fila['id'];

					if ($resultado->num_rows===0)
						exit("<p class=\"mensaje_mal\">No se encuentra la liquidacón $nro_lote.</p>");
					if ($resultado->num_rows>1)
						exit("Hay mas de una liquidacón $valor.");
					echo 'Nº de liquidación: ' . $fila['liquidacion'] . '<br>';
					echo 'Lote altas: ' . $fila['alta'] . '<br>';
					echo 'Lote revalidas: ' . $fila['revalida'] . '<br>';
					echo 'Fecha de cierre: ' . $fila['fecha'];
				?>
			</div>

			<div class="divisor">
				<?php
					$resultado = $mysqli->query("SELECT * FROM lista_expdientes LEFT OUTER JOIN control ON (lista_expdientes.expediente = control.expediente) WHERE control.lote = $nro_lote order by control.expediente");
				?>

				<table id="lista_exp">
					<thead>
						<tr>
							<th>Expediente</th>
							<th>Razón social</th>
							<th>AE</th>
							<th>AV</th>
							<th>BV</th>
							<th>MO</th>
							<th>RE</th>
							<th>RV</th>

							<th>AE</th>
							<th>AV</th>
							<th>BV</th>
							<th>MO</th>
							<th>RE</th>
							<th>RV</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while ($fila = $resultado->fetch_assoc()) {
								// Compruebo que cambio de expediente
								if ($exped_anterior != $fila['expediente']) {
									if ($exped_anterior != 0) {
										imprime_columnas($porExpediente,$control);
										$porExpediente = [
											'empresa' => 0,
											'alta' => 0,
											'baja' => 0,
											'modif' => 0,
											'reimpre' => 0,
											'revalida' => 0,];

									}


								$exped_anterior = $fila['expediente'];
								$contador = 0;


								$totales['alta'] += $fila['empresa'];
								$totales['empresa'] += $fila['alta'];
								$totales['baja'] += $fila['baja'];
								$totales['modif'] += $fila['modif'];
								$totales['reimpre'] += $fila['reimpre'];
								$totales['revalida'] += $fila['revalida'];


								echo '<tr>';
								echo '<td class="dcha">' . $fila['expediente'] . '</td>';
								echo '<td>' . $fila['nombre'] . '</td>';
								echo '<td class="columan_normal centrar' . verde($fila['empresa']) .'">' . $fila['empresa'] . '</td>';
								echo '<td class="columan_normal centrar' . verde($fila['alta']) .'">' . $fila['alta'] . '</td>';
								echo '<td class="columan_normal centrar' . verde($fila['baja']) .'">' . $fila['baja'] . '</td>';
								echo '<td class="columan_normal centrar' . verde($fila['modif']) .'">' . $fila['modif'] . '</td>';
								echo '<td class="columan_normal centrar' . verde($fila['reimpre']) .'">' . $fila['reimpre'] . '</td>';
								echo '<td class="columan_normal centrar' . verde($fila['revalida']) .'">' . $fila['revalida'] . '</td>';

							}

								$control['alta'] = $fila['alta'];
								$control['empresa'] = $fila['empresa'];
								$control['baja'] = $fila['baja'];
								$control['modif'] = $fila['modif'];
								$control['reimpre'] = $fila['reimpre'];
								$control['revalida'] = $fila['revalida'];

							switch ($fila['tipo']) {
								case 'ALTA' :
									$porExpediente['alta']++;
									break;
								case 'EMPRESA' :
									$porExpediente['empresa']++;
									break;
								case 'BAJA' :
									$porExpediente['baja']++;
									break;
								case 'MODIF' :
									$porExpediente['modif']++;
									break;
								case 'REIMPRE.' :
									$porExpediente['reimpre']++;
									break;
								case 'REVALIDA' :
									$porExpediente['revalida']++;
									break;
							}
						}
						imprime_columnas($porExpediente,$control);
					?>
					</tbody>
					<tfoot>
						<!-- Totales por tipo de tramite -->

						<tr>
							<td colspan="2" class="dcha"> Total de tramites </td>
							<td class="centrar"> <?php echo $totales['alta'] ?> </td>
							<td class="centrar"> <?php echo $totales['empresa'] ?> </td>
							<td class="centrar"> <?php echo $totales['baja'] ?> </td>
							<td class="centrar"> <?php echo $totales['modif'] ?> </td>
							<td class="centrar"> <?php echo $totales['reimpre'] ?> </td>
							<td class="centrar"> <?php echo $totales['revalida'] ?> </td>
							<td colspan="6"></td>

						</tr>

						<td align=right colspan="14" rowspan="1">
						Desarrollado por Mauricio A. Ghilardi
						</td>
					</tfoot>
				</table>

			</div>

		</section>

		<?php require 'footer.php'; ?>
	</body>
</html>