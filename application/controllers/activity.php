<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in') == FALSE) {
			redirect('/');
		}	
	}
}
?>