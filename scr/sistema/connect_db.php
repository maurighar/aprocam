<?php
	
	#$server='admin03';
	$server='localhost';
	$usuario='aprocam';
	$pass='aprocam2010';
	$base_ruta='aprocam';

	$mysqli = new mysqli($server, $usuario, $pass, $base_ruta);

	if ($mysqli->connect_errno) {
		echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	/* change character set to utf8 */
	if (!$mysqli->set_charset("utf8")) {
	    printf("Error loading character set utf8: %s\n", $mysqli->error);
	}

?>