<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_admin extends CI_Model {
  public function list_mahasiswa(){
    return $this->db->from('mahasiswa')
    ->join('prodi', 'mahasiswa.kode_prodi=prodi.kode_prodi')
    ->get()
    ->result();
  }
  public function prodi() {
    return $this->db->get('prodi')->result();
  }
function get($id){
  return $this->db->get($id)->result();
}
  public function tampilprodi(){
    return $this->db->from('prodi')
    ->join('jurusan', 'prodi.kode_jurusan=jurusan.kode_jurusan')
    ->get()
    ->result();
}
public function tampilpengajar(){
  return $this->db->from('pengajar')
  ->join('dosen', 'pengajar.nip=dosen.nip')
  ->join('matkul','pengajar.kode_matkul=matkul.kode_matkul')
  ->get()
  ->result();
}
  public function tampilmatkul(){
    return $this->db->from('matkul')
    ->join('dosen', 'matkul.nip=dosen.nip')
    ->join('prodi','matkul.kode_prodi=prodi.kode_prodi')
    ->get()
    ->result();
  }
  public function tampildosen(){
    return $this->db->from('dosen')
    ->join('prodi','dosen.kode_prodi=prodi.kode_prodi')
    ->get()
    ->result();
  }
  public function tampiljadwal(){
    return $this->db->from('jadwal')
    ->join('waktu', 'jadwal.kode_waktu=waktu.kode_waktu')
    ->join('matkul', 'jadwal.kode_matkul=matkul.kode_matkul')
    ->join('hari', 'jadwal.kode_hari=hari.kode_hari')
    ->get()
    ->result();
  }
    function select($tabel){
      return $this->db->get($tabel);
    }
    function show($tabel,$where){
    return $this->db->get_where($tabel,$where);
    }
  function hapus($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
      }
  
      function add($data,$table){
      $this->db->insert($table,$data);
      }
      function update($where,$data,$table){
      $this->db->where($where);
      $this->db->update($table,$data);
    }	
}
  