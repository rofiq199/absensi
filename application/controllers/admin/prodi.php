<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class prodi extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_admin');
      }
    
	public function index()
	{     
        $data['prodi']= $this->m_admin->tampilprodi();
        $this->load->view('admin/header'); 
        $this->load->view('admin/list_prodi',$data);
        $this->load->view('admin/footer'); 
	}
}
