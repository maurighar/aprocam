<?
	function color_envio($estado) { if ($estado > 0)   return 'class="pinta_verde"' ;}
	function color_rojo($estado)  { if ($estado != "") return 'class="pinta_rojo"' ;}
?>

<section class="contenido">



<!--
 #######  ########   ######
##     ## ##     ## ##    ##
##     ## ##     ## ##
##     ## ########   ######
##     ## ##     ##       ##
##     ## ##     ## ##    ##
 #######  ########   ######
 -->


<section id="obs">
<div class="divisor">
	Razón Social: <?= $obs->nombre; ?> </br>
	CUIT: <?= $obs->cuit; ?></br>
	Obs: <a href="<?= BASE_URL. 'ruta/obs_cuit/' . $obs->id; ?>">Editar</a></br>
	<?
	if (!empty($obs->obs)) {
		echo '<div class="divisor">';
		echo $obs->obs;
		echo '</div>';
	}

	?>
</div>

</section>








<!--
	########  ########  ######  ##     ##    ###    ########  #######
	##     ## ##       ##    ## ##     ##   ## ##        ##  ##     ##
	##     ## ##       ##       ##     ##  ##   ##      ##   ##     ##
	########  ######   ##       ######### ##     ##    ##    ##     ##
	##   ##   ##       ##       ##     ## #########   ##     ##     ##
	##    ##  ##       ##    ## ##     ## ##     ##  ##      ##     ##
	##     ## ########  ######  ##     ## ##     ## ########  #######
-->


<section id="rechazos">
	<?if ($rechazo != 'No') {?>
		<h1>Consulta Rechazos</h1>

		<table caption="rechazo">
			<thead>
				<tr>
					<th class="estado">estado</th>
					<th>centro</th>
					<th>Exped.</th>
					<th>tipo</th>
					<th class="tipo_fecha">procesado</th>
					<th>obs</th>
					<th class="tipo_fecha">fecha</th>
					<th class="tipo_fecha">planilla</th>
					<th class="tipo_fecha">envio</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
			<? foreach ($rechazo as $item): ?>
				<tr class="consulta_tabla">
					<td <?= color_rojo($item->anulado); ?>><?= $item->estado; ?></td>
					<td class="al_derecha"><?= $item->centro; ?></td>
					<td class="al_derecha">
						<a href="<?= base_url() . "ruta/index/4/". $item->expediente; ?>"><?= $item->expediente; ?></a>
					</td>
					<td><?= $item->tipo; ?></td>
					<td><?= $item->procesado; ?></td>
					<td class="obserb"><?= $item->obs; ?></td>
					<td><?= $item->fecha; ?></td>
					<td><?= $item->planilla; ?></td>
					<td <?= color_envio($item->envio); ?>>
						<?if ($item->envio > 0) {echo $item->envio;}
							else {echo '<a href="' . base_url() .'rechazo/marcar/'. $item->id . '/'. $item->cuit .'">Marcar</a>';}?>
					</td>

					<?php if (empty($item->info))
						echo'<td>';
					else
						echo '<td bgcolor="green">';?>
						<?= '<a href="' . base_url() .'rechazo/modif/'. $item->id .'">Editar</a>'; ?>
					</td>
				</tr>

			<? endforeach; ?>
			</tbody>

			<tfoot>
				<td align=right colspan="10" rowspan="1">
					Desarrollado por Mauricio A. Ghilardi
				</td>
			</tfoot>
		</table>
	<?} // Fin rehazos?>
</section>











<!--
 ######   #######  ##    ##  ######  ##     ## ##       ########    ###
##    ## ##     ## ###   ## ##    ## ##     ## ##          ##      ## ##
##       ##     ## ####  ## ##       ##     ## ##          ##     ##   ##
##       ##     ## ## ## ##  ######  ##     ## ##          ##    ##     ##
##       ##     ## ##  ####       ## ##     ## ##          ##    #########
##    ## ##     ## ##   ### ##    ## ##     ## ##          ##    ##     ##
 ######   #######  ##    ##  ######   #######  ########    ##    ##     ## -->


<section id="consulta">
	<h1>Consulta Tramites</h1>
	<table caption="control">
		<thead>
			<tr>
				<th>exped.</th>
				<th>dominio</th>
				<th>tipo</th>
				<th class="tipo_fecha">fecha</th>
				<th>lote</th>
				<th>certificado</th>
				<th>enregado</th>
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

					<td class="dominioLista"><?= $item->dominios; ?></td>

					<td bgcolor=<?= color_tipo($item->tipo); ?>>
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
							echo '--';
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
</section>





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