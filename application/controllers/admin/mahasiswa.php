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
}
