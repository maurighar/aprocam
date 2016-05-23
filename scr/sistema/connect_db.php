<?php
	/*  Archivo con las configuraciónes generales del sistema  */
	require_once 'sys_config.php';

	$mysqli = new \mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if ($mysqli->connect_errno) {
		$mensaje = "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		header("Location: msg_error.php?mensaje=$mensaje&tipo=Error");
	}

	/* change character set to utf8 */
	if (!$mysqli->set_charset("utf8")) {
		$mensaje = "Error loading character set utf8: " . $mysqli->error . '. Charset: ' . $mysqli->character_set_name();
		//header("Location: msg_error.php?mensaje=$mensaje&tipo=Error");
	}

?>