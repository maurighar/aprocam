<section class="contenido">

<table caption="control (11 rows)">
	<thead>
		<tr>
			<th>exped.</th>
			<th>nombre</th>
			<th>cuit</th>
			<th>dominio</th>
			<th>tipo</th>
			<th class="tipo_fecha">fecha</th>
			<th>lote</th>
			<th>certificado</th>
			<th class="tipo_fecha">entr.</th>
			<th class="tipo_fecha">rechazo</th>
			<th class="tipo_fecha">envio</th>
			<th>obs</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($ruta as $item): ?>
			<tr>
				<td class="al_derecha">
					<a href="<?= base_url() . "ruta/index/4/". $item->expediente; ?>">
						<?= $item->expediente; ?>
					</a>
				</td>

				<td><?= $item->nombre; ?> </td>

				<td>
					<a href="<?= base_url() . "ruta/index/2/". $item->cuit; ?>">
						<?= $item->cuit; ?>
					</a>
				</td>

				<td><?= $item->dominio; ?></td>

				<td bgcolor=<?php echo color_tipo($item->tipo); ?>>
					<?= $item->tipo; ?>
				</td>

				<td><? convertir_fechas($item->fecha,'normal');?></td>

				<td class="al_derecha"><?= $item->lote; ?></td>

				<?php
				# resalta los certificados que llegaron
				if ($item->certificado > 0) {
					?>
					<td bgcolor="green">
						<?} else { 	?>
						<td>
							<? }
							convertir_fechas($item->certificado,'normal'); ?>
						</td>

				<?php # resalta los certificados entregados
				if (empty($item->entregado)) {
					echo '<td>';
					if ($item->certificado > 0) {
						echo '<a href="' . base_url() .'ruta/marcar/' . $tipo . '/' . $valorconsulta . '/' . $item->id .'">Marcar</a>';
					}
				} else {
					echo '<td bgcolor="green">';
					echo $item->entregado;
				} ?>
				</td>

				<?php # resalta los rechazos
				if (empty($item->rechazo)) { ?>
					<td> </td>
				<?php } else { ?>
					<td bgcolor="red">
						<a href="<?= base_url()?>ruta/rechazo/<?= $item->id; ?>">Obs.</a>
	 					<script>
							notificar("<?php echo 'Expediente rechazado: ' . $item->nombre . ' - ' . $item->dominio; ?>",{icon:'../image/Advertencia.png'}) ;
						</script>
					</td>
				<?php }

				# resalta los rechazos enviados a Bs. As.
				if ($item->envio>0) { ?>
				<td bgcolor="green">
					<?php } else { ?>
					<td>
						<?php }

						convertir_fechas($item->envio,'normal');
						?>
					</td>

					<?php if (empty($item->obs))
					echo'<td>';
					else
						echo '<td bgcolor="green">';?>

					<a href="<?= base_url();?>ruta/obs/<?= $item->id; ?>">Obs.</a>
				</td>

				<td>
					<a href="<?= base_url();?>ruta/modificar/<?= $item->id; ?>">
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