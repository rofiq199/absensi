<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gambar extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('m_gambar');
  }
  
  public function index(){
    $data['gambar'] = $this->m_gambar->view();
    $this->load->view('v_gambar', $data);
  }
  
  public function tambah(){
    $data = array();
    
    if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
      // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
      $upload = $this->m_gambar->upload();
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
         // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
        $this->m_gambar->save($upload);
        
        redirect('gambar'); // Redirect kembali ke halaman awal / halaman view data
      }else{ // Jika proses upload gagal
        $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    
    $this->load->view('v_form', $data);
  }
}