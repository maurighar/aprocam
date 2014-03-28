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

			function actualizar () {
				$actualizar = "UPDATE control SET certificado='" . $fecha_entrega . "' WHERE  id= " . $id_marca;

				require 'connect_db.php';
				$marcado = $mysqli->query("$actualizar")
			}


			function controlar_form ($cadena, $idExpediente) {
				// EMPRESA -> AE: Alta Empresa, 
				// ALTA -> AV: Alta Vehículo, 
				// BAJA -> BE: Baja empresa, BV: Baja Vehículo,
				// MODIF -> ME: Modificación Empresa, MV: Modificación Vehículo,
				// REIMPRE -> IE: Reimpresión Empresa, IV: Reimpresión Vehículo
				// REVALIDA -> RV

				$tipo_tramite = array('AE', 'AV', 'BE', 'BV', 'ME', 'MV', 'IE', 'IV', 'RV' );
				$tipo_nombre = array('empresa', 'alta', 'baja', 'baja', 'modif', 'modif', 'reimpre', 'reimpre', 'revalida' );

				for ($i=0; $i <= count($tipo_tramite)-1;$i++) {
					echo cortar_valor($cadena,$tipo_tramite[$i]);
				}		
			} 

			require 'connect_db.php';
			$resultado = $mysqli->query("$_selec control.nombre like '%" . $valor . "%'");
			while ($fila = $resultado->fetch_assoc()) {

			$fila['expediente']



			}








		?>
		







		
		<?php require 'footer.php'; ?>

	</body>
</html>
