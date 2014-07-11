<?php

class Consulta_ruta_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function listar($array_condicion){

		switch ($array_condicion['tipo']) {
			case 1 :
				$where = "control.nombre like '%" . $array_condicion['valorconsulta'] . "%'";
				break;
			case 2 :
				$where = "control.cuit = " . $array_condicion['valorconsulta'] ;
				break;
			case 3 :
				$where = "control.dominio =  '" . $array_condicion['valorconsulta'] . "'";
				break;
			case "dp":
				$where = "control.dominio like '%" . $array_condicion['valorconsulta'] . "%'";
				break;
			case 4 :
				$where = "control.expediente = " . $array_condicion['valorconsulta'];
				break;
			case 5 :
				$where = "control.lote = " . $array_condicion['valorconsulta'];
				break;
			case 6 :
				$where = "control.rechazo != ''  and control.envio = 0";
				break;
		}
		$this->db->where($where);
		$consulta = $this->db->get('control');
		return $consulta->result();
	}

	public function porID($array_condicion){
		$this->db->select('*,(fecha+interval 70 day) AS vto');
		//, datediff(curdate(),fecha) as cant_dias
		$this->db->where('id',$array_condicion['id']);
		$consulta = $this->db->get('control');
		return $consulta->result();
	}

}
