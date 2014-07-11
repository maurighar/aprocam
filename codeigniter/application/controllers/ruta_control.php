<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ruta_control extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('consulta_ruta_model');
		$this->load->helper('funciones');
	}

	public function index() {
		$datos = array(
			'tipo'			=> $this->input->post('tipo'),
			'valorconsulta' => $this->input->post('valorconsulta'),
			);
		$data['articulos'] = $this->consulta_ruta_model->listar($datos);;

		$data['contenido'] = 'consulta_ruta';
		$data['titulo'] = 'Sistema RUTA - Consulta';
		$this->load->view('template',$data);
	}

	public function modificar() {
		$this->output->enable_profiler(TRUE);
		$datos = array(
			'id' => $this->uri->segment(3),
			);
		$data['control'] = $this->consulta_ruta_model->porID($datos);;


		$data['contenido'] = 'modifica_control';
		//$data['contenido'] = 'consulta_ruta';
		$data['titulo'] = 'Sistema RUTA - Modificar';
		$this->load->view('template',$data);
	}

	public function modificar_carga() {
		$this->output->enable_profiler(TRUE);
		$datos = array(
			'id' => $this->uri->segment(3),
			);
		$data['control'] = $this->consulta_ruta_model->porID($datos);;


		$data['contenido'] = 'modifica_control';
		//$data['contenido'] = 'consulta_ruta';
		$data['titulo'] = 'Sistema RUTA - Modificar';
		$this->load->view('template',$data);
	}


}


//$this->output->enable_profiler(TRUE);