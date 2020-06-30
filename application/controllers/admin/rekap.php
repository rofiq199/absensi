<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rekap extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_admin');
      }
    
	public function index($id)
	{    
        $where = array('kode_jurusan' => $id);
        $x['jurusan']=$this->m_admin->select('jurusan')->result();
        $data['prodi']=$this->m_admin->show('prodi',$where)->result();
        $this->load->view('admin/header',$x); 
        $this->load->view('admin/rekap_prodi',$data);
        $this->load->view('admin/footer'); 
    }
    public function show()
    {   $x['jurusan']=$this->m_admin->select('jurusan')->result();
        $prodi = $this->uri->segment('4');
        $semester = $this->uri->segment('5');
        $where= array(
            'kode_prodi' => $prodi,
            'semester' => $semester);
        $data['matkul']=$this->m_admin->show('matkul',$where)->result();
        $this->load->view('admin/header',$x); 
        $this->load->view('admin/rekap_matkul',$data);
        $this->load->view('admin/footer'); 
    }
  
}
