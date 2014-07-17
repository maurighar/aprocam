<section class="contenido">
	<?
		echo "<p>";
		echo  "Empresa: " . $item->nombre . "<br>";
		echo  "CUIT: " . $item->cuit . "<br>";
		echo  "Dominio: " . $item->dominio . "<br>";
		echo  "Fecha: " . $item->fecha . "<br>";
		echo  "Causa del rechazo: " . $item->rechazo;
		echo "</p>";
	?>
	<br />
	<a href="javascript:history.back()"> Volver Atrás</a>
</section>