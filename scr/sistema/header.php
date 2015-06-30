<?php require_once 'funciones.php'; ?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<link rel="icon" image="type/ico" href="<?php echo sitio(); ?>favicon.ico" />
		<meta charset="UTF-8">

		<title> <?php if(isset($titulo_pagina)){ echo "$titulo_pagina"; }?> </title>

		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="author" content="Mauricio Antonio Ghilardi" />
		<link rel="stylesheet" href="<?php sitio(); ?>css/normalize.css" />
		<link rel="stylesheet" href="<?php sitio(); ?>css/main.css" />
		<script type="text/javascript" src="<?php sitio(); ?>js/main.js"> </script>

	</head>
	<body onload="inicializar()">

<nav>
	<ul class="menus" role="navigation">
		<li><a href="<?php sitio(); ?>">#</a></li>
		<li><a href="<?php sitio(); ?>m/index.html">Movil</a></li>
		<li>
			<a href="<?php sitio(); ?>sistema/rechazos.php?tipo=solucionado">Rechazados</a>
			<ul class="menus">
				<a href="<?php sitio(); ?>sistema/rechazos.php?tipo=completo">Completo</a>
				<li><a href="<?php sitio(); ?>sistema/consulta.php?Tipo=6&valorconsulta=Rechazos">Listado rechazados</a></li>
			</ul>
		</li>

		<li><a href="<?php sitio(); ?>sistema/carga_certificados.php">Carga de certificados</a></li>
		<li><a href="<?php sitio(); ?>sistema/liquidacion.php">Liquidación</a></li>
		<li><a href="<?php sitio(); ?>sistema/config.php">Config</a></li>
		<li><a href="<?php sitio(); ?>asociados/index.php">Asociados</a></li>
		<li><a href="<?php sitio(); ?>sistema/turnos.php?op=consulta">Turnos</a></li>
		<li><a href="<?php sitio(); ?>sistema/Documentacion.html">Doc</a></li>

	</ul>

	<div class="version">
		<?php

			// if ($_SESSION["autentificado"] = 'SI') {
			//  	echo $_SESSION["usuario"]. '  ';
			// } else {
			// 	echo '<a href="' . RAIZ_SITIO . 'sistema/login.php"></a>  ';
			// }

			echo date("D  d-m-Y");
		?>
		<br>
		Ver: 2.6.1
	</div>
</nav>

<header>
	<div class="encabezado">
		<img src="<?php sitio(); ?>image/aprocam_logo.png" alt="APROCAM" height=81px width=159px />

		<?php if (MODO_LOCAL) { echo '<br><strong>local</strong>'; } ?>

	</div>
	<div id="fecha"></div>
</header>