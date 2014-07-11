<?php
	$this->load->view('template\front_end\header');
	//$this->load->view('template/front_end/sidebar');
	$this->load->view('front_end/' . $contenido);
	$this->load->view('template/front_end/footer');