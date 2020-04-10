<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_admin extends CI_Model {
  // Fungsi untuk menampilkan semua data gambar
  public function list_mahasiswa(){
    return $this->db->get('mahasiswa')->result();
  }
  public function prodi() {
    return $this->db->get('prodi')->result();
  }
  public function tampilprodi(){
    return $this->db->from('prodi')
    ->join('jurusan', 'prodi.kode_jurusan=jurusan.kode_jurusan')
    ->get()
    ->result();
}
  public function tampilmatkul(){
    return $this->db->from('matkul')
    ->join('dosen', 'matkul.nip=dosen.nip')
    ->get()
    ->result();
  }
  public function tampildosen(){
    return $this->db->get('dosen')->result();
  }
}
  