<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataJadwal extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('m_admin');
  }

  public function index()
  {
    if ($this->m_admin->logged_id()) {
      $x['jurusan'] = $this->m_admin->select('jurusan')->result();
      $data['matkul'] = $this->m_admin->get('matkul');
      $data['waktu'] = $this->m_admin->get('waktu');
      $data['hari'] = $this->m_admin->get('hari');
      $data['jadwal'] = $this->m_admin->tampiljadwal();
      $this->load->view('admin/header', $x);
      $this->load->view('admin/list_jadwal', $data);
      $this->load->view('admin/footer');
    } else {
      redirect("Auth");
    }
  }

  function add()
  {
    $ruang = $this->input->post('ruang');
    $waktu = $this->input->post('waktu');
    $golongan = $this->input->post('golongan');
    $hari = $this->input->post('hari');
    $matkul = $this->input->post('matkul');
    $data = array(
      'kode_matkul' => $matkul,
      'kode_waktu' => $waktu,
      'kode_hari' => $hari,
      'ruangan' => $ruang,
      'golongan' => $golongan
    );
    $this->m_admin->add($data, 'jadwal');
    redirect('admin/datajadwal');
  }

  function update()
  {
    $kode_jadwal = $this->input->post('kode_jadwal');
    $ruang = $this->input->post('ruang');
    $waktu = $this->input->post('waktu');
    $golongan = $this->input->post('golongan');
    $hari = $this->input->post('hari');
    $matkul = $this->input->post('matkul');

    $data = array(
      'kode_matkul' => $matkul,
      'kode_waktu' => $waktu,
      'kode_hari' => $hari,
      'ruangan' => $ruang,
      'golongan' => $golongan
    );

    $where = array(
      'kode_jadwal' => $kode_jadwal
    );
    $this->m_admin->update($where, $data, 'jadwal');
    redirect('admin/datajadwal');
  }
  function hapus($kode_jadwal)
  {
    $where = array('kode_jadwal' => $kode_jadwal);
    $this->m_admin->hapus($where, 'jadwal');
    redirect('admin/datajadwal');
  }
}
