<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rechazo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('rechazados_model');
		//$this->load->helper('funciones');
	}





	/*#################################################################

		---

	#################################################################*/
	public function index() {
		$data['rechazos'] = $this->rechazados_model->listar();

		$data['contenido'] = 'rechazos_view';
		$data['desde'] = 'index';
		$data['titulo'] = 'Sistema RUTA - Rechazados';
		$this->load->view('template',$data);
	}





	public function completo() {
		$data['rechazos'] = $this->rechazados_model->listar_completo();

		$data['contenido'] = 'rechazos_view';
		$data['desde'] = 'completo';
		$data['titulo'] = 'Sistema RUTA - Rechazados';
		$this->load->view('template',$data);
	}




	public function modif() {
		$data['item'] = $this->rechazados_model->porID($this->uri->segment(3));

		$data['contenido'] = 'rechazos_modificar';
		$data['titulo'] = 'Sistema RUTA - Modificar Rechazo';
		$this->load->view('template',$data);
	}










	public function modif_cargar() {
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
		//$data['ruta'] = $this->consulta_ruta_model->actualizar($datos);

		//redirect('/ruta/modificar/'. $this->input->post('id'), 'location');
	}







	public function marcar() {
		$this->rechazados_model->marcar($this->uri->segment(3));
		switch ($this->uri->segment(4)) {
			case 'completo':
				redirect('/rechazo/completo', 'location');
				break;
			case 'index':
				redirect('/rechazo', 'location');
				break;
			default:
				redirect('/ruta/cuit/' . $this->uri->segment(4) , 'location');
				break;
		}
	}  // Fin Marcar

}  // Fin Clase
//$this->output->enable_profiler(TRUE);

