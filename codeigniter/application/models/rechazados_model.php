<?php

class Rechazados_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}








	public function listar(){
		$this->db->where("envio = 0 and anulado = ''");
		$consulta = $this->db->get('rechazos');
		return $consulta->result();
	}








	public function listar_completo(){
		$consulta = $this->db->get('rechazos');
		return $consulta->result();
	}









	public function porID($id_buscar){
		$this->db->where('id',$id_buscar);
		$consulta = $this->db->get('rechazos');
		return $consulta->row();
	}







	public function marcar($id){
		$data = array('envio' => date("Y-m-d"),);
		$this->db->where('id', $id);
		$this->db->update('rechazos', $data);
	}


}
