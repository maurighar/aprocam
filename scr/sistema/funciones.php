<?php

/*  Archivo con las configuraciónes generales del sistema  */
require_once 'sys_config.php';

/*  Valida si el usuario esta logueado en el sistema  */
if (CAPA_SEGURIDAD){
	require_once 'seguridad.php';
}






/*
  herramientas para debugging en PHP
  KINT  ->  d($mi_variable_a_analizar);

*/
if (SYS_DEBUG) {
	require_once '/php/kint/kint.class.php';
}








if (defined('ENVIRONMENT')) {
	switch (ENVIRONMENT) {
		case 'development':
			error_reporting(E_ALL);
		break;

		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}





function cargar_vista($vista){
	require RAIZ_SITIO + $vista;
}










/*
   Convierte fechas entre el formato MySQL
   El tipo: normal a dia/mes/año
			inverso a formato MySQL  año-mes-dia
 */
function convertir_fechas($fecha_original,$tipo){
	$fecha_transformada = new DateTime($fecha_original);

	switch ($tipo) {
		case 'normal':
			echo ($fecha_original > 0)?$fecha_transformada->format('d/m/Y'):'--/--/----';
			break;

		case 'inverso':
			echo  ($fecha_original > 0)?$fecha_transformada->format('Y-m-d'):'0000-00-00';
			break;
	}

}



/*
	Retorna el color para las celdas de la tabla
	segun el tipo de tramite.

	Para las consultas del RUTA
 */


function color_tipo($tramite) {
	switch ($tramite) {
		case 'ALTA' :
			return "CCFF99" ;
			break;
		case 'EMPRESA' :
			return "CCFF99" ;
			break;
		case 'BAJA' :
			return "FF9900" ;
			break;
		case 'REVALIDA' :
			return "FFFF99" ;
			break;
	}
}



//############################################
//
//      Rechazos
//
//############################################
function color_envio($estado) {
	if ($estado > 0) {
		return 'class="pinta_verde"' ;
	}
}

function color_rojo($estado) {
	if ($estado != "") {
		return 'pinta_rojo' ;
	}
}

function enlace_ID($nro_fecha,$nro_id,$enlace) {
	if ($nro_fecha > 0) {
		 convertir_fechas($nro_fecha,'normal');
	} else {
		echo '<a href="?' . $enlace . '&id='. $nro_id . '">Marcar</a>';
	}
}





function validarCUIT($cuit) {if (strlen($cuit)<11) return false ;$cadena = str_split($cuit);$result = $cadena[0]*5;$result += $cadena[1]*4;$result += $cadena[2]*3;$result += $cadena[3]*2;$result += $cadena[4]*7;$result += $cadena[5]*6;$result += $cadena[6]*5;$result += $cadena[7]*4;$result += $cadena[8]*3;$result += $cadena[9]*2;$div = intval($result/11);$resto = $result - ($div*11);if($resto==0){if($resto==$cadena[10]){return true;}else{return false;}}elseif($resto==1){if($cadena[10]==9 AND $cadena[0]==2 AND $cadena[1]==3){return true;}elseif($cadena[10]==4 AND $cadena[0]==2 AND $cadena[1]==3){return true;}}elseif($cadena[10]==(11-$resto)){return true;}else{return false;}}




