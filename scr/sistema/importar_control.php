<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Importación</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<link rel="icon" type="image/ico" href="../favicon.ico">
		<link rel="stylesheet" href="../css/main.css" />
	</head>
	<body>

		<table>
			<thead>
				<tr>
					<th>Importación</th>
				</tr>
			</thead>
			<tbody>

			<?php
			$fila = 1;
			require 'connect_db.php';
			if (($gestor = fopen("importar.csv", "r")) !== FALSE) {
				while (($datos = fgetcsv($gestor, 1000, ',','"')) !== FALSE) {
					$numero = count($datos);

					if ($fila != 1) {
						$expediente = $datos[0];						
						$nombre = $datos[1];
						$cuit = $datos[2];
						$dominio = $datos[3];
						$tipo = $datos[4];
						$fecha = $datos[5];
						$lote = $datos[6];

						$select = "INSERT INTO control (expediente, nombre, cuit, dominio, tipo, fecha, lote) VALUES ($expediente, '$nombre', $cuit, '$dominio', '$tipo', '$fecha', $lote)";
						if($marcado = $mysqli->query("$select")) {
							echo '<tr> <td class="pintra_rojo">';
							echo "Se importo correctamente $expediente - $dominio" ;
						}else{
							echo '<tr> <td class="pintra_verde">';
							echo "<strong>No se importo correctamente $expediente - $dominio</strong>" ;
						} 
						echo '</td> </tr>';
					}
					$fila++;
				}
				fclose($gestor);
				$mysqli->close();
			}
			?>
			</tbody>
		</table>
	</body>
</html>

