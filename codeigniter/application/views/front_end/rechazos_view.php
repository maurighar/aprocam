<?
	function color_envio($estado) {
		if ($estado > 0) {
			return 'class="pinta_verde"' ;
		}
	}

	function color_rojo($estado) {
		if ($estado != "") {
			return 'class="pinta_rojo"' ;
		}
	}

?>

<section class="contenido">
		<table>
			<thead>
				<tr>
					<th class="estado">estado</th>
					<th>centro</th>
					<th>Exped.</th>
					<th>tipo</th>
					<th class="tipo_fecha">procesado</th>
					<th>obs</th>
					<th>CUIT</th>
					<th>razon</th>
					<th class="tipo_fecha">fecha</th>
					<th class="tipo_fecha">planilla</th>
					<th class="tipo_fecha">envio</th>
					<th>Info</th>
				</tr>
			</thead>
			<tbody>

				<? foreach ($rechazos as $item): ?>

					<tr class="consulta_tabla">
						<td <?= color_rojo($item->anulado); ?>><?= $item->estado; ?></td>
						<td class="al_derecha"><?= $item->centro; ?></td>
						<td class="al_derecha">
							<a href="<?= base_url() . "ruta/index/4/". $item->expediente; ?>"><?= $item->expediente; ?></a>
						</td>
						<td><?= $item->tipo; ?></td>
						<td><?= $item->procesado; ?></td>
						<td><?= $item->obs; ?></td>
						<td class="al_derecha"><?= $item->cuit; ?></td>
						<td><?= $item->razon; ?></td>
						<td><?= $item->fecha; ?></td>
						<td><?= $item->planilla; ?></td>
						<td <?= color_envio($item->envio); ?>>
							<?if ($item->envio > 0) {echo $item->envio;}
								else {echo '<a href="' . base_url() .'rechazo/marcar/'. $item->id . '/' . $desde.'">Marcar</a>';}?>
						</td>

						<?php if (empty($item->info))
							echo'<td>';
						else
							echo '<td bgcolor="green">';?>
							<?= '<a href="' . base_url() .'rechazo/modif/'. $item->id .'">Editar</a>'; ?></td>
						</tr>

				<? endforeach; ?>
			</tbody>
			<tfoot>
				<td align=right colspan="12" rowspan="1">
					Desarrollado por Mauricio A. Ghilardi
				</td>
			</tfoot>
	</table>


</section>