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
		'value'       => $item->anulado,
		);

	$ocultos = array('id' =>$item->id,);

?>

<section class="contenido">

	<section id="info">

	</section> <!-- fin section info -->

	<section id="editar">
		<?
		echo form_open("rechazo/modificar_cargar");
		echo form_fieldset('Carga de datos');
		?>
		<div class="flota">
			<? echo form_label('Razón social: ', 'nombre');
			echo form_input($nombre);?>
		</div>

		<div class="flota">
			<? echo form_label('CUIT: ', 'cuit');
			echo form_input($cuit);?>
		</div>

		<div class="clear flota">
			<? echo form_label('Dominio: ', 'dominio');
			echo form_input($dominio);?>
		</div>

		<div class="flota">
			<? echo form_label('Tipo de tramite: ', 'tipo');
			echo form_dropdown('tipo',$tipo_de_tramite,$item->tipo);?>
		</div>

		<div class="clear flota">
			<? echo form_label('Fecha: ', 'fecha');
			echo form_input($fecha);?>
		</div>

		<div class="flota">
			<? echo form_label('Lote: ', 'lote');
			echo form_input($lote);?>
		</div>

		<div class="clear flota">
			<? echo form_label('Certificado: ', 'certificado');
			echo form_input($certificado);?>
		</div>

		<div class="flota">
			<? echo form_label('Entregado: ', 'entregado');
			echo form_input($entregado);?>
		</div>

		<div class="clear flota">
			<? echo form_label('Fecha envio: ', 'envio');
			echo form_input($envio);?>
		</div>

		<div class="flota">
			<? echo form_label('Detalle rechazos: ', 'rechazo');
			echo form_textarea($rechazo);?>
		</div>

		<div class="clear">
			<? echo form_hidden($ocultos);
			echo  form_submit('', 'Modificar');?>
		</div>

		<? echo form_fieldset_close();
		echo form_close(); ?>
	</section>  <!-- Fin seccion de edición -->


</section>