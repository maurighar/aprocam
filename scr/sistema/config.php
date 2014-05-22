<?php require 'header.php'; ?>
		<title>RUTA - Configuración</title>
	</head>

	<body>
		<?php require '../encabezado.php'; ?>

		<section>
			<fieldset>
				<legend>Importación</legend>
				<p>
					Antes de importar se debe generar el archivo <a href="importar.csv" target="_blank">importar.csv</a>. <br>
					<a href="importar_control.php" class="enlace_boton" target="_blank">Importar Control</a>
				</p>
			</fieldset>

			<fieldset>
				<legend>Importación Rechazos</legend>
				<p>
					Antes de importar se debe generar el archivo <a href="rechazo.csv" target="_blank">rechazo.csv</a>. <br>
					<a href="importar_rechazo.php" class="enlace_boton" target="_blank">Importar Rechazo</a>
				</p>
			</fieldset>

			<fieldset>
				<legend>Validar CUIT</legend>
				<p>
					Valida los números de CUIT de la base de datos.<br>
					<a href="config_valida_cuit.php" class="enlace_boton" target="_blank">Validar</a>
				</p>
			</fieldset>

		</section>

		<?php require 'footer.php'; ?>

	</table>

	</body>
</html>
