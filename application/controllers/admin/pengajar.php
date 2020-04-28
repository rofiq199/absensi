<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengajar extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_admin');
      }
    
	public function index()
	{     
        $data['jurusan'] = $this->m_admin->get('jurusan');
        $data['prodi']= $this->m_admin->tampilprodi();
        $this->load->view('admin/header'); 
        $this->load->view('admin/list_prodi',$data);
        $this->load->view('admin/footer'); 
  }
}