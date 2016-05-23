<?php
$titulo_pagina = 'RUTA - Temporal';
require 'header.php';
?>


<?php

$totales = ['empresa' => 0, 'alta' => 0, 'baja' => 0, 'modif' => 0, 'reimpre' => 0, 'revalida' => 0];
$cantidad_tramites = 0;

$_selec = 'SELECT *, DATEDIFF(CURDATE(),fecha) AS dias FROM aprocam.tempo_control ORDER BY expediente,tipo,dominio';
require 'connect_db.php';
$resultado = $mysqli->query("$_selec");

if ($resultado->num_rows === 0) {
	header("Location: msg_error.php?mensaje=La busqueda no arrojo resultados&tipo=OK");
}
?>

<fieldset>
	<legend>Opciones liquidación</legend>
	<a class="enlace_boton" href="tempo_chequear.php">Verificar</a>
</fieldset>

<h1>Tramites sin Liquidar</h1>

<table caption="Sin liquidar">
	<thead>
		<tr>
			<th>exped.</th>
			<th>nombre</th>
			<th>cuit</th>
			<th>dominio</th>
			<th>tipo</th>
			<th>fecha</th>
			<th>dias</th>
			<th>lote</th>
			<th>obs</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php while ($linea = $resultado->fetch_object()) { ?>
			<tr>
				<td class="al_derecha">
					<?php echo $linea->expediente?>
				</td>

				<td> <?php echo $linea->nombre?> </td>

				<td>
					<a href="<?php echo "consulta.php?Tipo=2&valorconsulta=". $linea->cuit ?>">
						<?php echo $linea->cuit?>
					</a>
					<?php
					if (!validarCUIT($linea->cuit)) {
						echo "<strong> Incorrecto</strong>" ;
					}
					?>
				</td>

				<td> <?php echo $linea->dominio?> </td>

				<td bgcolor=<?php echo color_tipo($linea->tipo)?>>
					<?php echo $linea->tipo?>
				</td>

				<td class="fechas">
					<?php convertir_fechas($linea->fecha,'normal');?>
				</td>

				<td class="al_derecha"> <?php echo $linea->dias;?> </td>

				<td class="al_derecha">
					<?php echo $linea->lote?>
				</td>


				<?php if (empty($linea->obs))
					echo'<td>';
				else
					echo '<td bgcolor="green">';
				?>

					<a href="ver_obs.php?id=<?php echo $linea->id ; ?>">Obs.</a>
				</td>

				<td>
					<a href="tempo_modificar.php?id=<?php echo $linea->id?>">
						Ver
					</a>
				</td>
			</tr>

			<?php

			if(!empty($linea->tipo)) $cantidad_tramites++;

			switch ($linea->tipo) {
				case 'ALTA' :
					$totales['alta']++;
					break;
				case 'EMPRESA' :
					$totales['empresa']++;
					break;
				case 'BAJA' :
					$totales['baja']++;
					break;
				case 'MODIF' :
					$totales['modif']++;
					break;
				case 'REIMPRE.' :
					$totales['reimpre']++;
					break;
				case 'REVALIDA' :
					$totales['revalida']++;
					break;
				case 'ANULADO' :
					$totales['anulado']++;
					break;
			}
		}
		$mysqli->close();
		?>

	</tbody>

	<tfoot>
		<td align=right colspan="14" rowspan="1">
			Desarrollado por Mauricio A. Ghilardi
		</td>
	</tfoot>

</table>

<div>
	<table class="tabla_suma">
		<thead>
			<tr>
				<th class="columna1">Tipo de tramite</th>
				<th class="columna2">Tramites RUTA</th>
				<th class="columna4">Tramites RPTC</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Reg. Altas Empresa</td>
				<td class="al_derecha"><?php echo $totales['empresa']?></td>
				<td class="al_derecha">-</td>
			</tr>
			<tr>
				<td>Reg. Altas Vehículos</td>
				<td class="al_derecha"><?php echo $totales['alta']?></td>
				<td class="al_derecha"><?php echo 0?></td>
			</tr>
			<tr>
				<td>Reg. Bajas</td>
				<td class="al_derecha"><?php echo $totales['baja']?></td>
				<td class="al_derecha">-</td>
			</tr>
			<tr>
				<td>Reg. Reimpresiones</td>
				<td class="al_derecha"><?php echo $totales['reimpre']?></td>
				<td class="al_derecha"><?php echo 0?></td>
			</tr>
			<tr>
				<td>Reg. Modificaciones</td>
				<td class="al_derecha"><?php echo $totales['modif']?></td>
				<td class="al_derecha"><?php echo 0?></td>
			</tr>
			<tr>
				<td>Reg. Revalidas</td>
				<td class="al_derecha"><?php echo $totales['revalida']?></td>
				<td class="al_derecha"><?php echo 0?></td>
			</tr>

			<tr>
				<td colspan="3"></td>
			</tr>

			<tr>
				<td class="al_derecha" colspan="2" rowspan="1">Total de legajos</td>
				<td class="al_derecha"><?php echo ($totales['revalida']+ $totales['modif']+ $totales['empresa']+ $totales['reimpre']+ $totales['baja']+ $totales['alta'])?> (<?php echo $cantidad_tramites?>)</td>
			</tr>
		</tbody>

	</table>
</div>

<?php require 'footer.php'; ?>
