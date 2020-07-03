<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalDos extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_admin');
      }
    
	public function index()
	{
    if ($this->m_admin->logged_id()) {
      $data['jadwal']= $this->m_admin->tampiljadwal();
      $this->load->view('template/header'); 
      $this->load->view('template/navbar'); 
      $this->load->view('template/sidebar'); 
      $this->load->view('admin/list_jadwal',$data);
      $this->load->view('template/footer'); 
  } else {
      redirect("Auth");
  }

  }
}
