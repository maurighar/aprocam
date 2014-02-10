<!DOCTYPE html>
<html lang="es">
	<head>
		<title>RUTA - Observaciones</title>
		<link rel="icon" image="type/ico" href="../favicon.ico" />
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/normalize.css" />
		<link rel="stylesheet" href="../css/main.css" />
	</head>

	<body>

		<?php
			require 'ver_obs_modif.php';
			require '../encabezado.php';
		
			$valor_id = $_GET["id"] ;

			require 'connect_db.php';	
			$resultado = $mysqli->query("SELECT * FROM aprocam.control WHERE id = " . $valor_id);
			$fila = $resultado->fetch_assoc();

		?>

		<form class="divisor" method="post" action="?id=<?php echo $fila['id']?>" enctype="application/x-www-form-urlencoded">
			<label>Empresa</label>
			<?php echo $fila['nombre']; ?>
			<br />
			<label>CUIT:</label>
			<?php echo $fila['cuit']; ?>
			<br />
			<label>Dominio:</label>
			<?php echo $fila['dominio']; ?>
			<br />
			<label>Fecha:</label>
			<?php echo $fila['fecha']; ?>
			<br /><br />
			<label>Obser.:</label>
			<br />
	
			<textarea cols="50" rows="10" name="Obs"><?php echo ltrim($fila['obs']); ?></textarea>
			<br />
			<br />
			
			<input type="submit" name="submit" value="Confirmar" />
		</form>

		<a href="javascript:history.back()"> Volver Atrás</a> 
	</body>
</html>
