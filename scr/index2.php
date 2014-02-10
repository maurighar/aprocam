<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Sistema RUTA</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="icon" image="type/ico" href="favicon.ico" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<!--<link rel="stylesheet" href="css/main.css" /> -->
	</head>

	<body>


<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Brand</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
          <li class="divider"></li>
          <li><a href="#">One more separated link</a></li>
        </ul>
      </li>
    </ul>
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>








 		<?php require 'encabezado.php'; ?>

		<section class="main-content">
			<section class="news">
				<div>
					<form method="get" action="sistema/consulta.php" enctype="application/x-www-form-urlencoded">
						<fieldset class="form-group">
							<legend>Consulta Normal</legend>

							
							<label> Tipo:</label>
							<select NAME="Tipo" class="form-control"> 
								<option value=1>Por nombre</option>
								<option value=2>Por CUIT</option>
								<option value=3>Por dominio</option>
								<option value=4>Por expediente</option>
								<option value=5>Por lote</option>
								<option value=6>Por rechazos activos</option>
								<option value="dp">Por dominio parcial</option>
							</select>

							<br />
							<label>Buscar:</label>
							<input type="text" name="valorconsulta" placeholder="Valor a buscar"/> 
							<br /> 
							<input type="submit" name="submit" value="Buscar" class="btn btn-primary"/>
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

							<br />
							<label>Buscar:</label>
							<input type="text" name="valorconsulta" placeholder="Valor a buscar"> 
							<br /> 
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

							<br /> 
							<label>Buscar:</label>
							<input type="text" name="valorconsulta" placeholder="Valor a buscar"/> 
							<br /> 
							<input type="submit" value="Buscar" /> 
						</fieldset>
					</form>
				</div>

				<?php   
					#consulto el archivo ini de la configuración
					$config_ini = parse_ini_file("config/config.ini");
					$mysqli = new mysqli($config_ini['server'], $config_ini['usuario'], $config_ini['pass'], $config_ini['base_ruta']);

					if ($mysqli->connect_errno) {
						echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
					} else {
						echo " MySQL Conectado OK";
					}
				?>

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
