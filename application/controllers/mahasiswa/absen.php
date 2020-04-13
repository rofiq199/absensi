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
        $data['matkul']= $this->m_absen->absensi('matkul',$where)->result_array();
        // foreach ($data as $key) {
            
        
        // $tampil['kelas'] = [
        //     ['nama'=>'saya','kelas'=>$key['kode_matkul']],
        //     ['nama'=>'tober','kelas'=>$key['kode_matkul']]
        // ] ;}
            
        $parameter = array('nim' => $nim,
                        );
        $data['absen']= $this->m_absen->tampilabsen('absen',$parameter);
   
        $this->load->view('admin/header'); 
        $this->load->view('mahasiswa/absen',$data);
        $this->load->view('admin/footer'); 
	}
}
