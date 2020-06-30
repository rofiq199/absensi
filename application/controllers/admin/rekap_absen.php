<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rekap_absen extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_admin');
      }
    
	public function index()
    {     $x['jurusan']=$this->m_admin->select('jurusan')->result();
        $kode_matkul = $this->uri->segment('4');
        $golongan = $this->uri->segment('5');
        $semester = $this->uri->segment('6');
        $where = array('golongan' => $golongan,
                        'semester' => $semester
                        );
        $where1 = array('kode_matkul' => $kode_matkul
                        );
        $data['mahasiswa']= $this->m_admin->show('mahasiswa',$where)->result();
        $data['pertemuan']= $this->m_admin->select('pertemuan')->result();       
        // $hasil = $this->m_absen->rekap();
        $data['rekap'] = $this->m_admin->show('absen',$where1)->result();
        $this->load->view('admin/header',$x); 
        $this->load->view('admin/rekap_absen',$data);
        $this->load->view('admin/footer'); 
    }
  
}
