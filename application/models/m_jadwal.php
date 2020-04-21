<?php 

class m_jadwal extends CI_Model{	
	function tampil_jadwal($table,$where){
		$this->db->order_by('nama_hari DESC');
		$this->db->order_by('waktu_mulai ASC');		
		return $this->db->get_where($table,$where);
	}	
	function hari($tabel){
		return $this->db->get($tabel)->result();
	}
}