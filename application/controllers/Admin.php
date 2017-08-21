<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}

	public function index(){
		if($this->session->userdata('status')!='login'){
			redirect(base_url('index.php/login'));
		} else {
			$data['title'] = "Empowerment";
			$data['subtitle'] = "Admin";
			$data['view_isi'] = "v_home";
			
			
			$data['result'] = $this->M_update->get_last();
			$this->load->view('layout/template',$data);
		}
	}

	public function home(){
			$data['title'] = "Empowerment";
			$data['subtitle'] = "Admin";
			$data['view_isi'] = "v_home";


			$data['result'] = $this->M_update->get_last();	

			$this->load->view('layout/template',$data);
	}

	public function upload(){
			$data['title'] = "Empowerment";
			$data['subtitle'] = "Admin";
			$data['view_isi'] = "v_upload";
						
			$this->load->view('layout/template',$data);
	}	

	public function upload_db(){
		if ($_FILES['file']['name']) {
			$fileName = time().$_FILES['file']['name'];

			$config['upload_path'] = FCPATH .'assets/excel';
			$config['file_name'] = $fileName;
			$config['allowed_types'] = 'xls|xlsx';
			$config['max_size'] = 10000;

			$this->load->library('upload');
			$this->upload->initialize($config);

			if(! $this->upload->do_upload('file') )
			$this->upload->display_errors();

			$media = $this->upload->data('file');
			$inputFileName = $this->upload->data('full_path');

			try {
				$inputFileType = IOFactory::identify($inputFileName);
				$objReader = IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
			} catch(Exception $e) {
				die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
			}

			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();
			$banyakUpload = 0;
			for ($row = 2; $row <= $highestRow; $row++){                  
				//Read a row of data into an array
				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

				//Sesuaikan sama nama kolom tabel di database
				$data = array(
					"npp"=> $rowData[0][0],
					"nama"=> $rowData[0][1],
					"sex" =>  $rowData[0][2],
					"tempat_lahir" => $rowData[0][3] ,
					"tgl_lahir" =>  \PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][4], 'YYYY-MM-DD'),
					"grade" =>  $rowData[0][5],
					"tgl_tugas" =>  \PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][6], 'YYYY-MM-DD'),
					"job_name" =>  $rowData[0][7],
					"position_name" =>  $rowData[0][8],
					"org_name" =>  $rowData[0][9],
					"kel_jabatan" =>  $rowData[0][10],
				);

				if($rowData[0][0] == NULL && $rowData[0][1] == NULL && $rowData[0][2] == NULL && $rowData[0][3] == NULL && $rowData[0][4] == NULL && $rowData[0][5] == NULL && $rowData[0][6] == NULL && $rowData[0][7] == NULL && $rowData[0][8] == NULL && $rowData[0][9] == NULL && $rowData[0][10] == NULL){
					echo "<script>
							alert('$banyakUpload data sukses di upload');
							window.location.href='http://localhost/jasamarga/index.php/admin/upload';
						</script>";
				}

				$cek = $this->M_karyawan->cek_database($rowData[0][0], \PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][6], 'YYYY-MM-DD'));

				if($cek->num_rows() > 0){

				} else {
					//sesuaikan nama dengan nama tabel
					$this->M_karyawan->upload_database($data);
					//$insert = $this->db->insert("tbl_karyawan",$data);
					$banyakUpload++;
				}
			}
			unlink($inputFileName);
			$this->M_update->update_database(date('Y-m-d'));
			echo "<script>
					alert('$banyakUpload data sukses di upload');
					window.location.href='http://localhost/jasamarga/index.php/admin/upload';
				</script>";
		} else {
			echo "<script>
					alert('Pilih file yang akan di upload!');
					window.location.href='http://localhost/jasamarga/index.php/admin/upload';
				</script>";
		}
	}

	public function data_karyawan(){
		$data['title'] = "Empowerment";
		$data['subtitle'] = "Admin";
		$data['view_isi'] = "v_karyawan";
					
		$data['result'] = $this->M_karyawan->get_karyawan();
		$this->load->view('layout/template',$data);
	}

	public function search_npp(){
		$data['title'] = "Empowerment";
		$data['subtitle'] = "Admin";
		$data['view_isi'] = "v_search_npp";
					
		$this->load->view('layout/template',$data);
	}

	public function change_password(){
		$username = $this->session->userdata('nama');
		$pl = $this->input->post("password_lama");
		$pb = $this->input->post("password_baru");		
		$kpb = $this->input->post("konfirmasi_password_baru");

		$query = $this->db->query("SELECT password FROM tbl_admin WHERE username = '".$username."'");

		if($query->row()->password == md5($pl)){
			if($pb == $kpb){
				if($pb == $pl){
					echo "<script>
						alert('Password tidak berubah');
						window.location.href='http://localhost/jasamarga/index.php/admin/home';
					</script>";	
				} else {
					$q = $this->db->query("UPDATE tbl_admin SET password = '".md5($pb)."' WHERE username = '".$username."'");
					echo "<script>
						alert('Password berhasil diubah');
						window.location.href='http://localhost/jasamarga/index.php/admin/home';
					</script>";
				}
				
			} else {
				echo "<script>
					alert('Konfirmasi password baru salah');
					window.location.href='http://localhost/jasamarga/index.php/admin/home';
				</script>";
			}
		} else { 
			echo "<script>
					alert('Password lama salah');
					window.location.href='http://localhost/jasamarga/index.php/admin/home';
				</script>";
		}
		return $query->result();
	}


	public function hapus_karyawan($id){
		$hapus = $this->M_karyawan->delete_karyawan($id);
		if($hapus){
			$this->M_update->update_database(date('Y-m-d'));
			echo "<script>
					alert('Berhasil menghapus data');
					window.location.href='http://localhost/jasamarga/index.php/admin/home';
				</script>";
		}
	}

	public function update_karyawan(){
		$id = $this->input->post("edit_id");
		$npp = $this->input->post("edit_npp");
		$nama = $this->input->post("edit_name");
		$grade = $this->input->post("edit_grade");
		$tgl_tugas =  \PHPExcel_Style_NumberFormat::toFormattedString($this->input->post("edit_tgl_tugas"), 'YYYY-MM-DD');
		$job_name = $this->input->post("edit_job_name");
		$position_name = $this->input->post("edit_pos_name");
		$org_name = $this->input->post("edit_org_name");
		$kel_jabatan = $this->input->post("edit_kel_jabatan");
		$tempat_lahir = $this->input->post("edit_tempat_lahir");
		$tgl_lahir = \PHPExcel_Style_NumberFormat::toFormattedString($this->input->post("edit_tgl_lahir"), 'YYYY-MM-DD');
		$sex = $this->input->post("edit_gender");

		$data = array(
			'npp' => $npp,
			'nama' => $nama,
			'grade' => $grade,
			'tgl_tugas' => $tgl_tugas,
			'job_name' => $job_name,
			'position_name' => $position_name,
			'org_name' => $org_name,
			'tempat_lahir' => $tempat_lahir,
			'kel_jabatan' => $kel_jabatan,
			'tgl_lahir' => $tgl_lahir,
			'sex' => $sex
		);

		$ok = $this->M_karyawan->edit_karyawan($id, $data);
		if($ok){
			$this->M_update->update_database(date('Y-m-d'));
			echo "<script>
				alert('Update data berhasil');
				window.location.href='http://localhost/jasamarga/index.php/admin/';
			</script>";
		} else {
			echo "<script>
					alert('Update data gagal');
				</script>";
		}
	}
}
