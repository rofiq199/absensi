<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataProdi extends CI_Controller
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
      $data['jurusan'] = $this->m_admin->get('jurusan');
      $data['prodi'] = $this->m_admin->tampilprodi();
      $this->load->view('admin/header', $x);
      $this->load->view('admin/list_prodi', $data);
      $this->load->view('admin/footer');
    } else {
      redirect("Auth");
    }
  }
  function add()
  {
    $kode_prodi = $this->input->post('kode_prodi');
    $nama_prodi = $this->input->post('nama_prodi');
    $jurusan = $this->input->post('jurusan');
    $data = array(
      'kode_prodi' => $kode_prodi,
      'nama_prodi' => $nama_prodi,
      'kode_jurusan' => $jurusan
    );
    $this->m_admin->add($data, 'prodi');
    redirect('admin/dataprodi');
  }
  function update()
  {
    $kode_prodi = $this->input->post('kode_prodi');
    $nama_prodi = $this->input->post('nama_prodi');
    $jurusan = $this->input->post('jurusan');

    $data = array(
      'nama_prodi' => $nama_prodi,
      'kode_jurusan' => $jurusan
    );

    $where = array(
      'kode_prodi' => $kode_prodi
    );
    $this->m_admin->update($where, $data, 'prodi');
    redirect('admin/dataprodi');
  }
  function hapus($kode_prodi)
  {
    $where = array('kode_prodi' => $kode_prodi);
    $this->m_admin->hapus($where, 'prodi');
    redirect('admin/dataprodi');
  }
}
