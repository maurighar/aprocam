<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Sistema RUTA</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<link rel="icon" image="type/ico" href="favicon.ico" />
		<link rel="stylesheet" href="css/normalize.css" />	
		<link rel="stylesheet" href="css/main.css" />
	</head>
	<body>
<?php
	function validarCUIT($cuit) {
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

	if (isset( $_GET["cuit"])){ 
		if (validarCUIT($_GET["cuit"]))
			echo "correcto";
		else
			echo "incorrecto";
	}

?>
		<div>
			<form method="get" action="#" enctype="application/x-www-form-urlencoded">
				<fieldset>
					<legend>Consulta Normal</legend>

					<label>CUIT:</label>
					<input type="text" name="cuit" placeholder="CUIT a validar."/> 
					<br /> 
					<input type="submit" name="submit" value="Consultar" />
				</fieldset>
			</form>
		</div>

	</body>
</html>
