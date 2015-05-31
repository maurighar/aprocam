<?php
$titulo_pagina = 'Sistema RUTA';
require 'header.php'; ?>

<?php
	$nro_lote = $_GET["lote"] ;

	require 'connect_db.php';
?>

<section>
	<h1>
		Lote <?php echo $nro_lote?>
	</h1>

	<div class="divisor">
		<a class="enlace_boton" href="liquida_controlar.php?lote=<?php echo $nro_lote; ?>">Generar control</a>
		<a class="enlace_boton" href="liquida_modifica.php?lote=<?php echo $nro_lote; ?>">Modifica Lote</a>
		<a class="enlace_boton" href="liquida_listado.php?lote=<?php echo $nro_lote; ?>&sinordenar=SI">Procesar</a>
		<a class="enlace_boton" href="liquida_imprime_rptc.php?lote=<?php echo $nro_lote; ?>&sinordenar=NO">Imprimir Liquidación</a>
		<a class="enlace_boton" href="liquida_imprime.php?lote=<?php echo $nro_lote; ?>&sinordenar=SI">Imprimir Sin Ordenar</a>
	</div>

	<div class="divisor">
		<?php
			$_selec = "SELECT * FROM liquidacion WHERE liquidacion = $nro_lote";
			$resultado = $mysqli->query("$_selec");

			$liquida = $resultado->fetch_assoc();
			$id_liquida = $liquida['id'];

			if ($resultado->num_rows===0)
				header("Location: msg_error.php?mensaje=No se encuentra la liquidacón $nro_lote&tipo=Error");
			if ($resultado->num_rows>1)
				header("Location: msg_error.php?mensaje=Hay mas de una liquidacón $valor&tipo=Error");
			echo 'Nº de liquidación: ' . $liquida['liquidacion'] . '<br>';
			echo 'Lote altas: ' . $liquida['alta'] . '<br>';
			echo 'Lote revalidas: ' . $liquida['revalida'] . '<br>';
			echo 'Fecha de cierre: ' . $liquida['fecha'];
		?>
	</div>

<?php require 'liquida_totales.php'; ?>


</section>

<?php require 'footer.php'; ?>