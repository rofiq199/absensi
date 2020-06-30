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
}