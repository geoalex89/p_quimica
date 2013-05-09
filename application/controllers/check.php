<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Check extends CI_Controller {

	public function index()
	{
		
	}

	public static function check_login(){
		if ($this->session->userdata('login_state') == FALSE ) {
			redirect( "/" );
	    }
	}
}

/* End of file check.php */
/* Location: ./application/controllers/check.php */