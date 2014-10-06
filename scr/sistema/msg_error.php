<?php

$titulo_pagina = 'Error';
require 'header.php';
if (isset( $_REQUEST["mensaje"])){
	if (isset( $_REQUEST["tipo"])){
		if ($_REQUEST["tipo"]==='Error')
			echo '<div class="mensaje_mal">';
		else
			echo '<div class="mensaje_verde">';
	}
	echo $_REQUEST["mensaje"];
	echo '</div>';
}

require 'footer.php';
?>
