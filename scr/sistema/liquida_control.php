<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Sistema RUTA</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<link rel="icon" image="type/ico" href="../favicon.ico" />
		<link rel="stylesheet" href="../css/normalize.css" />	
		<link rel="stylesheet" href="../css/main.css" />
	</head>
	<body>
		<?php 
			require '../encabezado.php'; 

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
			$actualizar = "UPDATE lista_expdientes SET empresa = 0, alta = 0, baja = 0, modif = 0, reimpre = 0 WHERE lote = $valor";
			$marcado = $mysqli->query("$actualizar");



			$resultado = $mysqli->query("SELECT * FROM lista_expdientes WHERE lote = $valor");

			// EMPRESA -> AE: Alta Empresa, 
			// ALTA -> AV: Alta Vehículo, 
			// BAJA -> BE: Baja empresa, BV: Baja Vehículo,
			// MODIF -> ME: Modificación Empresa, MV: Modificación Vehículo,
			// REIMPRE -> IE: Reimpresión Empresa, IV: Reimpresión Vehículo
			// REVALIDA -> RV

			$tipo_tramite = array('AE', 'AV', 'BE', 'BV', 'ME', 'MV', 'IE', 'IV', 'RV' );
			$tipo_nombre = array('empresa', 'alta', 'baja', 'baja', 'modif', 'modif', 'reimpre', 'reimpre', 'revalida' );

			while ($fila = $resultado->fetch_assoc()) {
				echo '<br>' . $fila['expediente'] ;
				echo ' - ' .$fila['formularios'] . '<br>';

				for ($i=0; $i <= count($tipo_tramite)-1;$i++) {
					$valor_calculado = cortar_valor($fila['formularios'],$tipo_tramite[$i]);

					$actualizar = "UPDATE lista_expdientes SET $tipo_nombre[$i] = $tipo_nombre[$i] + $valor_calculado WHERE id= ". $fila['id'];
					$marcado = $mysqli->query("$actualizar");
					
					echo '     ' .$tipo_nombre[$i] . ' - ' . $valor_calculado ;
					echo ' - se grabo:' .$marcado . '<br>';
				}
			}

		?>
		
		
		<?php require 'footer.php'; ?>

	</body>
</html>
