<?php
	//Paso los valores del formulario
	$nombre = $_POST['nombre'];
	$cuit = $_POST['cuit'];
	$telefono = $_POST['telefono'];

	//Calculo la longitud de los campos requeridos
	//para ver si tienen algun valor
	
	$reqleng = strlen($nombre) * strlen($cuit);
	
	if ($reqleng > 0){
		require '../connect_db.php';
		$resultado = $mysqli->query("insert into clientes values('','$nombre','$cuit','$telefono')");
		echo 'Se registrado exitosamente.';
	}else{
		echo 'Debe completar todos los campos.';
	}

?>