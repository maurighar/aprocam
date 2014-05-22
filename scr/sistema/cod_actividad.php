<?php require 'header.php'; ?>

		<title>Nomenclador de Actividad</title>
		<link rel="stylesheet" href="../css/caja_busqueda.css" />
	</head>

	<body>
		<?php require '../encabezado.php'; ?>


		<section>
			<form class="form_busqueda" method="get" action="" enctype="application/x-www-form-urlencoded">
				<input type="text" id="search" name="cod_actividad" placeholder="Codigo de actividad" required>
				<input type="submit" value="go" id="submit">
			</form>
		</section>

		<?php
			if (isset( $_GET["cod_actividad"])){

				require '../config/connect_db.php';
				$resultado = $mysqli->query("SELECT * FROM aprocam.actividades WHERE id = " . $_GET["cod_actividad"]);
				$fila = $resultado->fetch_assoc();
				echo '<div class="divisor">';
				echo '<br />';
				echo $fila['id'];
				echo '<br /><br />';
				echo $fila['detalle'];
				echo '<br /><br />';
				echo $fila['incluye'];
				echo '<br /><br />';
				echo '</div>';

			}

		?>



		<footer class="webmaster">
			APACHE WebServer + PHP + MySQL<br /><br />
			Desarrollado por Mauricio A. Ghilardi <br />
			Twitter: <a rel="author" href="http://twitter.com/maurighar" target="_blank">@maurighar</a><br />
			2013
		</footer>

	</body>
</html>
