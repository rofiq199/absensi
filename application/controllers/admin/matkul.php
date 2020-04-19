<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class matkul extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_admin');
      }
    
	public function index()
	{     
        $data['prodi']= $this->m_admin->tampilprodi();
        $data['dosen']= $this->m_admin->tampildosen();
        $data['matkul']= $this->m_admin->tampilmatkul();
        $this->load->view('admin/header'); 
        $this->load->view('admin/list_matkul',$data);
        $this->load->view('admin/footer'); 
  }
    function add(){
      $kode_matkul = $this->input->post('kode_matkul');
      $nama_matkul = $this->input->post('nama_matkul');
      $prodi = $this->input->post('prodi');
      $dosen = $this->input->post('dosen');
      $semester = $this->input->post('semester');
    $data = array(
      'kode_matkul' => $kode_matkul,
      'kode_prodi' => $prodi,
      'nama_matkul' => $nama_matkul,
      'nip' => $dosen,
      'semester' => $semester
      );
    $this->m_admin->add($data,'matkul');
    redirect(base_url('admin/matkul'));
    }
    public function update(){
      $kode_matkul = $this->input->post('kode_matkul1');
      $nama_matkul = $this->input->post('nama_matkul1');
      $prodi = $this->input->post('prodi1');
      $dosen = $this->input->post('dosen1');
      $semester = $this->input->post('semester1');
      $data = array(
        'kode_prodi' => $prodi,
        'nama_matkul' => $nama_matkul,
        'nip' => $dosen,
        'semester' => $semester
        );
      $where = array('kode_matkul' => $kode_matkul );
      $this->m_admin->update($where,$data,'matkul');
    redirect(base_url('admin/matkul'));
    }
    function hapus($kode_matkul){
      $where = array('kode_matkul' => $kode_matkul);
      $this->m_admin->hapus($where,'matkul');
      redirect(base_url('admin/matkul'));
    }
}
