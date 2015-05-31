<?php

	$empresa = 0;
	$alta = 0;
	$baja = 0;
	$modif = 0;
	$reimpre = 0;
	$revalida = 0;

	$alta_rptc = 0;
	$modif_rptc = 0;
	$reimpre_rptc = 0;
	$revalida_rptc = 0;

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
		echo '<td class="centrar ' . control($arreglo['anulado'],$paraControlar['anulado']) . '">' . $arreglo['anulado'] . '</td>';
		echo '</tr>';
	}
?>


<?php
$titulo_pagina = 'Sistema RUTA';
require 'header.php'; ?>

<style>
	.columan_normal {
		background-color: #85FAFA;
	}

	.columan_gris {
		background-color: #FAFD82;
	}
</style>

<?php

	$nro_lote = $_GET["lote"] ;

	$totales = ['empresa' => 0, 'alta' => 0, 'baja' => 0, 'modif' => 0, 'reimpre' => 0, 'revalida' => 0];
	$porExpediente = ['empresa' => 0, 'alta' => 0, 'baja' => 0, 'modif' => 0, 'reimpre' => 0, 'revalida' => 0, 'anulado' => 0];
	$control = ['empresa' => 0, 'alta' => 0, 'baja' => 0, 'modif' => 0, 'reimpre' => 0, 'revalida' => 0,'anulado' => 0];

	$cantidad = 0;
	$cantidad_revalida = 0;
	$exped_anterior = 0;

	require 'connect_db.php';
?>

<section>
	<h1> Lote <?php echo $nro_lote?> </h1>

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
			$resultado = $mysqli->query("SELECT *,lista_expdientes.expediente as exped,lista_expdientes.nombre as razonsocial  FROM lista_expdientes LEFT OUTER JOIN control ON (lista_expdientes.expediente = control.expediente) WHERE lista_expdientes.lote = $nro_lote order by lista_expdientes.expediente");
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
					<th>A-</th>
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
									'revalida' => 0,
									'anulado' => 0];
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
						echo '<td class="dcha">' . $fila['exped'] . '</td>';
						echo '<td>' . $fila['razonsocial'] . '</td>';
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
							$alta++ ;
							$alta_rptc = $alta_rptc + $fila['rptc'];
							break;
						case 'EMPRESA' :
							$porExpediente['empresa']++;
							$empresa++ ;
							break;
						case 'BAJA' :
							$porExpediente['baja']++;
							$baja++ ;
							break;
						case 'MODIF' :
							$porExpediente['modif']++;
							$modif_rptc = $modif_rptc + $fila['rptc'] ;
							$modif++ ;
							break;
						case 'REIMPRE.' :
							$porExpediente['reimpre']++;
							$reimpre_rptc = $reimpre_rptc + $fila['rptc'];
							$reimpre++ ;
							break;
						case 'REVALIDA' :
							$porExpediente['revalida']++;
							$revalida++ ;
							$revalida_rptc = $revalida_rptc + $fila['rptc'];
							break;
						case 'ANULADO' :
							$porExpediente['anulado']++;
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
					<td colspan="7"></td>

				</tr>

				<tr>
				<td colspan="2" class="dcha"> -- </td>
					<td>AE</td>
					<td>AV</td>
					<td>BV</td>
					<td>MO</td>
					<td>RE</td>
					<td>RV</td>

					<td>AE</td>
					<td>AV</td>
					<td>BV</td>
					<td>MO</td>
					<td>RE</td>
					<td>RV</td>
					<td>A-</td>
				</tr>
				<td align=right colspan="15" rowspan="1">
				Desarrollado por Mauricio A. Ghilardi
				</td>
			</tfoot>
		</table>
	</div>


	<div>
	<table class="tabla_suma">
		<thead>
			<tr>
				<th class="columna1">Tipo de tramite</th>
				<th class="columna2">Tramites RUTA</th>
				<th class="columna3">Precio Unitario</th>
				<th class="columna4">Tramites RPTC</th>
				<th class="columna5">Precio Unitario</th>
				<th class="columna6">Importe</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Reg. Altas Empresa</td>
				<td class="al_derecha"><?php echo $empresa?></td>
				<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE*2?>,00</td>
				<td class="al_derecha">-</td>
				<td class="al_derecha">-</td>
				<td class="al_derecha">$&nbsp;<?php echo $empresa*VALOR_TRAMITE*2?>,00</td>
			</tr>
			<tr>
				<td>Reg. Altas Vehículos</td>
				<td class="al_derecha"><?php echo $alta?></td>
				<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
				<td class="al_derecha"><?php echo $alta_rptc?></td>
				<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
				<td class="al_derecha">$&nbsp;<?php echo ($alta_rptc+$alta)*VALOR_TRAMITE?>,00</td>
			</tr>
			<tr>
				<td>Reg. Bajas</td>
				<td class="al_derecha"><?php echo $baja?></td>
				<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
				<td class="al_derecha">-</td>
				<td class="al_derecha">-</td>
				<td class="al_derecha">$&nbsp;<?php echo ($baja)*VALOR_TRAMITE?>,00</td>
			</tr>
			<tr>
				<td>Reg. Reimpresiones</td>
				<td class="al_derecha"><?php echo $reimpre?></td>
				<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
				<td class="al_derecha"><?php echo $reimpre_rptc?></td>
				<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
				<td class="al_derecha">$&nbsp;<?php echo ($reimpre_rptc+$reimpre)*VALOR_TRAMITE?>,00</td>
			</tr>
			<tr>
				<td>Reg. Modificaciones</td>
				<td class="al_derecha"><?php echo $modif?></td>
				<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
				<td class="al_derecha"><?php echo $modif_rptc?></td>
				<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
				<td class="al_derecha">$&nbsp;<?php echo ($modif_rptc+$modif)*VALOR_TRAMITE?>,00</td>
			</tr>
			<tr>
				<td>Reg. Revalidas</td>
				<td class="al_derecha"><?php echo $revalida?></td>
				<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
				<td class="al_derecha"><?php echo $revalida_rptc?></td>
				<td class="al_derecha">$&nbsp;<?php echo VALOR_TRAMITE?>,00</td>
				<td class="al_derecha">$&nbsp;<?php echo ($revalida_rptc+$revalida)*VALOR_TRAMITE?>,00</td>
			</tr>

			<tr>
				<td colspan="6"></td>
			</tr>

			<tr>
				<td class="al_derecha" colspan="4" rowspan="1">Total de legajos</td>
				<td class="al_derecha"><?php echo ($alta_rptc + $modif_rptc + $reimpre_rptc + $revalida_rptc+$empresa+$alta+$baja+$modif+$reimpre+$revalida)?></td>
				<td class="al_derecha">$&nbsp;<?php echo ($alta_rptc + $modif_rptc + $reimpre_rptc + $revalida_rptc+$empresa*2+$alta+$baja+$modif+$reimpre+$revalida)*VALOR_TRAMITE?>,00</td>
			</tr>

			<tr>
				<td colspan="6"></td>
			</tr>

			<tr>
				<td colspan="4" rowspan="1" class="al_derecha">35% s/: </td>
				<td colspan="2" rowspan="1" class="al_derecha">$&nbsp;<?php echo ($alta_rptc + $modif_rptc + $reimpre_rptc + $revalida_rptc+$empresa*2+$alta+$baja+$modif+$reimpre+$revalida)*VALOR_TRAMITE*.35 ?>,00</td>
			</tr>

		</tbody>

	</table>
	</div>
</section>



<?php

$actualizar = "UPDATE liquidacion SET  cant_alta = $alta,cant_empresa = $empresa,cant_baja = $baja,cant_reimp = $reimpre,cant_modif = $modif,cant_reval = $revalida,rptc_alta = $alta_rptc,rptc_reimp = $reimpre_rptc,rptc_modif = $modif_rptc,rptc_reval = $revalida_rptc WHERE  liquidacion=$nro_lote";
$mensaje = $mysqli->query("$actualizar");
$mysqli->close();

?>


<?php require 'footer.php'; ?>
