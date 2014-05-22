<?php require 'header.php'; ?>
		<title>RUTA - Liquidación</title>
	</head>

	<body onload="inicializar()">
		<?php require '../encabezado.php'; ?>

		<section>
			<fieldset >
				<legend>Datos liquidación</legend>
				<a  class="enlace_boton" href="liquida_cabecera.php">Cargar</a>
			</fieldset>

			<div class="divisor">
				<?php
					require 'connect_db.php';
					$resultado = $mysqli->query("SELECT * FROM liquidacion ORDER BY liquidacion DESC LIMIT 10" );
				?>

				<table id="consulta_liquidacion">
					<thead>
						<tr>
							<th>Liquidación</th>
							<th>Fecha</th>
							<th>..</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($fila = $resultado->fetch_assoc()) { ?>
						<tr>
							<td> <?php echo $fila['liquidacion']?> </td>
							<td> <?php echo $fila['fecha']?> </td>
							<td> <a href="liquida_control.php?lote=<?php echo $fila['liquidacion']; ?>">Consultar</a> </td>
						</tr>
						<?php } ?>
					</tbody>
					<tfoot>
						<td align=right colspan="5" rowspan="1">
						Desarrollado por Mauricio A. Ghilardi
						</td>
					</tfoot>
				</table>
			</div>

			<fieldset >
				<legend>Controlar liquidación</legend>
				<form method="get" action="liquida_control.php" enctype="application/x-www-form-urlencoded">
					<label>Liquidación:</label>
					<input type="text" name="lote" placeholder="Ingrese el Nº de lote" required/>

					<input type="submit" name="submit" value="Buscar" /></a>
				</form>
			</fieldset>


		</section>

		<?php require 'footer.php'; ?>

	</table>

	</body>
</html>
