<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dosen extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_admin');
      }
    
	public function index()
	{      $x['jurusan']=$this->m_admin->select('jurusan')->result();
        $data['prodi']=$this->m_admin->tampilprodi();
        $data['dosen']= $this->m_admin->tampildosen();
        $this->load->view('admin/header',$x); 
        $this->load->view('admin/list_dosen',$data);
        $this->load->view('admin/footer'); 
  }
  function add(){
    $nip = $this->input->post('nip');
    $nama_dosen = $this->input->post('nama_dosen');
    $prodi = $this->input->post('prodi');
    $password = $this->input->post('password_dosen');
  $data = array(
    'nip' => $nip,
    'password_dosen' => $password,
    'kode_prodi' => $prodi,
    'nama_dosen' => $nama_dosen
    );
  $this->m_admin->add($data,'dosen');
  redirect(base_url('admin/dosen'));
  }
  function update(){
    $nip = $this->input->post('nip');
    $nama_dosen = $this->input->post('nama_dosen');
    $prodi = $this->input->post('prodi');
    $password = $this->input->post('password_dosen');
  
    $data = array(
      'password_dosen' => $password,
      'kode_prodi' => $prodi,
      'nama_dosen' => $nama_dosen
      );
  
    $where = array(
      'nip' => $nip
    );
    $this->m_admin->update($where,$data,'dosen');
    redirect(base_url('admin/dosen'));
  }
  function hapus($nip){
    $where = array('nip' => $nip);
    $this->m_admin->hapus($where,'dosen');
    redirect(base_url('admin/dosen'));
  }
}
