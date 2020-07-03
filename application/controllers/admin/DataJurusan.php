<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataJurusan extends CI_Controller
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
      $this->load->view('admin/header', $x);
      $this->load->view('admin/list_jurusan', $data);
      $this->load->view('admin/footer');
    } else {
      redirect("Auth");
    }
  }
  function add()
  {
    $kode_jurusan = $this->input->post('kode_jurusan1');
    $nama_jurusan = $this->input->post('nama_jurusan1');
    $data = array(
      'kode_jurusan' => $kode_jurusan,
      'nama_jurusan' => $nama_jurusan
    );
    $this->m_admin->add($data, 'jurusan');
    redirect('admin/DataJurusan');
  }
  function update()
  {
    $kode_jurusan = $this->input->post('kode_jurusan');
    $nama_jurusan = $this->input->post('nama_jurusan');

    $data = array(
      'nama_jurusan' => $nama_jurusan
    );

    $where = array(
      'kode_jurusan' => $kode_jurusan
    );
    $this->m_admin->update($where, $data, 'jurusan');
    redirect('admin/DataJurusan');
  }
  function hapus($kode_jurusan)
  {
    $where = array('kode_jurusan' => $kode_jurusan);
    $this->m_admin->hapus($where, 'jurusan');
    redirect('admin/DataJurusan');
  }
}
