<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Liquida extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('consulta_ruta_model');
		//$this->load->helper('funciones');
	}





	/*#################################################################

		---

	#################################################################*/
	public function index() {

	}



}


//$this->output->enable_profiler(TRUE);