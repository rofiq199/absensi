<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_absen extends CI_Model
{
  // Fungsi untuk menampilkan semua data gambar
  function logged_id()
  {
    return $this->session->userdata('username');
  }
  public function absensi($tabel, $where)
  {
    return $this->db->get_where($tabel, $where);
  }
  public function tampilabsen($tabel, $where)
  {
    return $this->db->get_where($tabel, $where)->result_array();
  }
  public function pertemuan()
  {
    $this->db->select('minggu');
    return $this->db->get('pertemuan');
  }
  public function rekap($where)
  {
    $this->db->select('absen.kode_matkul, qrdata.pertemuan, absen.status');
    $this->db->where('absen.id_pertemuan=qrdata.id');
    $this->db->where($where);
    $this->db->group_by('absen.kode_matkul,qrdata.pertemuan');
    $this->db->order_by('qrdata.pertemuan', 'asc');
    $query = $this->db->get('absen, qrdata');

    return $query->result();
  }
  public function kehadiran($matkul, $pertemuan)
  {
    $this->db->select('absen.kode_matkul, qrdata.pertemuan, absen.status');
    $this->db->from('absen, qrdata');
    $this->db->group_by('absen.kode_matkul, qrdata.pertemuan');
    $this->db->order_by('qrdata.pertemuan', 'asc');
    $this->db->where('absen.id_pertemuan=qrdata.id');
    $query = $this->db->get_where('absen', array('kode_matkul' => $matkul, 'pertemuan' => $pertemuan));
    $result = $query->result();
    return $result;
  }
  public function persentase($nim, $golongan, $semester, $status)
  {
    $query = $this->db->query("SELECT *, ROUND(T1.jumlah_hadir/T2.jumlah_pertemuan*100,0) AS persent FROM (SELECT absen.kode_matkul, COUNT(*) as jumlah_hadir FROM absen, qrdata WHERE qrdata.id=absen.id_pertemuan and absen.nim='$nim' and absen.semester_absen='$semester' AND absen.golongan_absen='$golongan' and absen.status='$status' GROUP BY absen.kode_matkul) AS T1 JOIN (SELECT absen.kode_matkul AS matkul, COUNT(*) as jumlah_pertemuan FROM absen, qrdata WHERE qrdata.id=absen.id_pertemuan and absen.nim='$nim' and absen.semester_absen='$semester' AND absen.golongan_absen='$golongan' GROUP BY absen.kode_matkul) AS T2 ON T1.kode_matkul = T2.matkul");
    
    return $query;
  }
}
