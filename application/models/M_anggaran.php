<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Anggaran extends CI_Model {
	
	function cek_jatah($where){
		$query = "SELECT * FROM tbl_anggaran WHERE tahun_tw='$where'";
		return $this->db->query($query);
	}

	function input_jatah($thn,$tw1, $tw2, $tw3, $tw4){
		$t1 = $thn.'1';
		$t2 = $thn.'2';
		$t3 = $thn.'3';
		$t4 = $thn.'4';

		$query1 = "INSERT INTO tbl_anggaran (tahun_tw,jatah) VALUES ('$t1', $tw1)";
		$query2 = "INSERT INTO tbl_anggaran (tahun_tw,jatah) VALUES ('$t2', $tw2)";
		$query3 = "INSERT INTO tbl_anggaran (tahun_tw,jatah) VALUES ('$t3', $tw3)";
		$query4 = "INSERT INTO tbl_anggaran (tahun_tw,jatah) VALUES ('$t4', $tw4)";

		$this->db->query($query1);
		$this->db->query($query2);
		$this->db->query($query3);
		$this->db->query($query4);
	}

	function input_penggunaan($des, $total,$x,$tgl_tambah){
		$query = "INSERT INTO tbl_penggunaan_anggaran(penggunaan,total,tahun_tw,waktu) VALUES ('$des',$total,'$x','$tgl_tambah')";
		$this->db->query($query);
	}

	function cek_penggunaan($where){
		$query = "SELECT * FROM tbl_penggunaan_anggaran WHERE tahun_tw='$where'";
		return $this->db->query($query);
	}

	function cek_penggunaan2($where){
		$query = "SELECT * FROM tbl_penggunaan_anggaran WHERE waktu LIKE '%$where%'";
		return $this->db->query($query);
	}
}
