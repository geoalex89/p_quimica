<?php
	class my404 extends CI_Controller
	{
		public function __construct()
		{
		        parent::__construct();
		}

		public function index()
		{
			$this->output->set_status_header('404');
			$data['title'] = 'Pàgina no trobada';
			$data['content'] = $this->load->view('p404', '', true);
			$this->load->view('home', $data);
		}
	}
?>