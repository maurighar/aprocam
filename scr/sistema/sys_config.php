<?php


/** El nombre de tu base de datos */
define('MODO_LOCAL', false);



/** El nombre de tu base de datos */
define('DB_NAME', 'aprocam');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'aprocam');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'aprocam2010');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
if (MODO_LOCAL){
	define('DB_HOST', 'localhost');
} else {
	define('DB_HOST', 'admin03');
}

/** Dirección del directorio raiz en el servidor del sitio Web */
define('RAIZ_SITIO', '/aprocam/');

/** Habilita las herramientas para hacer debug */
define('SYS_DEBUG', false);

/** Habilita la capa de seguridad del sistema */
define('CAPA_SEGURIDAD', false);

?>