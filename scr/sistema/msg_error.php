<?php

$titulo_pagina = 'Error';
require 'header.php';
if (isset( $_REQUEST["mensaje"])){
	echo '<div class="mensaje_mal">';
	echo $_REQUEST["mensaje"];
	echo '</div>';
}

require 'footer.php';
?>
