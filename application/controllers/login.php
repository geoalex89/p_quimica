<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		if (!isset($this->session->userdata['logged_in'])) {
			$this->load->helper('form');
			$this->load->helper('html');
			$this->load->library('form_validation');
			$form = validation_errors();
			$form.= form_open('login', array('class' => 'login', 'id'=>'login'));
			$label_user = array(
			'class' => 'username',
			);
			$form.= form_label('Username: ', '', $label_user) . br(1);
			$username = array(
				'name' => 'username',
				'id' => 'username',
				'maxlength'=> '20',
				'size' => '20',
				);
			$form.= form_input($username) . br(1);
			$label_pass = array(
			'class' => 'password',
			);
			$form.= form_label('Password: ', '', $label_pass) . br(1);
			$password = array(
				'name' => 'password',
				'id' => 'password',
				'maxlength'=> '20',
				'size' => '20',
				);
			$form.= form_password($password) . br(1);
			$enviar = array(
				'name' => 'login',
				'id' => 'loginSubmit',
				'value' => 'Login',
				);
			$form.= form_submit($enviar);
			$form.= form_close();

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == FALSE)	{
				$this->load->view('loginView', array('form'=>$form));
			}
			else {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$consulta = $this->db->get_where('administrator', array('username' => $username, 'password' => md5($password)));
				if (count($consulta->result())==1) {
					$autenticado = array(
					           'logged_in' => TRUE,
				       );				 
					$this->session->set_userdata($autenticado);
					header('Location: gestion');
				}
				else {
					$error="<span class='loginError'>Los datos introducidos son erroneos</span>";
					$this->load->view('loginView', array('form'=>$form, 'error'=>$error));
				}
			}
		}
		else header('Location: gestion');
	}
}	