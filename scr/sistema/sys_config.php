<?php


/** El sistema esta trabajando en modo local */
define('MODO_LOCAL', false);

/** Valor unitario de los tramites del RUTA */
define('VALOR_TRAMITE', 120);

/** Dirección del directorio raiz en el servidor del sitio Web */
define('RAIZ_SITIO', '/aprocam/old/');

/** Habilita las herramientas para hacer debug */
define('SYS_DEBUG', false);

/** Habilita la capa de seguridad del sistema */
define('CAPA_SEGURIDAD', false);


define('ENVIRONMENT', 'development');


/*#############################################

	Configuración general de la base de datos

###############################################*/

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