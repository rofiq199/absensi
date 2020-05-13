<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_dosen extends CI_Model {
    public function matkul($where){
        return $this->db->from('pengajar')
        ->join('matkul','pengajar.kode_matkul=matkul.kode_matkul')
        ->where($where)
        ->get()
        ->result();
    }
    public function get($tabel){
    return $this->db->get($tabel)->result();
    }
    
    public function get_where($tabel,$where){
        return $this->db->get_where($tabel,$where);
	
    }
    function add($data,$table){
        $this->db->insert($table,$data);
        }
}