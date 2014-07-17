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










	public function porID($id_buscar){
		$this->db->select('*,(fecha+interval 70 day) AS vto');
		//, datediff(curdate(),fecha) as cant_dias
		$this->db->where('id',$id_buscar);
		$consulta = $this->db->get('control');
		return $consulta->row();
	}










	/*#################################################################
		Genera un array para insertarlo en un select
	#################################################################*/
	public function tipo_tramite(){
		$consulta = $this->db->get('tipo_tramite');

		$paraDevolver = array();
		foreach ($consulta->result_array() as $tablerow) {
 			$paraDevolver[$tablerow['tipo']] = $tablerow['tipo'];
		}

		return $paraDevolver;
	}








	public function actualizar($array_condicion){
		$data = array(
			'nombre'		=> $array_condicion['nombre'],
			'cuit'			=> $array_condicion['cuit'],
			'dominio'		=> $array_condicion['dominio'],
			'fecha'			=> $array_condicion['fecha'],
			'lote'			=> $array_condicion['lote'],
			'certificado'	=> $array_condicion['certificado'],
			'entregado'		=> $array_condicion['entregado'],
			'envio'			=> $array_condicion['envio'],
			'rechazo'		=> $array_condicion['rechazo'],
			);
		$this->db->where('id', $array_condicion['id']);
		$this->db->update('control', $data);
	}






	public function actualizar_obs($array_condicion){
		$data = array(
			'obs'		=> $array_condicion['obs'],
		);
		$this->db->where('id', $array_condicion['id']);
		$this->db->update('control', $data);
	}









	public function marcar($id){
		$data = array('entregado' => date("d/m/Y"),);
		$this->db->where('id', $id);
		$this->db->update('control', $data);
	}

}
