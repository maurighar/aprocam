<!DOCTYPE html>
<html lang="es">
	<head>
		<!-- <link rel="icon" image="type/ico" href="../favicon.ico" /> -->
		<meta charset="UTF-8">

 		<?php echo "<title>$titulo</title>"; ?>

		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="author" content="MAG" />
		<link rel="stylesheet" href="<?php echo BASE_URL;?>resource/css/main.css" />
		<script type="text/javascript" src="<?php echo BASE_URL;?>resource/js/main.js"> </script>
	</head>
	<body>
<nav>
	<ul class="menus">
		<li><a href="<?php  echo BASE_URL; ?>">#</a></li>

	</ul>

	<div class="version">
		<?php
			echo date("D  d-m-Y");
		?>
		<br>
		Ver: 2.0.1
	</div>
</nav>

<header>
<h1>Codeigniter</h1>
</header>