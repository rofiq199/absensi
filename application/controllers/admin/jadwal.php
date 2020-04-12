<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jadwal extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_admin');
      }
    
	public function index()
	{     
        $data['jadwal']= $this->m_admin->tampiljadwal();
        $this->load->view('admin/header'); 
        $this->load->view('admin/list_jadwal',$data);
        $this->load->view('admin/footer'); 
	}
}
