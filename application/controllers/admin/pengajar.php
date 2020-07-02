<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengajar extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_admin');
      }
    
	public function index(){     
    $x['jurusan']=$this->m_admin->select('jurusan')->result();
        $data['pengajar'] = $this->m_admin->tampilpengajar();
        $data['dosen']= $this->m_admin->tampildosen();
        $data['matkul']=$this->m_admin->tampilmatkul();
        $data['prodi']= $this->m_admin->tampilprodi();
        $this->load->view('admin/header',$x); 
        $this->load->view('admin/list_pengajar',$data);
        $this->load->view('admin/footer'); 
  }
  function add(){
    $nip = $this->input->post('nip');
    $matkul = $this->input->post('matkul');
   
  $data = array(
    'pengajar' => $nip,
    'kode_matkul' => $matkul
    
    );
  $this->m_admin->add($data,'pengajar');
  redirect(base_url('admin/pengajar'));
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
    $this->m_admin->update($where,$data,'pengajar');
    redirect(base_url('admin/pengajar'));
  }
  function hapus($nip){
    $where = array('pengajar' => $nip);
    $this->m_admin->hapus($where,'pengajar');
    redirect(base_url('admin/pengajar'));
  }
}