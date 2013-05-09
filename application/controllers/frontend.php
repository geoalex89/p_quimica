<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function index()
	{
		$data['title'] = "Pàgina principal";
		$data['content'] = $this->load->view('phome', '', true);
		$this->load->view('home', $data);
	}
}