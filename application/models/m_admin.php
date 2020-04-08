<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_admin extends CI_Model {
  // Fungsi untuk menampilkan semua data gambar
  public function list_mahasiswa(){
    return $this->db->get('mahasiswa')->result();
  }
}
  