<?php 
class jadwal extends CI_Controller {
    function __construct(){
		parent::__construct();		
        $this->load->model('m_jadwal');
	}
    public function index(){
        $semester = $this->session->userdata('semester');
		$golongan = $this->session->userdata('golongan');
		$where = array(
			'semester' => $semester,
			'golongan' => $golongan
            );
        $data['tampil'] = $this->m_jadwal->tampil_jadwal("tampil_jadwal",$where)->result_array();
        $this->load->view('tampil',$data);
    }
}
