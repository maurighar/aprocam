<?
$lote = array(
	'name'        => 'lote',
	'id'          => 'lote',
	'required'    => NULL,
	'placeholder' =>'Ingrese el Nº de lote',
	);
?>

<section class="contenido">

	<h1>Liquidación de tramites</h1>

	<?= form_fieldset('Datos liquidación');?>
		<a  class="enlace_boton" href="liquida/carga">Cargar</a>
	<?= form_fieldset_close();?>

	<div class="divisor">
		<table id="consulta_liquidacion">
			<thead>
				<tr>
					<th>Liquidación</th>
					<th>Fecha</th>
					<th>..</th>
				</tr>
			</thead>
			<tbody>
				<? foreach ($liquida as $item): ?>
				<tr>
					<td class="centrar"> <?= $item->liquidacion;?> </td>
					<td class="centrar"> <? convertir_fechas($item->fecha,'normal');?> </td>
					<td class="centrar"> <a href="<?= base_url()?>liquida/control/<?= $item->liquidacion; ?>">Consultar</a> </td>
				</tr>
				<? endforeach; ?>
			</tbody>
			<tfoot>
				<td align=right colspan="5" rowspan="1">
				Desarrollado por Mauricio A. Ghilardi
				</td>
			</tfoot>
		</table>
	</div>

	<?= form_fieldset('Controlar liquidación');?>
		<?= form_open("liquida/control_form");?>
		<? echo form_label('Liquidación: ', 'lote');
		echo form_input($lote);
		echo  form_submit('', 'Buscar'); ?>
		<?= form_close(); ?>
	<?= form_fieldset_close();?>
</section>