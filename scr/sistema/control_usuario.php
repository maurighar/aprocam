<?php
	//vemos si el usuario y contraseña es váildo
	if ($_POST["usuario"]=="admin" && $_POST["pass"]=="1234"){
	//usuario y contraseña válidos
	//defino una sesion y guardo datos
		session_start();
		$_SESSION["autentificado"]= "SI";
		$_SESSION["usuario"]= "admin";
		$_SESSION["nivel"]= "total";
		//header ("Location: ../index.php");
		header("Location: login.php");
	}else {
		//si no existe le mando otra vez a la portada
		header("Location: login.php?errorusuario=si");
	}
?>