<!DOCTYPE html>
<html lang="es">
	<head>
		<title>RUTA - Liquidación</title>
		<link rel="icon" image="type/ico" href="../favicon.ico" />
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/normalize.css" />
		<link rel="stylesheet" href="../css/main.css" />

		<script type="text/javascript" src="js/main.js"> </script>
	</head>
 
	<body onload="inicializar()">
		<?php require '../encabezado.php'; ?>
	
		<section>
			<fieldset >
				<legend>Datos liquidación</legend>
				<a  class="enlace_boton" href="liquida_cabecera.php">Ingresar</a>
			</fieldset>

			<fieldset >
				<legend>Imprimir liquidación</legend>
				<form method="get" action="liquida_imprime.php" enctype="application/x-www-form-urlencoded">
					<label>Buscar:</label>
					<input type="text" name="lote" placeholder="Ingrese el Nº de lote" required/> 
					
					<input type="submit" name="submit" value="Buscar" /></a>
				</form>
			</fieldset>

			<fieldset >
				<legend>Controlar liquidación</legend>
				<form method="get" action="liquida_control.php" enctype="application/x-www-form-urlencoded">
					<label>Buscar:</label>
					<input type="text" name="lote" placeholder="Ingrese el Nº de lote" required/> 
					
					<input type="submit" name="submit" value="Buscar" /></a>
				</form>
			</fieldset>


		</section>

		<?php require 'footer.php'; ?>

	</table>

	</body>
</html>
