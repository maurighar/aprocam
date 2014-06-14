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
		require_once '../../php/kint/kint.class.php';
	}




	function convertir_fechas($fecha_original,$tipo){
		/*
		   Convierte fechas entre el formato MySQL
		   El tipo: normal a dia/mes/año
					inverso a formato MySQL  año-mes-dia
		 */
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


	function validarCUIT($cuit) {if (strlen($cuit)<11) return false ;$cadena = str_split($cuit);$result = $cadena[0]*5;$result += $cadena[1]*4;$result += $cadena[2]*3;$result += $cadena[3]*2;$result += $cadena[4]*7;$result += $cadena[5]*6;$result += $cadena[6]*5;$result += $cadena[7]*4;$result += $cadena[8]*3;$result += $cadena[9]*2;$div = intval($result/11);$resto = $result - ($div*11);if($resto==0){if($resto==$cadena[10]){return true;}else{return false;}}elseif($resto==1){if($cadena[10]==9 AND $cadena[0]==2 AND $cadena[1]==3){return true;}elseif($cadena[10]==4 AND $cadena[0]==2 AND $cadena[1]==3){return true;}}elseif($cadena[10]==(11-$resto)){return true;}else{return false;}}


