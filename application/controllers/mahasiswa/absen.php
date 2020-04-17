<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class absen extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_absen');
      }
    
	public function index()
	{    
        $prodi = $this->session->userdata('kode_prodi');
        $nim = $this->session->userdata('username');  
        $semester = $this->session->userdata('semester');
        $where = array('kode_prodi' => $prodi,
                        'semester' => $semester
                        );
        $data['matkul']= $this->m_absen->absensi('matkul',$where)->result();
        $data['pertemuan']= $this->m_absen->pertemuan()->result();       
        $hasil = $this->m_absen->rekap();
        $data['rekap'] = $this->m_absen->rekap();
        $this->load->view('admin/header'); 
        $this->load->view('mahasiswa/absen',$data);
        $this->load->view('admin/footer'); 
    }
  
}
