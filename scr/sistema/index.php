<?php
	$titulo_pagina = 'Sistema RUTA';
	require 'header.php';
?>
	</head>

	<body onload="inicializar()">
		<?php require 'encabezado.php'; ?>

		<section class="main-content">

			<section class="news">
			<h1 id="cabecera">Sistema RUTA</h1>
				<div>
					<form method="get" action="consulta.php" enctype="application/x-www-form-urlencoded">
						<fieldset>
							<legend>Consulta Normal</legend>

							<div class="flota">
								<label> Tipo:</label>
								<select NAME="Tipo">
									<option value=1>Por nombre</option>
									<option value=2>Por CUIT</option>
									<option value=3>Por dominio</option>
									<option value=4>Por expediente</option>
									<option value=5>Por lote</option>
									<option value=6>Por rechazos activos</option>
									<option value="dp">Por dominio parcial</option>
								</select>
							</div>

							<div class="flota">
								<label>Buscar:</label>
								<input type="text" name="valorconsulta" placeholder="Valor a buscar" required />
							</div>

							<div class="clear">
								<input type="submit" name="submit" value="Buscar" />
							</div>
						</fieldset>
					</form>
				</div>

				<div>
					<form method="get" action="consulta_old.php" nctype="application/x-www-form-urlencoded">
						<fieldset>
							<legend>Consulta Sistema anterior</legend>

							<div class="flota">
								<label> Tipo:</label>
								<select NAME="Tipo">
									<option value=1> Por nombre</option>
									<option value=2> Por CUIT</option>
									<option value=3> Por dominio</option>
									<option value=4> Por expediente</option>
								</select>
							</div>

							<div class="flota">
								<label>Buscar:</label>
								<input type="text" name="valorconsulta" placeholder="Valor a buscar" required/>
							</div>

							<div class="clear">
							<input type="submit" value="Buscar">
						</fieldset>
					</form>
				</div>

				<div>
					<form method="get" action="consulta_ss.php" nctype="application/x-www-form-urlencoded">
						<fieldset>
							<legend>Consulta tramites sin sistema</legend>

							<div class="flota">
								<label> Tipo:</label>
								<select NAME="Tipo">
									<option value=1> Por nombre</option>
									<option value=2> Por dominio</option>
									<option value=3> Por expediente</option>
								</select>
							</div>

							<div class="flota">
								<label>Buscar:</label>
								<input type="text" name="valorconsulta" placeholder="Valor a buscar" required />
							</div>

							<div class="clear">
								<input type="submit" value="Buscar" />
							</div>
						</fieldset>
					</form>
				</div>

			</section>

			<div class="widgets">
				<a href="http://ruta.cent.gov.ar/" target="_blank">
					<img src="../image/ruta.png" alt="RUTA" width=70px />
				</a>
				<br /> <br />
				<a href="http://www.aprocam.org.ar/" target="_blank">
					<img src="../image/aprocam_logo.png" alt="RUTA" width=70px />
				</a>
				<br /> <br />
				<img src="../image/afip.png" alt="AFIP"  width=70px /><br />
				<a href="https://seti.afip.gob.ar/padron-puc-constancia-internet/ConsultaConstanciaAction.do" target="_blank">Constacia</a><br />
				<a href="http://www.afip.gov.ar/mercurio/consultapadron/buscarcontribuyente.aspx" target="_blank">Padrón AFIP</a>
			</div>

		</section>

	<?php require 'footer.php'; ?>

	</body>
</html>