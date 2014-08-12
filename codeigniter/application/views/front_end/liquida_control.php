<section class="contenido">

			<h1>
				Liquidación Nº <?= $lote;?>
			</h1>

			<div class="divisor">
				<a class="enlace_boton" href="<?= base_url()?>liquida/control_exped/<?= $lote;?>">Generar control</a>
				<a class="enlace_boton" href="liquida_modifica.php?lote=<?= $lote;?>">Modifica Lote</a>
				<a class="enlace_boton" href="liquida_listado.php?lote=<?= $lote;?>&sinordenar=SI">Listado de control</a>
				<a class="enlace_boton" href="liquida_imprime.php?lote=<<?= $lote;?>&sinordenar=NO">Imprimir Liquidación</a>
				<a class="enlace_boton" href="liquida_imprime.php?lote=<<?= $lote;?>&sinordenar=SI">Imprimir Sin Ordenar</a>
			</div>

			<div class="divisor">
				<? echo 'Nº de liquidación: ' . $liquida->liquidacion . '<br>';
					echo 'Lote altas: ' . $liquida->alta . '<br>';
					echo 'Lote revalidas: ' . $liquida->revalida . '<br>';
					echo 'Fecha de cierre: ' . $liquida->fecha; ?>
			</div>



</section>