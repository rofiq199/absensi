<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_absen extends CI_Model {
  // Fungsi untuk menampilkan semua data gambar
  public function absensi($tabel,$where){
    return $this->db->get_where($tabel,$where);
  }
  public function tampilabsen($tabel,$where){
    return $this->db->get_where($tabel,$where)->result_array();
  }
  public function pertemuan(){
    $this->db->select('minggu');
    return $this->db->get('pertemuan');
  }
  public function rekap(){
    $this->db->select('kode_matkul, pertemuan, status');    
    $this->db->group_by('kode_matkul,pertemuan');
    $this->db->order_by('pertemuan','asc');
          $query = $this->db->get('absen');

    return $query->result();
  }
  public function kehadiran($matkul,$pertemuan)
  {
      $this->db->select('kode_matkul, pertemuan, status');    
$this->db->group_by('kode_matkul,pertemuan');
$this->db->order_by('pertemuan','asc');
      $query = $this->db->get_where('absen',array('kode_matkul'=>$matkul,'pertemuan'=>$pertemuan));
      $result = $query->result(); 
return $result;
}
}