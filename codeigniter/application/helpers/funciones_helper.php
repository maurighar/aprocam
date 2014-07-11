<?

function convertir_fechas($fecha_original,$tipo){
	/*
	   Convierte fechas entre el formato MySQL
	   El tipo: normal a 					dia/mes/año
				inverso a formato MySQL 	año-mes-dia
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

function color_tipo($tramite) {
	/*
		Le asigna un color diferente a cada tipo de tramite
	 */
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
