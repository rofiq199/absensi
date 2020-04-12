<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_admin');
      }
    
	public function index()
	{     
        $data['prodi']= $this->m_admin->prodi();
        $data['mahasiswa'] = $this->m_admin->list_mahasiswa();
        $this->load->view('admin/header'); 
        $this->load->view('admin/list_mahasiswa',$data);
        $this->load->view('admin/footer'); 
  }
  function add(){
    $nim = $this->input->post('nim');
    $nama = $this->input->post('nama');
    $golongan = $this->input->post('golongan');
    $password = $this->input->post('password');
    $prodi = $this->input->post('prodi');
    $semester = $this->input->post('semester');

    $data = array(
      'nim' => $nim,
      'kode_prodi' => $prodi,
      'nama_mahasiswa' => $nama,
      'password_mahasiswa' => $password,
      'golongan' => $golongan,
      'semester' => $semester
      );
    $this->m_admin->add($data,'mahasiswa');
    redirect(base_url('admin/mahasiswa'));
  }
}
