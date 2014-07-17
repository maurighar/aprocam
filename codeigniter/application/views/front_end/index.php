<section class="contenido">

	<?
	$buscar = array(
		'name'        => 'valorconsulta',
		'id'          => 'valorconsulta',
		'value'       => '',
		'placeholder' => 'Valor a buscar ',
		);

	$tipo = array(
		'1'  => 'Por nombre',
		'2'  => 'Por CUIT',
		'3'  => 'Por dominio',
		'4'  => 'Por expediente',
		'5'  => 'Por lote',
		'6'  => 'Por rechazos activos',
		'dp' => 'Por dominio parcial',
		);

	echo form_open("ruta");
	echo form_fieldset('Consulta Normal');
	?>

	<div class="flota">
		<? echo form_label('Tipo: ', 'tipo');
		echo form_dropdown('tipo', $tipo, ''); ?>
	</div>

	<div class="flota">
		<? echo form_label('Buscar: ', 'valorconsulta');
		echo form_input($buscar);?>
	</div>


	<div class="clear">
	<?= form_submit('', 'Buscar');?>
	</div>

	<? echo form_fieldset_close();
	echo form_close(); ?>

</section>