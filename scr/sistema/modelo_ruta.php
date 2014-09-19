<?php
class Ruta {
	public $resultado;

	public function __construct(){

	}

	public function consulta_razon($valor){
		require 'connect_db.php';
		$consulta = "SELECT *,GROUP_CONCAT(dominio SEPARATOR ' ') AS dominios FROM aprocam.control WHERE control.nombre like '%$valor%' GROUP BY expediente,tipo ORDER BY expediente,tipo,dominio ";
		$this->resultado = $mysqli->query("$consulta");
	}

}
?>