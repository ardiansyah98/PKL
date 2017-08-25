<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	public function index(){
		if($this->session->userdata('status')!='login'){
			redirect(base_url('index.php/login'));
		} else {

			if($this->session->userdata('jenis')=='surat'){
				$data['title'] = "Empowerment";
				$data['subtitle'] = "Admin";
				$data['view_sidebar'] = "layout/sidebar_surat";
				$data['view_isi'] = "surat/v_home";
				$this->load->view('layout/template',$data);
			} else {
				redirect(base_url('index.php/monitoring'));
			}

		}
	}

	public function home(){
		if($this->session->userdata('status')!='login'){
			redirect(base_url('index.php/login'));
		} else {
			if($this->session->userdata('jenis')=='surat'){
				$data['title'] = "Empowerment";
				$data['subtitle'] = "Admin";
				$data['view_sidebar'] = "layout/sidebar_surat";
				$data['view_isi'] = "surat/v_home";
				$this->load->view('layout/template',$data);
			} else {
				redirect(base_url('index.php/monitoring'));
			}

		}
	}

	public function cetak_surat(){

	}
}