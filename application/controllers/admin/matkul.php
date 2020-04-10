<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class matkul extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_admin');
      }
    
	public function index()
	{     
        $data['matkul']= $this->m_admin->tampilmatkul();
        $this->load->view('admin/header'); 
        $this->load->view('admin/list_matkul',$data);
        $this->load->view('admin/footer'); 
	}
}
