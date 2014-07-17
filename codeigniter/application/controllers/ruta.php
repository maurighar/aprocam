<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ruta extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('consulta_ruta_model');
		$this->load->helper('funciones');
	}





	/*#################################################################

		Consulta general desde la pantalla ppal

	#################################################################*/
	public function index() {
		if ($this->uri->segment(3) > 0){
			$data = array(
				'tipo'			=> $this->uri->segment(3),
				'valorconsulta' => $this->uri->segment(4),
				);
		} else {
			$data = array(
				'tipo'			=> $this->input->post('tipo'),
				'valorconsulta' => $this->input->post('valorconsulta'),
				);
		}

		$data['ruta'] = $this->consulta_ruta_model->listar($data);

		$data['contenido'] = 'consulta_ruta';
		$data['titulo'] = 'Sistema RUTA - Consulta';
		$this->load->view('template',$data);
	}






	public function modificar() {
		$data['item'] = $this->consulta_ruta_model->porID($this->uri->segment(3));
		$data['tipo_de_tramite'] = $this->consulta_ruta_model->tipo_tramite();


		$data['contenido'] = 'modifica_control';
		//$data['contenido'] = 'consulta_ruta';
		$data['titulo'] = 'Sistema RUTA - Modificar';
		$this->load->view('template',$data);
	}







	public function modificar_cargar() {
		$datos = array(
			'nombre'		=> $this->input->post('nombre'),
			'cuit'			=> $this->input->post('cuit'),
			'dominio'		=> $this->input->post('dominio'),
			'fecha'			=> $this->input->post('fecha'),
			'lote'			=> $this->input->post('lote'),
			'certificado'	=> $this->input->post('certificado'),
			'entregado'		=> $this->input->post('entregado'),
			'envio'			=> $this->input->post('envio'),
			'rechazo'		=> $this->input->post('rechazo'),
			'id'			=> $this->input->post('id'),
			);
		$data['ruta'] = $this->consulta_ruta_model->actualizar($datos);

		redirect('/ruta/modificar/'. $this->input->post('id'), 'location');

	}








	public function rechazo() {
		$data['item'] = $this->consulta_ruta_model->porID($this->uri->segment(3));

		$data['contenido'] = 'consulta_rechazo';
		$data['titulo'] = 'Sistema RUTA - Rechazo';
		$this->load->view('template',$data);
	}







	public function obs() {
		$data['item'] = $this->consulta_ruta_model->porID($this->uri->segment(3));

		$data['contenido'] = 'consulta_obs';
		$data['titulo'] = 'Sistema RUTA - Observaciones';
		$this->load->view('template',$data);
	}



	public function obs_carga() {
		$datos = array(
			'obs'	=> $this->input->post('obs'),
			'id'	=> $this->input->post('id'),
			);
		$data['ruta'] = $this->consulta_ruta_model->actualizar_obs($datos);

		redirect('/ruta/obs/'. $this->input->post('id'), 'location');

	}

		public function marcar() {
		$this->consulta_ruta_model->marcar($this->uri->segment(5));

		redirect('/ruta/index/'. $this->uri->segment(3) . '/' . $this->uri->segment(4), 'location');

	}

}


//$this->output->enable_profiler(TRUE);