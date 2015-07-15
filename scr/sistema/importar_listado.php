<?php
$titulo_pagina = 'Importación - Control';
require 'header.php'; ?>

<table>
	<thead>
		<tr>
			<th>Orden</th>
			<th>Importación</th>
		</tr>
	</thead>
	<tbody>

	<?php
	$fila = 1;
	$contador = 0;
	require 'connect_db.php';
	if (($gestor = fopen("listado_sistema.csv", "r")) !== FALSE) {
		while (($datos = fgetcsv($gestor, 1000, ',','"')) !== FALSE) {
			$numero = count($datos);

			if ($fila != 1) {
				$contador++;
				echo "<tr> <td> $contador </td>";
				$expediente = $datos[0];
				$fecha = $datos[1];
				$cuit = $datos[2];
				$nombre = $datos[3];
				$cerrado = $datos[4];
				$form = $datos[5];
				$lote = $datos[6];

				$select = "INSERT INTO lista_expdientes (expediente, fecha, cuit, nombre, cerrado, formularios, lote) VALUES ($expediente, '$fecha', $cuit, '$nombre', '$cerrado', '$form', $lote)";
				if($marcado = $mysqli->query("$select")) {
					echo '<td class="pinta_verde">';
					echo "Se importo correctamente $expediente" ;
				}else{
					echo '<td class="pinta_rojo">';
					echo "<strong>No se importo correctamente $expediente</strong>" ;
				}

				echo '</td> </tr>';
			}
			$fila++;
		}
		fclose($gestor);
		$mysqli->close();
	}
	?>
	<tfoot>
		<tr> <td colspan="2" rowspan="1">
			<?php echo "TOTAL: $contador"; ?>
		</td> </tr>
	</tfoot>

	</tbody>
</table>

<?php require 'footer.php'; ?>