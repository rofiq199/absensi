<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rekap_absen extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_admin');
      }
    
	public function index()
	{    
        // $prodi = $this->session->userdata('kode_prodi');
        // $nim = $this->session->userdata('username');  
        // $semester = $this->session->userdata('semester');
        $where = array('golongan' => 'E',
                        'semester' => '4'
                        );
        $where1 = array('kode_matkul' => 'TIF4602'
                        );
        $data['mahasiswa']= $this->m_admin->show('mahasiswa',$where)->result();
        $data['pertemuan']= $this->m_admin->select('pertemuan')->result();       
        // $hasil = $this->m_absen->rekap();
        $data['rekap'] = $this->m_admin->show('absen',$where1)->result();
        $this->load->view('admin/header'); 
        $this->load->view('admin/rekap_absen',$data);
        $this->load->view('admin/footer'); 
    }
  
}
