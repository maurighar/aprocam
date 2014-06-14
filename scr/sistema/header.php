<?php require_once 'funciones.php'; ?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<link rel="icon" image="type/ico" href="../favicon.ico" />
		<meta charset="UTF-8">

		<?php
			if(isset($titulo_pagina)){
				echo "<title>$titulo_pagina</title>";
			}
		?>

		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<link rel="stylesheet" href="../css/normalize.css" />
		<link rel="stylesheet" href="../css/main.css" />
		<script type="text/javascript" src="../js/main.js"> </script>