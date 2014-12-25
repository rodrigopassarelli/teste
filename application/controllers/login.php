<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Login extends CI_Controller {
	
	function __construct() {
		parent::__construct();

		$this->load->helper(array('form'));
		$this->load->library('session');

	}


	public function index() {

		$this->load->view('loginview');

	}


	public function verificalogin() {

		$login = $this->input->post('login');
		$senha = $this->input->post('senha');

		$this->load->model('usuariomodel');
		$dados = $this->usuariomodel->login($login, $senha);

		if(count($dados) == 0) {
			redirect('/index.php/login/loginview');
		}

		else {

		$sessao = array();

			foreach ($dados as $dado) {
			
				$sessao = array('login' => $dado->login,
							    'senha'	=> $dado->senha);

				$this->session->set_userdata('logar', $sessao);

				$sessaoAtiva = $this->session->userdata('logar');

				if (count($sessaoAtiva) > 0) {
				
					redirect('/index.php/login/ola');
				}

			}

		}

		
	}


	public function ola() {

		 if ($this->session->userdata('logar')=="") {
		
				redirect('/index.php/login/index');
 		    }


		$this->load->view('ola');
	}


	public function loginview() {
		$this->load->view('loginview');
	}


	public function logout() {

		$this->session->unset_userdata('logar');
		$this->session->sess_destroy();

		redirect('/index.php/login/index');
	}


}






?>