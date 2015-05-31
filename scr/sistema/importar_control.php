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
	if (($gestor = fopen("importar.csv", "r")) !== FALSE) {
		while (($datos = fgetcsv($gestor, 1000, ',','"')) !== FALSE) {
			$numero = count($datos);

			if ($fila != 1) {
				$contador++;
				echo "<tr> <td> $contador </td>";
				$expediente = $datos[0];
				$nombre = $datos[1];
				$cuit = $datos[2];
				$dominio = $datos[3];
				$tipo = $datos[4];
				$fecha = $datos[5];
				$rptc = $datos[6];
				$lote = $datos[7];

				$select = "INSERT INTO control (expediente, nombre, cuit, dominio, tipo, fecha, rptc, lote) VALUES ($expediente, '$nombre', $cuit, '$dominio', '$tipo', '$fecha', $rptc, $lote)";
				if($marcado = $mysqli->query("$select")) {
					echo '<td class="pinta_verde">';
					echo "Se importo correctamente $expediente - $dominio" ;
				}else{
					echo '<td class="pinta_rojo">';
					echo "<strong>No se importo correctamente $expediente - $dominio</strong>" ;
				}

				if (!validarCUIT($cuit)) {
					echo "<br><strong>CUIT no valido - Verificar $cuit</strong>" ;
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