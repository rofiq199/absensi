<?php 
class jadwal extends CI_Controller {
    function __construct(){
		parent::__construct();		
        $this->load->model('m_jadwal');
	}
    public function jadwal(){
        $semester = $this->session->userdata('semester');
		$golongan = $this->session->userdata('golongan');
		$where = array(
			'semester' => $semester,
			'golongan' => $golongan
            );
        $data['tampil'] = $this->m_jadwal->tampil_jadwal("tampil_jadwal",$where)->result_array();
        $this->load->view('tampil',$data);
    }
    public function index(){
        
        $semester = $this->session->userdata('semester');
		$golongan = $this->session->userdata('golongan');
		$where = array(
			'semester' => $semester,
			'golongan' => $golongan
            );
        $data['hari']= $this->m_jadwal->hari('hari');
        $data['jadwal'] = $this->m_jadwal->tampil_jadwal("tampil_jadwal",$where)->result();
        $data['jadwal1']=$this->m_jadwal->jadwal();
        $this->load->view('mahasiswa/header');
        $this->load->view('mahasiswa/list_jadwal',$data);
        $this->load->view('mahasiswa/footer');
    }
}
