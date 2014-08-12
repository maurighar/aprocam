<!DOCTYPE html>
<html lang="es">
	<head>
		<link rel="icon" image="type/ico" href="<?= BASE_URL;?>favicon.ico" />
		<meta charset="UTF-8">

 		<?php echo "<title>$titulo</title>"; ?>

		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="author" content="MAG" />
		<link rel="stylesheet" href="<?= BASE_URL;?>resource/css/main.css" />
		<script type="text/javascript" src="<?= BASE_URL;?>resource/js/main.js"> </script>
	</head>
	<body>
<nav>
	<ul class="menus">
		<li><a href="<?= BASE_URL; ?>">#</a></li>
		<li><a href="<?= BASE_URL. 'rechazo'; ?>">Rechazos</a>
			<ul class="menus">
				<li><a href="<?= BASE_URL. 'rechazo/completo'; ?>">Completo</a></li>
				<li><a href="<?= BASE_URL. 'ruta/index/6'; ?>">Consulta</a></li>
			</ul>
		</li>
		<li><a href="<?= BASE_URL. 'liquida'; ?>">Liquidación</a></li>
		<li><a href="old/">Old</a></li>
		<li><a href="/help/guia-ci-spanish/">Help</a></li>

	</ul>

	<div class="version">
		<?= date("D  d-m-Y");?>
		<br>
		Ver: 2.1.3
	</div>
</nav>

<header>
<h1><img src="<?= BASE_URL;?>resource/img/aprocam_logo.png" alt="APROCAM" height=81px width=159px />
</h1>
<?if (MODO_LOCAL) echo '<h2>Local</h2>';?>
</header>