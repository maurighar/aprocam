<?php

class Liquida_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}








	public function listar(){
		$this->db->limit(10);
		$this->db->order_by("liquidacion", "desc");
		$consulta = $this->db->get('liquidacion');
		return $consulta->result();
	}









	public function porLote($lote){
		$this->db->where('liquidacion',$lote);
		$consulta = $this->db->get('liquidacion');

		if ($consulta->num_rows() > 0){
			if ($consulta->num_rows() === 1) {
				return $consulta->row();
			} else {
				return 'Varios';
			}
		}
		else {
			return 'No';
		}
	}












	public function control_limpia($array_condicion){
		$data = array(
			'alta'		=> $array_condicion['alta'],
			'baja'		=> $array_condicion['baja'],
			'modif'		=> $array_condicion['modif'],
			'reimpre'	=> $array_condicion['reimpre'],
			'revalida'	=> $array_condicion['revalida'],
		);

		$this->db->where('lote', $array_condicion['lote']);
		$this->db->update('lista_expdientes', $data);
	}


	public function control($array_condicion,$id){
		$this->db->where('id', $id);
		$this->db->update('lista_expdientes',$array_condicion);
	}






	public function lista_expdientes($lote){
		$this->db->where('lote',$lote);
		$this->db->where('cerrado', 'SI');
		$consulta = $this->db->get('lista_expdientes');

		if ($consulta->num_rows() > 0){
			return $consulta->result();
		}
		else {
			return 'No';
		}
	}

}
