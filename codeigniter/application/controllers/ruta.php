<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ruta extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ruta_model');
		$this->load->helper('funciones');
	}







	/*#################################################################

		Consulta general desde la pantalla ppal

	 ######   #######  ##    ##  ######  ##     ## ##       ########    ###
	##    ## ##     ## ###   ## ##    ## ##     ## ##          ##      ## ##
	##       ##     ## ####  ## ##       ##     ## ##          ##     ##   ##
	##       ##     ## ## ## ##  ######  ##     ## ##          ##    ##     ##
	##       ##     ## ##  ####       ## ##     ## ##          ##    #########
	##    ## ##     ## ##   ### ##    ## ##     ## ##          ##    ##     ##
	 ######   #######  ##    ##  ######   #######  ########    ##    ##     ##

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


		switch ($data['tipo']) {
			case 1 :
				redirect('/ruta/empresa/'. $data['valorconsulta'], 'location');
				break;
			case 2 :
				redirect('/ruta/cuit/'. $data['valorconsulta'], 'location');
				break;
			case 3 :
				//$where = "control.dominio =  '" . $array_condicion['valorconsulta'] . "'";
				break;
			case "dp":
				//$where = "control.dominio like '%" . $array_condicion['valorconsulta'] . "%'";
				break;
			case 4 :
				//$where = "control.expediente = " . $array_condicion['valorconsulta'];
				break;
			case 5 :
				//$where = "control.lote = " . $array_condicion['valorconsulta'];
				break;
		}



		$data['ruta'] = $this->ruta_model->listar($data);

		$data['contenido'] = 'consulta_ruta';
		$data['titulo'] = 'Sistema RUTA - Consulta';
		if ($data['ruta'] === 'No') {
			$data['mensaje'] = 'La consulta no trajo resultados.';
			$data['contenido'] = 'mensaje';
		}
		$this->load->view('template',$data);
	}








	/*
	######## ##     ## ########  ########  ########  ######     ###
	##       ###   ### ##     ## ##     ## ##       ##    ##   ## ##
	##       #### #### ##     ## ##     ## ##       ##        ##   ##
	######   ## ### ## ########  ########  ######    ######  ##     ##
	##       ##     ## ##        ##   ##   ##             ## #########
	##       ##     ## ##        ##    ##  ##       ##    ## ##     ##
	######## ##     ## ##        ##     ## ########  ######  ##     ##
	*/

	public function empresa() {
		$data['nombre'] = urldecode($this->uri->segment(3));

		$data['ruta'] = $this->ruta_model->porNombre($data['nombre']);

		$data['contenido'] = 'ruta_empresa_view';
		$data['titulo'] = 'Sistema RUTA - Consulta';
		if ($data['ruta'] === 'No') {
			$data['mensaje'] = 'La consulta no trajo resultados.';
			$data['contenido'] = 'mensaje';
		}
		$this->load->view('template',$data);
	}








	/*
	 ######  ##     ## #### ########
	##    ## ##     ##  ##     ##
	##       ##     ##  ##     ##
	##       ##     ##  ##     ##
	##       ##     ##  ##     ##
	##    ## ##     ##  ##     ##
	 ######   #######  ####    ##
	 */


	public function cuit() {
		$this->output->enable_profiler(TRUE);
		$data['cuit'] = $this->uri->segment(3);

		$data['ruta'] = $this->ruta_model->porCuit($data['cuit']);
		$data['rechazo'] = $this->ruta_model->RechazoPorCuit($data['cuit']);
		$data['obs'] = $this->ruta_model->cliente($data['cuit'],urldecode($this->uri->segment(4)));

		$data['contenido'] = 'ruta_cuit_view';
		$data['titulo'] = 'Sistema RUTA - Consulta';
		if ($data['ruta'] === 'No') {
			$data['mensaje'] = 'La consulta no trajo resultados.';
			$data['contenido'] = 'mensaje';
		}

		$this->load->view('template',$data);
	}  //fin cuit










	/*
	##     ##  #######  ########  #### ######## ####  ######     ###    ########
	###   ### ##     ## ##     ##  ##  ##        ##  ##    ##   ## ##   ##     ##
	#### #### ##     ## ##     ##  ##  ##        ##  ##        ##   ##  ##     ##
	## ### ## ##     ## ##     ##  ##  ######    ##  ##       ##     ## ########
	##     ## ##     ## ##     ##  ##  ##        ##  ##       ######### ##   ##
	##     ## ##     ## ##     ##  ##  ##        ##  ##    ## ##     ## ##    ##
	##     ##  #######  ########  #### ##       ####  ######  ##     ## ##     ##
	*/

	public function modificar() {
		$data['item'] = $this->ruta_model->porID($this->uri->segment(3));
		$data['tipo_de_tramite'] = $this->ruta_model->tipo_tramite();


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
		$data['ruta'] = $this->ruta_model->actualizar($datos);

		redirect('/ruta/modificar/'. $this->input->post('id'), 'location');

	}








	/*
	########  ########  ######  ##     ##    ###    ########  #######
	##     ## ##       ##    ## ##     ##   ## ##        ##  ##     ##
	##     ## ##       ##       ##     ##  ##   ##      ##   ##     ##
	########  ######   ##       ######### ##     ##    ##    ##     ##
	##   ##   ##       ##       ##     ## #########   ##     ##     ##
	##    ##  ##       ##    ## ##     ## ##     ##  ##      ##     ##
	##     ## ########  ######  ##     ## ##     ## ########  #######
	 */

	public function rechazo() {
		$data['item'] = $this->ruta_model->porID($this->uri->segment(3));

		$data['contenido'] = 'consulta_rechazo';
		$data['titulo'] = 'Sistema RUTA - Rechazo';
		$this->load->view('template',$data);
	}




	/*
	 #######  ########   ######
	##     ## ##     ## ##    ##
	##     ## ##     ## ##
	##     ## ########   ######
	##     ## ##     ##       ##
	##     ## ##     ## ##    ##
	 #######  ########   ######
	 */


	public function obs() {
		$data['item'] = $this->ruta_model->porID($this->uri->segment(3));

		$data['contenido'] = 'consulta_obs';
		$data['titulo'] = 'Sistema RUTA - Observaciones';
		$this->load->view('template',$data);
	}




	public function obs_carga() {
		$datos = array(
			'obs'	=> $this->input->post('obs'),
			'id'	=> $this->input->post('id'),
			);
		$data['ruta'] = $this->ruta_model->actualizar_obs($datos);

		redirect('/ruta/obs/'. $this->input->post('id'), 'location');

	}






	public function obs_cuit() {
		$data['item'] = $this->ruta_model->cliente_id($this->uri->segment(3));

		$data['contenido'] = 'ruta_cuit_obs';
		$data['titulo'] = 'Sistema RUTA - Observaciones x cliente';
		$this->load->view('template',$data);
	}




	public function obs_cuit_carga() {
		$data['ruta'] = $this->ruta_model->actualizar_obs_cuit($this->input->post('id'),$this->input->post('obs'));

		redirect('/ruta/obs_cuit/'. $this->input->post('id'), 'location');

	}







	/*
	##     ##    ###    ########   ######     ###    ########
	###   ###   ## ##   ##     ## ##    ##   ## ##   ##     ##
	#### ####  ##   ##  ##     ## ##        ##   ##  ##     ##
	## ### ## ##     ## ########  ##       ##     ## ########
	##     ## ######### ##   ##   ##       ######### ##   ##
	##     ## ##     ## ##    ##  ##    ## ##     ## ##    ##
	##     ## ##     ## ##     ##  ######  ##     ## ##     ##
	 */

	public function marcar() {
		$this->ruta_model->marcar($this->uri->segment(5));

		redirect('/ruta/index/'. $this->uri->segment(3) . '/' . $this->uri->segment(4), 'location');

	}

}


//$this->output->enable_profiler(TRUE);