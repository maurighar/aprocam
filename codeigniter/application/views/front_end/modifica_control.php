<?php
foreach ($control as $item):
	$nombre = array(
		'name'        => 'nombre',
		'id'          => 'nombre',
		'value'       => $item->nombre,
		'required' 	  => NULL,
		);





	// if (isset( $_GET["mensaje"])){
	// 	mensaje_actualizacion($_GET["mensaje"]>0);
	// }
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
		echo form_open("ruta_control/modificar_carga");
		echo form_fieldset('Carga de datos');
		?>
		<div class="flota">
			<? echo form_label('Razón social: ', 'nombre');
			echo form_input($nombre);?>
		</div>


			<? echo form_fieldset_close();
			echo form_close(); ?>
		</section>

		<section>
			<fieldset>
				<legend>Comentarios:</legend>

					<label>Rechazo:</label>
					<?= $item->rechazo; ?>

				<br /><br />
					<label>Observaciones</label>
					<?= $item->obs; ?>
			</fieldset>
	</section>
	<? endforeach; ?>
</section>

