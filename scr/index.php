<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Sistema RUTA</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<link rel="icon" image="type/ico" href="favicon.ico" />
		<link rel="stylesheet" href="css/normalize.css" />
		<link rel="stylesheet" href="css/main.css" />
	</head>

	<body>
		<?php require 'encabezado.php'; ?>

		<section class="main-content">
			<section class="news">
				<div>
					<form method="get" action="sistema/consulta.php" enctype="application/x-www-form-urlencoded">
						<fieldset>
							<legend>Consulta Normal</legend>

							
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

							
							<label>Buscar:</label>
							<input type="text" name="valorconsulta" placeholder="Valor a buscar"/> 
							
							<input type="submit" name="submit" value="Buscar" />
						</fieldset>
					</form>
				</div>

				<div>
					<form method="get" action="sistema/consulta_old.php" nctype="application/x-www-form-urlencoded"> 
						<fieldset>
							<legend>Consulta Sistema anterior</legend>

							<label> Tipo:</label>
							<select NAME="Tipo"> 
								<option value=1> Por nombre</option>
								<option value=2> Por CUIT</option>
								<option value=3> Por dominio</option>
								<option value=4> Por expediente</option>
							</select>

							<label>Buscar:</label>
							<input type="text" name="valorconsulta" placeholder="Valor a buscar"> 
							<input type="submit" value="Buscar"> 
						</fieldset>
					</form>
				</div>

				<div>
					<form method="get" action="sistema/consulta_ss.php" nctype="application/x-www-form-urlencoded"> 
						<fieldset>
							<legend>Consulta tramites sin sistema</legend>
							
							<label> Tipo:</label>
							<select NAME="Tipo"> 
								<option value=1> Por nombre</option>
								<option value=2> Por dominio</option>
								<option value=3> Por expediente</option>
							</select>

							<label>Buscar:</label>
							<input type="text" name="valorconsulta" placeholder="Valor a buscar"/> 
							<input type="submit" value="Buscar" /> 
						</fieldset>
					</form>
				</div>

			</section>

			<div class="widgets">
				<a href="http://ruta.cent.gov.ar/" target="_blank">
					<img src="image/ruta.png" alt="RUTA" width=70px />
				</a>
				<br /> <br /> 
				<a href="http://www.aprocam.org.ar/" target="_blank">
					<img src="image/aprocam_logo.png" alt="RUTA" width=70px />
				</a>
				<br /> <br /> 
				<img src="image/afip.png" alt="AFIP"  width=70px /><br />
				<a href="https://seti.afip.gob.ar/padron-puc-constancia-internet/ConsultaConstanciaAction.do" target="_blank">Constacia</a><br />
				<a href="http://www.afip.gov.ar/mercurio/consultapadron/buscarcontribuyente.aspx" target="_blank">Padrón AFIP</a>
			</div>

		</section>
		
	<?php require 'sistema/footer.php'; ?>

	</body>
</html>