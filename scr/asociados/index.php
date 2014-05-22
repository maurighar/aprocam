<?php require '../sistema/header.php'; ?>
		<title>Socios</title>

	</head>

	<body>
		<?php require '../encabezado.php'; ?>

			<section class="main-content">
				<div class="news">
					<h1 id="cabecera">Asociados</h1>

					<div class="divisor">
						<a href="empresa_alta.php" class="enlace_boton">Alta empresas</a>
						<a href="importar_unidades.php" class="enlace_boton">Importar unidades</a>

						<p>Antes de importar se debe generar el archivo <a href="unidades.csv" target="_blank">unidades.csv</a>. </p>
					</div>

					<form method="get" action="socio_consulta.php" enctype="application/x-www-form-urlencoded">
						<fieldset>
							<legend>Consulta empresas</legend>

							<div class="flota">
								<label> Tipo:</label>
								<select NAME="Tipo">
									<option value='nombre'>Por nombre</option>
									<option value='cuit'>Por CUIT</option>
									<option value='socio'>Por Nº de socio</option>
								</select>
							</div>

							<div class="flota">
								<label>Buscar:</label>
								<input type="text" name="valorconsulta" placeholder="Valor a buscar"/>
							</div>

							<div class="clear">
								<input type="submit" name="submit" value="Buscar" />
							</div>

						</fieldset>
					</form>
				</div>

		</section>

		<?php require '../sistema/footer.php'; ?>

	</body>
</html>
