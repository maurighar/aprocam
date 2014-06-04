<?php require 'header.php'; ?>

		<title>RUTA - Liquidación Modificación</title>
	</head>

	<body onload="inicializar()">
		<?php
			require 'encabezado.php';

			require 'mensaje.php';

			if (isset( $_GET["mensaje"])){
				mensaje_actualizacion($_GET["mensaje"]>0);
			}

			$valor = $_GET["lote"];
			require 'connect_db.php';
			$_selec = "SELECT * FROM liquidacion WHERE liquidacion = $valor";
			$resultado = $mysqli->query("$_selec");

			$fila = $resultado->fetch_assoc();
			$id_liquida = $fila['id'];

			if ($resultado->num_rows===0)
				exit("<p class=\"mensaje_mal\">No se encuentra la liquidacón $valor.</p>");
			if ($resultado->num_rows>1)
				exit("Hay mas de una liquidacón $valor.");
			?>

		<section class="divisor">
			<a  class="enlace_boton" href="#">Baja</a>
		</section>


		<section id="Modificacion">
		<form method="post" action="liquida_modifica_graba.php?id=<?php echo $id_liquida?>" enctype="application/x-www-form-urlencoded">
			<fieldset>
				<legend>Liquidación</legend>

				<div class="flota">
					<label for="liquidacion">Nº de liquidación: </label>
					<input type="text" id="liquidacion" name="liquidacion_txt" value="<?php echo $fila['liquidacion']?>" placeholder="Número de liquidación" title="Número de liquidación" required />
				</div>

				<div class="flota">
					<label for="alta">Lote altas: </label>
					<input type="text" id="alta" name="alta_txt" value="<?php echo $fila['alta']?>" placeholder="Número de lote altas" title="Número de lote altas" required />
				</div>

				<div class="clear flota">
					<label for="revalidas">Lote revalidas: </label>
					<input type="text" id="revalidas" name="revalidas_txt" value="<?php echo $fila['revalida']?>" placeholder="Número de lote revalidas" title="Número de lote revalidas" required />
				</div>

				<div class="flota">
					<label for="fecha">Fecha de cierre: </label>
					<input type="text" id="fecha" name="fecha_txt" value="<?php echo $fila['fecha']?>" placeholder="Fecha de cierre" title="Fecha de cierre" required />
				</div>

				<div class="clear"><input type="submit" id="envia-alta" name="enviar_btn" value=" Agregar " /></div>
			</fieldset>
		</form>


		</section>

		<?php require 'footer.php'; ?>

	</body>
</html>
