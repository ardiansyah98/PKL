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
				$data['chart'] = 'anggaran/home_chart';

				$data['bulan'] = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
				$data['total_penggunaan'] = array($tot1,$tot2,$tot3,$tot4,$tot5,$tot6,$tot7,$tot8,$tot9,$tot10,$tot11,$tot12);
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
				$data['chart'] = 'anggaran/home_chart';

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

	public function statistik($tahun){
		if($this->session->userdata('status')!='login'){
			redirect(base_url('index.php/login'));
		} else {
			if($this->session->userdata('jenis')=='anggaran'){
				$data['title'] = "Empowerment";
				$data['subtitle'] = "Admin";
				$data['view_sidebar'] = "layout/sidebar_anggaran";
				$data['view_isi'] = "anggaran/v_rekap2";
				$data['tahun'] = $tahun;

				$year = $tahun;
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
				$data['chart'] = 'anggaran/rekap_chart';

				$data['bulan'] = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
				$data['total_penggunaan'] = array($tot1,$tot2,$tot3,$tot4,$tot5,$tot6,$tot7,$tot8,$tot9,$tot10,$tot11,$tot12);

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

		$tw11 = $this->input->get("tw1");
		$tw21 = $this->input->get("tw2");
		$tw31 = $this->input->get("tw3");
		$tw41 = $this->input->get("tw4");

		$a = explode(",",$tw11);
		$b = explode(",",$tw21);
		$c = explode(",",$tw31);
		$d = explode(",",$tw41);

		$tw1= '';
		$tw2= '';
		$tw3= '';
		$tw4= '';

		for($i=0; $i<sizeof($a);$i++){
			$tw1.=$a[$i];
		}
		for($i=0; $i<sizeof($b);$i++){
			$tw2.=$a[$i];
		}
		for($i=0; $i<sizeof($c);$i++){
			$tw3.=$a[$i];
		}
		for($i=0; $i<sizeof($d);$i++){
			$tw4.=$a[$i];
		}

			

		$this->M_anggaran->input_jatah($thn,intval($tw1), intval($tw2),intval($tw3),intval($tw4));
		echo "<script>
				alert('Input Berhasil');
				window.location.href='http://localhost/jasamarga/index.php/anggaran/tahunan';
			</script>";
	}

	public function input_penggunaan(){
		$m = date('m');
		$x = 0;
		if($m=='03' || $m=='02' || $m=='01'){
			$x = '1';
		}
		else if($m=='04' || $m=='05' || $m=='06'){
			$x ='2';
		}
		else if($m=='07' || $m=='08' || $m=='09'){
			$x = '3';
		}
		else{
			$x = '4';
		}

		$t = date('Y').''.$x;
		$total = $this->M_anggaran->cek_jatah($t);
		$penggunaan = $this->M_anggaran->cek_penggunaan($t);

		$tot = 0;

		foreach($total->result() as  $t){
		$tot = $t->jatah;
		}

		$value = 0;
		foreach($penggunaan->result() as $res){
		$value = $value + $res->total;
		}


		$sisa = $tot - $value;


		$deskripsi = $this->input->get("deskripsi");
		$tot = $this->input->get("total");
		$tahun = $this->input->get("tahun");
		$triwulan = $this->input->get("triwulan");
		$tgl_tambah = $this->input->get("tgl_tambah");

		$a = explode(",",$tot);
		$total='';
		for($i=0; $i<sizeof($a);$i++){
			$total.=$a[$i];
		}

		$x = $tahun.''.$triwulan;
		if($total>$sisa){
			echo "<script>
					alert('Gagal! Sisa anggaran tidak mencukupi');
					window.location.href='http://localhost/jasamarga/index.php/anggaran/tambah';
				</script>";
		} else if($total==0){
			echo "<script>
					alert('Gagal! Total penggunaan tidak boleh nol');
					window.location.href='http://localhost/jasamarga/index.php/anggaran/tambah';
				</script>";
		}else {
			$this->M_anggaran->input_penggunaan($deskripsi,intval($total),$x,$tgl_tambah);
			echo "<script>
					alert('Berhasil menambahkan');
					window.location.href='http://localhost/jasamarga/index.php/anggaran/tambah';
				</script>";
		}
	}

	public function edit_triwulan1(){
		$b = $this->input->post("tw1_baru");	
		$a = explode(",",$b);

		$baru='';
		for($i=0; $i<sizeof($a);$i++){
			$baru.=$a[$i];
		}

		$this->M_anggaran->update_triwulan(1,$baru);

		echo "<script>
					alert('Berhasil');
					window.location.href='http://localhost/jasamarga/index.php/anggaran/tahunan';
				</script>";
	}

	public function edit_triwulan2(){
		$b = $this->input->post("tw2_baru");	
		$a = explode(",",$b);

		$baru='';
		for($i=0; $i<sizeof($a);$i++){
			$baru.=$a[$i];
		}

		$this->M_anggaran->update_triwulan(2,$baru);

		echo "<script>
					alert('Berhasil');
					window.location.href='http://localhost/jasamarga/index.php/anggaran/tahunan';
				</script>";

	}

	public function edit_triwulan3(){
		$b = $this->input->post("tw3_baru");	
		$a = explode(",",$b);

		$baru='';
		for($i=0; $i<sizeof($a);$i++){
			$baru.=$a[$i];
		}

		$this->M_anggaran->update_triwulan(3,$baru);

		echo "<script>
					alert('Berhasil');
					window.location.href='http://localhost/jasamarga/index.php/anggaran/tahunan';
				</script>";

	}

	public function edit_triwulan4(){
		$b = $this->input->post("tw4_baru");	
		$a = explode(",",$b);

		$baru='';
		for($i=0; $i<sizeof($a);$i++){
			$baru.=$a[$i];
		}

		$this->M_anggaran->update_triwulan(4,$baru);

		echo "<script>
					alert('Berhasil');
					window.location.href='http://localhost/jasamarga/index.php/anggaran/tahunan';
				</script>";

	}
}