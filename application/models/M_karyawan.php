<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {
	
	function get_karyawan(){
		$this->db->select('*');
		$this->db->from('tbl_karyawan');
		$this->db->order_by('tgl_tugas', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}

	function cek_database($npp, $tgl_tugas){
		$this->load->helper('url');
		$this->db->where('npp', $npp);
		$this->db->where('tgl_tugas', $tgl_tugas);
		return $this->db->get('tbl_karyawan');
	}

	function upload_database($data){
		$this->db->insert("tbl_karyawan",$data);
	}
	
}
