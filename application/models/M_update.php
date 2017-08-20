<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_update extends CI_Model {
	
	function get_last(){
		$this->db->select('*');
		$this->db->from('tbl_last_update');
		$query = $this->db->get();

		return $query->result();
	}

	function update_database($date){
		$data = array(
			'last_update' => $date
		);

		$this->db->where('id', 1);
		return $this->db->update('tbl_last_update', $data);
	}
	
}
