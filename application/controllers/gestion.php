<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestion extends CI_Controller {

	public function index() {
		if (isset($this->session->userdata['logged_in'])) {
			$this->load->view('gestionView');
		}
		else header('Location: login');
	}

}