<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_absen extends CI_Model {
  // Fungsi untuk menampilkan semua data gambar
  public function absensi($tabel,$where){
    return $this->db->get_where($tabel,$where);
  }
  public function tampilabsen($tabel,$where){
      $this->db->group_by('kode_matkul');
    return $this->db->get_where($tabel,$where)->result_array();
  }
}