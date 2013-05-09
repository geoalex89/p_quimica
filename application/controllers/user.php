<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		
	}

	public function login($validation=true){
		if($this->session->userdata('logged_in') == TRUE) {
			redirect('/practiques');
		}

		$this->load->helper('form');
		$this->load->helper('html');
		$data['title'] = "Login";
		$form = form_open('login/check', array('id' => 'login-form'));
		$form .= form_fieldset("Login");
		$input = array(
	              'name'        => 'username',
	              'id'          => 'username',
	              'value'       => '',
	              'placeholder' => 'Nom d\'usuari'
	            );
		$form .= form_input($input);
		$form .= "<span id='checking-user'><img src='".base_url()."img/checking_user.gif' /></span>";
		$form .= "<span id='nonexisting-user'><img src='".base_url()."img/non_user.png' /></span>";
		$form .= '<div class="clearfix"></div>';
		$input = array(
	              'name'        => 'password',
	              'id'          => 'password',
	              'value'       => '',
	              'placeholder' => 'Contrasenya'
	            );
		$form .= form_password($input);
		$form .= '<div class="clearfix"></div>';

		if(isset($validation) and $validation == false) {
			$form .= '<div class="no_correcte alert alert-error">Les credencials son incorrectes</div>';
		}

		$input = array(
	              'id'          => 'submit',
	              'value'       => 'Inicia sesió',
	              'class' 		=> 'btn btn-primary' 
	            );
		$form .= form_submit($input);
		$form .= form_fieldset_close();
		$form .= form_close();
		$data['form'] = $form;
		$data['content'] = $this->load->view('login', $data, true);
		$this->load->view('home', $data);
	}

	public function check(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$user = $this->input->post('username');
			$query_professor = $this->db->get_where('professor', array('username' => $user));
			$query_student = $this->db->get_where('student', array('username' => $user));

			$user_pass = false;
			if($query_professor->num_rows() > 0) {
				$obj = $query_professor->result();
				$pass = $obj['0']->password;
				if($pass == md5($this->input->post('password'))) {
					$user_pass = true;
				}
				$newdata = array(
							'username'  => $obj['0']->username,
                   			'logged_in' => TRUE
						);
			} elseif ($query_student->num_rows() > 0) {
				$obj = $query_student->result();
				$pass = $obj['0']->password;
				if($pass == md5($this->input->post('password'))) {
					$user_pass = true;
				}
				$newdata = array(
							'username'  => $obj['0']->username,
                   			'logged_in' => TRUE
						);
			} 

			if($user_pass) {
				$this->session->set_userdata($newdata);
				redirect('/practiques');
			} else {
				$this->login($user_pass);
			}

		} else {
			$this->login();
		}
	}

	public function check_exists_user(){
		$val = $this->input->post('type');
		$this->db->select('username');
		$query_professor = $this->db->get_where('professor', array('username' => $val));
		$query_student = $this->db->get_where('student', array('username' => $val));

		if($query_professor->num_rows() > 0) {
			echo json_encode($query_professor->result());
		} else if($query_student->num_rows() > 0) {
			echo json_encode($query_student->result());
		} else {
			echo json_encode(array('msg' => 'No trobat'));
		}
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */