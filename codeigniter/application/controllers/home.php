<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
	}

	public function index() {
		$data['contenido'] = 'index';
		$data['titulo'] = 'Sistema RUTA';
		$this->load->view('template',$data);
	}
}



//$this->output->enable_profiler(TRUE);
//
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */