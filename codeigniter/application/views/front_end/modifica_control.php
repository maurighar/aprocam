<?php
	$nombre = array(
		'name'        => 'nombre',
		'id'          => 'nombre',
		'value'       => $item->nombre,
		'required'    => NULL,
		);
	$cuit = array(
		'name'        => 'cuit',
		'id'          => 'cuit',
		'value'       => $item->cuit,
		'required'    => NULL,
		);
	$dominio = array(
		'name'        => 'dominio',
		'id'          => 'dominio',
		'value'       => $item->dominio,
		'required'    => NULL,
		);
	$fecha = array(
		'name'        => 'fecha',
		'id'          => 'fecha',
		'value'       => $item->fecha,
		'required'    => NULL,
		);
	$lote = array(
		'name'        => 'lote',
		'id'          => 'lote',
		'value'       => $item->lote,
		'required'    => NULL,
		);
	$certificado = array(
		'name'        => 'certificado',
		'id'          => 'certificado',
		'value'       => $item->certificado,
		);
	$entregado = array(
		'name'        => 'entregado',
		'id'          => 'entregado',
		'value'       => $item->entregado,
		);
	$envio = array(
		'name'        => 'envio',
		'id'          => 'envio',
		'value'       => $item->envio,
		);
	$rechazo = array(
		'name'        => 'rechazo',
		'id'          => 'rechazo',
		'value'       => ltrim($item->rechazo),
		);

	$ocultos = array('id' =>$item->id,);
?>

<section class="contenido">
	<section>
	<? echo form_fieldset('Estado');

		echo "Expediente: " . $item->expediente ;
		echo '<br /><br />';
		echo "Vencimiento: " . $item->vto;
		echo '<br />';
		echo "Cantidad de días: " . 'calcular' ;
		echo form_fieldset_close();
	?>
	</section>

	<section>
		<?
		echo form_open("ruta/modificar_cargar");
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
			<? echo form_label('Detalle rechazos: ', 'rechazo');
			echo form_textarea($rechazo);?>
		</div>

		<div class="flota">
			<? echo form_label('Fecha envio: ', 'envio');
			echo form_input($envio);?>
		</div>

		<div class="clear">
			<? echo form_hidden($ocultos);
			echo  form_submit('', 'Modificar');?>
		</div>

		<? echo form_fieldset_close();
		echo form_close(); ?>
		</section>

		<section>
			<?
			echo form_fieldset('Comentarios:');
			echo form_label('Rechazo: ');
			echo $item->rechazo;
			echo '<br /><br />';
			echo form_label('Observaciones: ');
			echo $item->obs;
			echo form_fieldset_close();
			?>
	</section>
</section>