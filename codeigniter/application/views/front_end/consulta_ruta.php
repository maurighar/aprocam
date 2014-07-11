<section class="contenido">

<table caption="control (11 rows)">
	<thead>
		<tr>
			<th class="col0">exped.</th>
			<th class="col1">nombre</th>
			<th class="col2">cuit</th>
			<th class="col3">dominio</th>
			<th class="col4">tipo</th>
			<th class=".fechas">fecha</th>
			<th class="col6">lote</th>
			<th class="col8">certificado</th>
			<th class=".fechas">entr.</th>
			<th class=".fechas">rechazo</th>
			<th class=".fechas">envio</th>
			<th class="col12">obs</th>
			<th class="col13"></th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($articulos as $item): ?>
			<tr>
				<td class="al_derecha">
					<a href="<? echo "consulta.php?Tipo=4&valorconsulta=". $item->expediente; ?>">
						<?php echo $item->expediente; ?>
					</a>
				</td>

				<td class="col1">
					<?php echo $item->nombre; ?>
				</td>

				<td class="col2">
					<a href="<?php echo "consulta.php?Tipo=2&valorconsulta=". $item->cuit; ?>">
						<?php echo $item->cuit; ?>
					</a>
				</td>

				<td class="col3">
					<?php echo $item->dominio; ?>
				</td>

				<td class="col4" bgcolor=<?php echo color_tipo($item->tipo); ?>>
					<?php echo $item->tipo; ?>
				</td>

				<td class="fechas">
					<? convertir_fechas($item->fecha,'normal');?>
				</td>

				<td class="al_derecha">
					<? echo $item->lote; ?>
				</td>

				<?php
				# resalta los certificados que llegaron
				if ($item->certificado > 0) {
					?>
					<td bgcolor="green">
						<?} else { 	?>
						<td class="fechas">
							<? }
							convertir_fechas($item->certificado,'normal'); ?>
						</td>

			<?php # resalta los certificados entregados
			if (empty($item->entregado)) {
				echo '<td class="fechas">';
				if ($item->certificado > 0) {
					echo "<a href=\"?Tipo=$tipo_val&valorconsulta=$valor&id=" . $item->id . "\">Marcar</a>";
				}
			} else {
				echo '<td bgcolor="green">';
				echo $item->entregado;
			} ?>
			</td>

			<?php # resalta los rechazos
			if (empty($item->rechazo)) { ?>

			<td class="col10"> </td>

			<?php } else { ?>

			<td bgcolor="red">
				<a href="rechazo/ver_rechazo.php?id=<? echo $item->id; ?>">Obs.</a>
 				<script>
					notificar("<?php echo 'Expediente rechazado: ' . $fila['nombre'] . ' - ' . $fila['dominio']?>",{icon:'../image/Advertencia.png'}) ;
				</script>
			</td>
			<?php }

			# resalta los rechazos enviados a Bs. As.
			if ($item->envio>0) { ?>
			<td bgcolor="green">
				<?php } else { ?>
				<td class="fechas">
					<?php }

					convertir_fechas($item->envio,'normal');
					?>
				</td>

				<?php if (empty($item->obs))
				echo'<td class="col12">';
				else
					echo '<td bgcolor="green">';?>

				<a href="obs/<?php echo $item->id ; ?>">Obs.</a>
			</td>

			<td class="col13">
				<a href="ruta_control/modificar/<?php echo $item->id?>">
					Ver
				</a>
			</td>
		</tr>
		<? endforeach; ?>

	</tbody>

	<tfoot>
		<td align=right colspan="13" rowspan="1">
			Desarrollado por Mauricio A. Ghilardi
		</td>
	</tfoot>

</table>
<div class="noprint">
	<a href="../index.php">Volver a Home</a>
</div>

<div class="imprimir">
	<br><br><br>
	<p class="firma">
		Firma,   aclaración y   DNI
	</p>
</div>


</section>