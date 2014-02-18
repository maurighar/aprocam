<?php
	function validarCUIT($cuit) {
		if (strlen($cuit)<11) 
			return false ;

		$cadena = str_split($cuit);
		$result = $cadena[0]*5;
		$result += $cadena[1]*4;
		$result += $cadena[2]*3;
		$result += $cadena[3]*2;
		$result += $cadena[4]*7;
		$result += $cadena[5]*6;
		$result += $cadena[6]*5;
		$result += $cadena[7]*4;
		$result += $cadena[8]*3;
		$result += $cadena[9]*2;

		$div = intval($result/11);
		$resto = $result - ($div*11);

		if($resto==0){
			if($resto==$cadena[10]){
				return true;
			}else{
				return false;
			}
		}elseif($resto==1){
			if($cadena[10]==9 AND $cadena[0]==2 AND $cadena[1]==3){
				return true;
			}elseif($cadena[10]==4 AND $cadena[0]==2 AND $cadena[1]==3){
				return true;
			}
		}elseif($cadena[10]==(11-$resto)){
			return true;
		}else{
			return false;
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Importación</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<link rel="icon" type="image/ico" href="../favicon.ico">
		<link rel="stylesheet" href="../css/main.css" />
	</head>
	<body>

		<table>
			<thead>
				<tr>
					<th>Errores</th>
				</tr>
			</thead>
			<tbody>

			<?php
				require 'connect_db.php';

				$resultado = $mysqli->query("SELECT  * FROM aprocam.control");
				while ($fila = $resultado->fetch_assoc()) {
					if (!validarCUIT($fila['cuit'])) {
						echo '<tr> <td>';
						echo '<strong>Error expediente ';
						echo '<a href="modificar.php?id='. $fila['id'] .'">'. $fila['expediente'] .'</a></strong>' ;
						echo '</td> </tr>';
					}
				}

				$mysqli->close();
			?>
			</tbody>
		</table>
	</body>
</html>


