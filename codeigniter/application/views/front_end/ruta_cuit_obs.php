<section class="contenido">
	<?
	$obs = array(
		'name'  => 'obs',
		'id'    => 'obs',
		'value' => $item->obs,
		'cols'	=> "50",
		'rows'  => "10",
		);
	$ocultos = array('id' =>$item->id,);

	echo form_open("ruta/obs_cuit_carga");
	echo form_fieldset('Consulta Normal');
	?>

			<?= form_label('Empresa: ');?>
			<?= $item->nombre; ?>
			<br />
			<?= form_label('CUIT: ');?>
			<?= $item->cuit; ?>
			<br />
			<?= form_label('Obser.: ');?>
			<br />
			<?= form_textarea($obs);?>
			<br />
			<br />

			<? echo form_hidden($ocultos);
			echo  form_submit('', 'Modificar');?>

	<? echo form_fieldset_close();
	echo form_close(); ?>

		<a href="javascript:history.back()"> Volver Atrás</a>
</section>