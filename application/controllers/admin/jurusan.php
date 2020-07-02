<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jurusan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_admin');
      }
    
	public function index()
	{     
    $x['jurusan']=$this->m_admin->select('jurusan')->result();
        $data['jurusan'] = $this->m_admin->get('jurusan');
        $this->load->view('admin/header',$x); 
        $this->load->view('admin/list_jurusan',$data);
        $this->load->view('admin/footer'); 
  }
  function add(){
    $kode_jurusan = $this->input->post('kode_jurusan1');
    $nama_jurusan = $this->input->post('nama_jurusan1');
  $data = array(
    'kode_jurusan' => $kode_jurusan,
    'nama_jurusan' => $nama_jurusan
    );
  $this->m_admin->add($data,'jurusan');
  redirect(base_url('admin/jurusan'));
  }
  function update(){
    $kode_jurusan = $this->input->post('kode_jurusan');
    $nama_jurusan = $this->input->post('nama_jurusan');
  
    $data = array(
      'nama_jurusan' => $jurusan
      );
  
    $where = array(
      'kode_jurusan' => $kode_jurusan
    );
    $this->m_admin->update($where,$data,'jurusan');
    redirect(base_url('admin/jurusan'));
  }
  function hapus($kode_jurusan){
    $where = array('kode_jurusan' => $kode_jurusan);
    $this->m_admin->hapus($where,'jurusan');
    redirect(base_url('admin/jurusan'));
  }
}
