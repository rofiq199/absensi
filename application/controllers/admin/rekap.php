<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rekap extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_admin');
      }
    
	public function index()
	{    
        $data['prodi']=$this->m_admin->select('prodi')->result();
        $this->load->view('admin/header'); 
        $this->load->view('admin/rekap',$data);
        $this->load->view('admin/footer'); 
    }
    public function show()
    {
        
    }
  
}
