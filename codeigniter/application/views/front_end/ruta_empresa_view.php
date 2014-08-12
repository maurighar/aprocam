<section class="contenido">
<h1>Consulta Tramites</h1>
<table id="por Empresa">
	<thead>
		<tr>
			<th>cuit</th>
			<th>nombre</th>
			<th>obs</th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($ruta as $item): ?>
			<tr>
				<td>
					<a href="<?= base_url() . "ruta/cuit/". $item->cuit .'/'. $item->nombre ; ?>">
						<?= $item->cuit; ?>
					</a>
				</td>
				<td><?= $item->nombre; ?> </td>
				<td>
					<a href="<?= base_url();?>ruta/modificar/<?= $item->id; ?>">
						Ver
					</a>
				</td>
			</tr>
		<? endforeach; ?>
	</tbody>

	<tfoot>
		<td align=right colspan="3" rowspan="1">
			Desarrollado por Mauricio A. Ghilardi
		</td>
	</tfoot>

</table>



</section>