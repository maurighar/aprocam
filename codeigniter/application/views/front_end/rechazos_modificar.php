<?
	$estado = array(
		'name'        => 'estado',
		'id'          => 'estado',
		'value'       => $item->estado,
		'required'    => NULL,
		);

	$obs = array(
		'name'        => 'obs',
		'id'          => 'obs',
		'value'       => $item->obs,
		'required'    => NULL,
		);

	$envio = array(
		'name'        => 'envio',
		'id'          => 'envio',
		'value'       => $item->envio,
		);

	$info = array(
		'name'        => 'info',
		'id'          => 'info',
		'value'       => $item->info,
		);
	$anulado = array(
		'name'        => 'anulado',
		'id'          => 'anulado',
		'checked'       => ($item->anulado === 'SI'),
		);

	$ocultos = array('id' =>$item->id,);

?>

<section class="contenido">
	<h1>Detalle Rechazo</h1>

	<section id="info">
		<?
		echo form_fieldset('Información');





		echo form_fieldset_close();
		?>
	</section> <!-- fin section info -->

	<section id="editar">
		<?
		echo form_open("rechazo/modif_cargar");
		echo form_fieldset('Carga de datos');
		?>
		<div class="flota">
			<? echo form_label('Fecha de envio: ', 'envio');
			echo form_input($envio);?>
		</div>

		<div class="flota">
			<? echo form_label('Estado: ', 'estado');
			echo form_input($estado);?>
		</div>

		<div class="clear flota">
			<? echo form_label('Obs.: ', 'obs');
			echo form_textarea($obs);?>
		</div>

		<div class="flota">
			<? echo form_label('Info: ', 'info');
			echo form_textarea($info);?>
		</div>

		<div class="clear flota">
			<? echo form_label('Anulado: ', 'anulado');
			echo form_checkbox($anulado);?>

		</div>

		<div class="clear">
			<? echo form_hidden($ocultos);
			echo  form_submit('', 'Modificar');?>
		</div>

		<? echo form_fieldset_close();
		echo form_close(); ?>
	</section>  <!-- Fin seccion de edición -->


</section>