<?php
	$titulo_pagina = 'RUTA - No Liquidación';
	require 'header.php';

	require_once  'connect_db.php';
	$liquidacion = $mysqli->query("SELECT * FROM liquidacion ORDER BY liquidacion DESC LIMIT 1" );

	if ($liquidacion->num_rows === 0) {
		header("Location: msg_error.php?mensaje=No se encuentra ninguna liquidación.&tipo=OK");
	}

	$linea = $liquidacion->fetch_object();
	$nro_liquida = $linea->liquidacion;
	$fecha_liquida = $linea->fecha;
?>

<section>
	<h1>Última liquidación <?= $nro_liquida; ?> de fecha <?= $fecha_liquida; ?></h1>

	<?php
		$control = $mysqli->query("SELECT * FROM aprocam.control WHERE control.lote = 0" );

		if ($control->num_rows === 0)
			header("Location: msg_error.php?mensaje=No hay nada pendiente de liquidar.&tipo=OK");
	?>

	<h1>Consulta de tramites RUTA</h1>

	<table caption="control (11 rows)">
		<thead>
			<tr>
				<th>exped.</th>
				<th>nombre</th>
				<th>cuit</th>
				<th>dominio</th>
				<th>tipo</th>
				<th>fecha</th>
				<th>lote</th>
				<th>obs</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php while ($linea = $control->fetch_object()) { ?>
				<tr>
					<td class="al_derecha">
						<?php echo $linea->expediente?>
					</td>

					<td> <?php echo $linea->nombre?> </td>
					<td> <?php echo $linea->cuit?> </td>
					<td> <?php echo $linea->dominio?> </td>

					<td bgcolor=<?php echo color_tipo($linea->tipo)?>>
						<?= $linea->tipo?>
					</td>

					<td class="fechas">
						<?php convertir_fechas($linea->fecha,'normal');?>
					</td>

					<td class="al_derecha"><?= $linea->lote?></td>

					<?php
						if (empty($linea->obs))
							echo'<td>';
						else
							echo '<td bgcolor="green">';
					?>
						<a href="ver_obs.php?id=<?php echo $linea->id ; ?>">Obs.</a>
					</td>

					<td><a href="modificar.php?id=<?php echo $linea->id?>">Ver</a></td>
				</tr>
			<?php
				}
				$mysqli->close();
			?>
		</tbody>

		<tfoot>
			<td align=right colspan="9" rowspan="1">
				Desarrollado por Mauricio A. Ghilardi
			</td>
		</tfoot>
	</table>
</section>

<?php require 'footer.php'; ?>
