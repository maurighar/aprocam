<?php
$titulo_pagina = "Validación de CUITs";
require 'header.php'; ?>

<table>
	<thead>
		<tr>
			<th>Errores</th>
		</tr>
	</thead>
	<tbody>

	<?php
		require 'connect_db.php';

		$resultado = $mysqli->query("SELECT  * FROM aprocam.control");
		while ($fila = $resultado->fetch_assoc()) {
			if (!validarCUIT($fila['cuit'])) {
				echo '<tr> <td>';
				echo '<strong>Error expediente ';
				echo '<a href="modificar.php?id='. $fila['id'] .'">'. $fila['expediente'] .'</a></strong>' ;
				echo '</td> </tr>';
			}
		}

		$mysqli->close();
	?>
	</tbody>
</table>

<?php require 'footer.php'; ?>>


