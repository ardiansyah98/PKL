<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("m_login");
	}

	public function index()
	{
		if($this->session->userdata('status')=='login'){
			redirect(base_url('index.php/admin'));
		} else {
			$this->load->view('v_login');
		}
	}

	public function aksi_login(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$where = array(
			'username' => $username,
			'password' => md5($password)
		);

		$cek = $this->m_login->cek_login('tbl_admin', $where)->num_rows();
		if($cek>0){
			$data_session = array(
					'nama' => $username,
					'status' => 'login'
				);

			$this->session->set_userdata($data_session);

			redirect(base_url('index.php/admin'));
		} else {
			echo "<script>
				alert('Username dan password salah!');
				window.location.href='http://localhost/jasamarga/index.php/login';
			</script>";
		}
		
	}


	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/login'));
	}
}
