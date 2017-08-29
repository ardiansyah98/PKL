<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	public function index(){
		if($this->session->userdata('status')!='login'){
			redirect(base_url('index.php/login'));
		} else {

			if($this->session->userdata('jenis')=='anggaran'){
				$data['title'] = "Empowerment";
				$data['subtitle'] = "Admin";
				$data['view_sidebar'] = "layout/sidebar_anggaran";
				$data['view_isi'] = "anggaran/v_home";
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
			if($this->session->userdata('jenis')=='anggaran'){
				$data['title'] = "Empowerment";
				$data['subtitle'] = "Admin";
				$data['view_sidebar'] = "layout/sidebar_anggaran";
				$data['view_isi'] = "anggaran/v_home";

				$year=date('Y');

				$jan = $this->M_anggaran->cek_penggunaan2($year.'-01');
				$feb = $this->M_anggaran->cek_penggunaan2($year.'-02');
				$mar = $this->M_anggaran->cek_penggunaan2($year.'-03');
				$apr = $this->M_anggaran->cek_penggunaan2($year.'-04');
				$mei = $this->M_anggaran->cek_penggunaan2($year.'-05');
				$jun = $this->M_anggaran->cek_penggunaan2($year.'-06');
				$jul = $this->M_anggaran->cek_penggunaan2($year.'-07');
				$agu = $this->M_anggaran->cek_penggunaan2($year.'-08');
				$sep = $this->M_anggaran->cek_penggunaan2($year.'-09');
				$okt = $this->M_anggaran->cek_penggunaan2($year.'-10');
				$nov = $this->M_anggaran->cek_penggunaan2($year.'-11');
				$des = $this->M_anggaran->cek_penggunaan2($year.'-12');

				$tot1 = 0;
				$tot2 = 0;
				$tot3 = 0;
				$tot4 = 0;
				$tot5 = 0;
				$tot6 = 0;
				$tot7 = 0;
				$tot8 = 0;
				$tot9 = 0;
				$tot10 = 0;
				$tot11 = 0;
				$tot12 = 0;

				foreach($jan->result() as $res){
					$tot1 = $tot1 + $res->total;
				}
				foreach($feb->result() as $res){
					$tot2 = $tot2 + $res->total;
				}
				foreach($mar->result() as $res){
					$tot3 = $tot3 + $res->total;
				}
				foreach($apr->result() as $res){
					$tot4 = $tot4 + $res->total;
				}
				foreach($mei->result() as $res){
					$tot5 = $tot5 + $res->total;
				}
				foreach($jun->result() as $res){
					$tot6 = $tot6 + $res->total;
				}
				foreach($jul->result() as $res){
					$tot7 = $tot7 + $res->total;
				}
				foreach($agu->result() as $res){
					$tot8 = $tot8 + $res->total;
				}
				foreach($sep->result() as $res){
					$tot9 = $tot9 + $res->total;
				}
				foreach($okt->result() as $res){
					$tot10 = $tot10 + $res->total;
				}
				foreach($nov->result() as $res){
					$tot11 = $tot11 + $res->total;
				}
				foreach($des->result() as $res){
					$tot12 = $tot12 + $res->total;
				}

				$data['thn_sekarang']= array($year);

				$data['bulan'] = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
				$data['total_penggunaan'] = array($tot1,$tot2,$tot3,$tot4,$tot5,$tot6,$tot7,$tot8,$tot9,$tot10,$tot11,$tot12);
				$this->load->view('layout/template',$data);
			} else {
				redirect(base_url('index.php/monitoring'));
			}

		}
	}

	public function rekap(){
		if($this->session->userdata('status')!='login'){
			redirect(base_url('index.php/login'));
		} else {
			if($this->session->userdata('jenis')=='anggaran'){
				$data['title'] = "Empowerment";
				$data['subtitle'] = "Admin";
				$data['view_sidebar'] = "layout/sidebar_anggaran";
				$data['view_isi'] = "anggaran/v_rekap";
				$this->load->view('layout/template',$data);
			} else {
				redirect(base_url('index.php/monitoring'));
			}

		}
	}

	public function tambah(){
		if($this->session->userdata('status')!='login'){
			redirect(base_url('index.php/login'));
		} else {
			if($this->session->userdata('jenis')=='anggaran'){
				$data['title'] = "Empowerment";
				$data['subtitle'] = "Admin";
				$data['view_sidebar'] = "layout/sidebar_anggaran";
				$data['view_isi'] = "anggaran/v_tambah";
				$this->load->view('layout/template',$data);
			} else {
				redirect(base_url('index.php/monitoring'));
			}

		}
	}

	public function tahunan(){
		if($this->session->userdata('status')!='login'){
			redirect(base_url('index.php/login'));
		} else {
			if($this->session->userdata('jenis')=='anggaran'){
				$data['title'] = "Empowerment";
				$data['subtitle'] = "Admin";
				$data['view_sidebar'] = "layout/sidebar_anggaran";
				$data['view_isi'] = "anggaran/v_tahunan";
				$this->load->view('layout/template',$data);
			} else {
				redirect(base_url('index.php/monitoring'));
			}

		}
	}

	public function input_anggaran(){
		$thn = date('Y');

		$tw1 = $this->input->get("tw1");
		$tw2 = $this->input->get("tw2");
		$tw3 = $this->input->get("tw3");
		$tw4 = $this->input->get("tw4");
			

		$this->M_anggaran->input_jatah($thn,$tw1, $tw2,$tw3,$tw4);
		echo "<script>
				alert('Input Berhasil');
				window.location.href='http://localhost/jasamarga/index.php/anggaran/tahunan';
			</script>";
	}

	public function input_penggunaan(){

		$deskripsi = $this->input->get("deskripsi");
		$total = $this->input->get("total");
		$tahun = $this->input->get("tahun");
		$triwulan = $this->input->get("triwulan");
		$tgl_tambah = $this->input->get("tgl_tambah");

		$x = $tahun.''.$triwulan;

		$this->M_anggaran->input_penggunaan($deskripsi,$total,$x,$tgl_tambah);
		echo "<script>
				alert('Berhasil menambahkan');
				window.location.href='http://localhost/jasamarga/index.php/anggaran/tambah';
			</script>";
	}
}