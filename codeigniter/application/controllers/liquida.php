<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Liquida extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('liquida_model');
		$this->load->helper('funciones');
	}





	/*#################################################################

		---

	#################################################################*/
	public function index() {
		$data['liquida'] = $this->liquida_model->listar();

		$data['contenido'] = 'liquida_view';
		$data['titulo'] = 'Sistema RUTA - Liquidación';
		$this->load->view('template',$data);
	}









	public function carga() {
		$data['liquida'] = $this->liquida_model->listar();

		$data['contenido'] = 'liquida_view';
		$data['titulo'] = 'Sistema RUTA - Liquidación';
		$this->load->view('template',$data);
	}






	public function control() {
		$this->output->enable_profiler(TRUE);
		$data['lote'] = $this->uri->segment(3);
		$data['liquida'] = $this->liquida_model->porLote($data['lote']);


		$data['contenido'] = 'liquida_control';
		$data['titulo'] = 'Sistema RUTA - Liquidación';

		if ($data['liquida'] === "No"){
			$data['mensaje'] = 'No se encuentra la liquidación ' . $data['lote'] . '.';
			$data['contenido'] = 'mensaje';
		} elseif ($data['liquida'] === "Varios") {
			$data['mensaje'] = 'Hay mas de una liquidación ' . $data['lote'] . '.';
			$data['contenido'] = 'mensaje';
		}

		$this->load->view('template',$data);
	}






	public function control_form() {
		$data['liquida'] = $this->liquida_model->listar();

		$data['contenido'] = 'liquida_view';
		$data['titulo'] = 'Sistema RUTA - Liquidación';
		$this->load->view('template',$data);
	}



	public function control_exped() {
		$this->load->helper('liquida');
		$datos = array(
			'alta'		=> 0,
			'baja'		=> 0,
			'modif'		=> 0,
			'reimpre'	=> 0,
			'revalida'	=> 0,
			'lote'		=> $this->uri->segment(3),
		);

		//  Pongo en 0 todos los campos antes de empezar
		$this->liquida_model->control_limpia($datos);

		$lista_exp = $this->liquida_model->lista_expdientes($this->uri->segment(3));

		if ($lista_exp === "No"){
			$data['mensaje'] = 'No se encuentra la liquidación ' . $data['lote'] . '.';
		} else {
			// EMPRESA -> AE: Alta Empresa,
			// ALTA -> AV: Alta Vehículo,
			// BAJA -> BE: Baja empresa, BV: Baja Vehículo,
			// MODIF -> ME: Modificación Empresa, MV: Modificación Vehículo,
			// REIMPRE -> IE: Reimpresión Empresa, IV: Reimpresión Vehículo
			// REVALIDA -> RV

			$tipo_tramite = array('AE', 'AV', 'BE', 'BV', 'ME', 'MV', 'IE', 'IV', 'RV' );
			$tipo_nombre = array('empresa', 'alta', 'baja', 'baja', 'modif', 'modif', 'reimpre', 'reimpre', 'revalida' );

			foreach ($lista_exp as $item) {
				for ($i=0; $i <= count($tipo_tramite)-1;$i++) {
					$valor_calculado = cortar_valor($item->formularios,$tipo_tramite[$i]);
					$this->liquida_model->control(array($tipo_nombre[$i] => $valor_calculado),$item->id);
				} //Fin for
			} //Fin foreach
			$data['mensaje'] = 'Se completo exitosamente para la liquidación ' . $this->uri->segment(3) . '.';
		 }  //Fin el if que controla si encontro la liquidación

		$data['contenido'] = 'mensaje';
		$data['titulo'] = 'Sistema RUTA - Liquidación';
		$this->load->view('template',$data);
	}



}


//$this->output->enable_profiler(TRUE);