<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Socios - Empresa</title>
		<link rel="icon" image="type/ico" href="../favicon.ico" />
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/normalize.css" />
		<link rel="stylesheet" href="../css/main.css" />
	</head>

	<body>
		<?php 
			require '../encabezado.php';

			$valor_id = $_GET["cuit"] ;

			require '../sistema/connect_db.php';

			$resultado = $mysqli->query("SELECT * FROM empresas WHERE cuit = $valor_id");
			$fila = $resultado->fetch_assoc();
		?>
	
		<section>
			<div>
				<h1>
					Esta seguro de realizar la baja. <br>
					CUIT: <?php echo $fila['cuit']?> <br>
					Razon Social: <?php echo $fila['nombre']?><br><br>

					<a href="empresa_baja2.php?cuit=<?php echo $fila['cuit']?>" class="enlace_boton">Baja</a>
				</h1>
			</div>
		</section>

		<?php require '../sistema/footer.php'; ?>
	</body>
</html>
<!-- <a href="empresa.php?cuit=<?php echo $fila['cuit'] ; ?>">Modificar</a> -->