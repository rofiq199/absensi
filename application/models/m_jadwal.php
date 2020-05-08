<?php 

class m_jadwal extends CI_Model{	
	function tampil_jadwal($table,$where){
		$this->db->order_by('nama_hari DESC');
		$this->db->order_by('waktu_mulai ASC');		
		return $this->db->get_where($table,$where);
	}	
	 function jadwal(){
		return $this->db->from('jadwal')
		->join('matkul', 'jadwal.kode_matkul=matkul.kode_matkul')
		->join('waktu','jadwal.kode_waktu=waktu.kode_waktu')
		->join('hari','jadwal.kode_hari=hari.kode_hari')
    	->get()
    	->result();
	}
	function hari($tabel){
		return $this->db->get($tabel)->result();
	}
}