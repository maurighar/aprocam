<?php require '../sistema/header.php'; ?>
		<title>Socios - Unidades Baja</title>
	</head>

	<body>
		<?php
			require '../encabezado.php';

			$valor_id = $_GET["id"] ;

			require '../sistema/connect_db.php';

			$resultado = $mysqli->query("SELECT * FROM unidades WHERE id = $valor_id");
			$fila = $resultado->fetch_assoc();
		?>

		<section>
			<div>
				<h1>
					Esta seguro de realizar la baja. <br>
					Dominio: <?php echo $fila['dominio']?><br><br>

					<a href="unidades_baja2.php?id=<?php echo $fila['id'] . '&cuit=' . $fila['cuit']; ?>" class="enlace_boton">Baja</a>
				</h1>
			</div>
		</section>

		<?php require '../sistema/footer.php'; ?>
	</body>
</html>
<!-- <a href="empresa.php?cuit=<?php echo $fila['cuit'] ; ?>">Modificar</a> -->