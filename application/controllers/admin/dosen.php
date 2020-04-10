<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dosen extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_admin');
      }
    
	public function index()
	{     
        $data['dosen']= $this->m_admin->tampilmatkul();
        $this->load->view('admin/header'); 
        $this->load->view('admin/list_dosen',$data);
        $this->load->view('admin/footer'); 
	}
}
