<?php 
class json extends CI_Controller
{
    function __construct(){
		parent::__construct();		
		$this->load->model('m_admin');
 
    }
    public function index()
    {
        $data['dosen']=$this->m_admin->tampildosen();
        
       echo json_encode(array("hasil"=>$data['dosen']));
    }
}