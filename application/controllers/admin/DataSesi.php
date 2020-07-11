<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataSesi extends CI_Controller
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
      $data['waktu'] = $this->m_admin->get('waktu');
      $this->load->view('admin/header', $x);
      $this->load->view('admin/list_sesi', $data);
      $this->load->view('admin/footer');
    } else {
      redirect("Auth");
    }
  }
  public function add()
  {
    $waktu_mulai = $this->input->post('waktu_mulai');
    $waktu_selesai = $this->input->post('waktu_selesai');
    $data = array(
      'waktu_mulai' => $waktu_mulai,
      'waktu_selesai' => $waktu_selesai
    );
    $this->m_admin->add($data, 'waktu');
    $this->session->set_flashdata('flash','Ditambahkan');
    redirect('admin/DataSesi');
  }
  public function update()
  {
    $kode_waktu = $this->input->post('kode_waktu');
    $waktu_mulai = $this->input->post('waktu_mulai1');
    $waktu_selesai = $this->input->post('waktu_selesai1');
    $data = array(
      'waktu_mulai' => $waktu_mulai,
      'waktu_selesai' => $waktu_selesai
    );
    $where = array('kode_waktu' => $kode_waktu);
    $this->m_admin->update($where, $data, 'waktu');
    $this->session->set_flashdata('flash','Diubah');
    redirect('admin/DataSesi');
  }
  function hapus($kode_sesi)
  {
    $where = array('kode_waktu' => $kode_sesi);
    $this->m_admin->hapus($where, 'waktu');
    $this->session->set_flashdata('flash','Dihapus');
    redirect('admin/DataSesi');
  }
}
