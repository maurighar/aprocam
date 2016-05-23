<?php
$titulo_pagina = 'RUTA - Temporal';
require 'header.php';
?>


<?php
	$_selec = 'SELECT tipo, count(1) as cant FROM aprocam.tempo_control group by tipo order by tipo';
	require 'connect_db.php';
	$resultado = $mysqli->query("$_selec");

	if ($resultado->num_rows === 0) {
		header("Location: msg_error.php?mensaje=La busqueda no arrojo resultados&tipo=OK");
	}
?>

<h1>Cantidad de Tramites x Tipo</h1>
<table caption="Cantidad de Tramites">
	<thead>
		<tr>
			<th>Tipo</th>
			<th>Cantidad</th>
		</tr>
	</thead>
	<tbody>
		<?php while ($linea = $resultado->fetch_object()) { ?>
			<tr>
				<td bgcolor=<?php echo color_tipo($linea->tipo)?>>
					<?php echo $linea->tipo?>
				</td>

				<td class="al_derecha"> <?php echo $linea->cant;?> </td>
			</tr>

		<?php } ?>

	</tbody>

	<tfoot>
		<td align=right colspan="2" rowspan="1">
			Desarrollado por Mauricio A. Ghilardi
		</td>
	</tfoot>

</table>



<?php require 'footer.php'; ?>
