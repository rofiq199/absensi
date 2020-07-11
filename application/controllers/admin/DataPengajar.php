<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPengajar extends CI_Controller
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
      $data['pengajar'] = $this->m_admin->tampilpengajar();
      $data['dosen'] = $this->m_admin->tampildosen();
      $data['matkul'] = $this->m_admin->tampilmatkul();
      $data['prodi'] = $this->m_admin->tampilprodi();
      $this->load->view('admin/header', $x);
      $this->load->view('admin/list_pengajar', $data);
      $this->load->view('admin/footer');
    } else {
      redirect("Auth");
    }
  }
  function add()
  {
    $nip = $this->input->post('nip');
    $matkul = $this->input->post('matkul');
    $data = array(
      'pengajar' => $nip,
      'kode_matkul' => $matkul

    );
    $this->m_admin->add($data, 'pengajar');
    $this->session->set_flashdata('flash','Ditambahkan');
    redirect('admin/DataPengajar');
  }
  function update()
  {
    $nip = $this->input->post('nip');
    $matkul = $this->input->post('matkul');
    $data = array(
      'pengajar' => $nip,
      'kode_matkul' => $matkul

    );

    $where = array(
      'nip' => $nip
    );
    $this->m_admin->update($where, $data, 'pengajar');
    $this->session->set_flashdata('flash','Diubah');
    redirect('admin/DataPengajar');
  }
  function hapus($nip)
  {
    $where = array('pengajar' => $nip);
    $this->m_admin->hapus($where, 'pengajar');
    $this->session->set_flashdata('flash','Dihapus');
    redirect('admin/DataPengajar');
  }
}
