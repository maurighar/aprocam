<?php
$titulo_pagina = 'Sistema RUTA - Controlar tramites';
require 'header.php'; ?>

<?php
	function cortar_valor($enDonde,$queBuscar) {
		$posInicial = stripos($enDonde, $queBuscar);
		if ($posInicial === false)
			return 0;
		$posInicial += 3;
		$posDelPunto = stripos($enDonde, '.',$posInicial);
		return substr ($enDonde , $posInicial,$posDelPunto-$posInicial )*1;
	}

	require 'connect_db.php';
	$valor = $_GET["lote"] ;

	//  Pongo en 0 todos los campos antes de empzar
	$actualizar = "UPDATE lista_expdientes SET empresa = 0, alta = 0, baja = 0, modif = 0, reimpre = 0, revalida = 0 WHERE lote = $valor";
	$marcado = $mysqli->query("$actualizar");



	$resultado = $mysqli->query("SELECT * FROM lista_expdientes WHERE cerrado = 'SI' and lote = $valor");

	// EMPRESA -> AE: Alta Empresa,
	// ALTA -> AV: Alta Vehículo,
	// BAJA -> BE: Baja empresa, BV: Baja Vehículo,
	// MODIF -> ME: Modificación Empresa, MV: Modificación Vehículo,
	// REIMPRE -> IE: Reimpresión Empresa, IV: Reimpresión Vehículo
	// REVALIDA -> RV

	$tipo_tramite = array('AE', 'AV', 'BE', 'BV', 'ME', 'MV', 'IE', 'IV', 'RV' );
	$tipo_nombre = array('empresa', 'alta', 'baja', 'baja', 'modif', 'modif', 'reimpre', 'reimpre', 'revalida' );

	echo '<br>';
	while ($fila = $resultado->fetch_assoc()) {
		echo $fila['expediente'] ;
		echo ' - ' .$fila['formularios'] . '<br>';

		for ($i=0; $i <= count($tipo_tramite)-1;$i++) {
			$valor_calculado = cortar_valor($fila['formularios'],$tipo_tramite[$i]);

			$actualizar = "UPDATE lista_expdientes SET $tipo_nombre[$i] = $tipo_nombre[$i] + $valor_calculado WHERE id= ". $fila['id'];
			$marcado = $mysqli->query("$actualizar");
		}
	}

?>


<?php require 'footer.php'; ?>
