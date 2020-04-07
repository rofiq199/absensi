<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class input extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('m_excel');
      }
    
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function index(){
        $data['mahasiswa'] = $this->m_excel->view();
        $this->load->view('mahasiswa/tampil', $data);
      }
      
      public function form(){
        $data = array(); // Buat variabel $data sebagai array
        
        if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
          // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
          $upload = $this->m_excel->upload_file($this->filename);
          
          if($upload['result'] == "success"){ // Jika proses upload sukses
            // Load plugin PHPExcel nya
            include APPPATH.'third_party/PHPExcel/PHPExcel.php';
            
            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
            
            // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
            // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
            $data['sheet'] = $sheet; 
          }else{ // Jika proses upload gagal
            $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
          }
        }
        
        $this->load->view('mahasiswa/form', $data);
      }
      
      public function import(){
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
        $data = array();
        
        $numrow = 1;
        foreach($sheet as $row){
          // Cek $numrow apakah lebih dari 1
          // Artinya karena baris pertama adalah nama-nama kolom
          // Jadi dilewat saja, tidak usah diimport
          if($numrow > 1){
            // Kita push (add) array data ke variabel data
            array_push($data, array(
              'nim'=>$row['A'], // Insert data nis dari kolom A di excel
              'kode_prodi'=>$row['B'], // Insert data nama dari kolom B di excel
              'nama_mahasiswa'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
              'password_mahasiswa'=>$row['D'], // Insert data alamat dari kolom D di excel
              'golongan'=>$row['E'],
              'semester'=>$row['F'],
            ));
          }
          
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
        $this->m_excel->insert_multiple($data);
        
        redirect("input"); // Redirect ke halaman awal (ke controller siswa fungsi index)
      }
      function tambah(){
        $this->load->view('mahasiswa/tambah');
      }
      public function upload()
      {
          // Load plugin PHPExcel nya
          include APPPATH.'third_party/PHPExcel/PHPExcel.php';
  
          $config['upload_path'] = realpath('excel');
          $config['allowed_types'] = 'xlsx|xls|csv';
          $config['max_size'] = '10000';
          $config['encrypt_name'] = true;
  
          $this->load->library('upload', $config);
  
          if (!$this->upload->do_upload()) {
  
              //upload gagal
              $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
              //redirect halaman
              redirect('import/');
  
          } else {
  
              $data_upload = $this->upload->data();
  
              $excelreader     = new PHPExcel_Reader_Excel2007();
              $loadexcel         = $excelreader->load('excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
              $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
  
              $data = array();
  
              $numrow = 1;
              foreach($sheet as $row){
                              if($numrow > 1){
                                  array_push($data, array(
                                    'nim'=>$row['A'], // Insert data nis dari kolom A di excel
                                    'kode_prodi'=>$row['B'], // Insert data nama dari kolom B di excel
                                    'nama_mahasiswa'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
                                    'password_mahasiswa'=>$row['D'], // Insert data alamat dari kolom D di excel
                                    'golongan'=>$row['E'],
                                    'semester'=>$row['F'],
                                  ));
                      }
                  $numrow++;
              }
              $this->db->insert_batch('mahasiswa', $data);
              //delete file from server
              unlink(realpath('excel/'.$data_upload['file_name']));
  
              //upload success
              $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
              //redirect halaman
              redirect('mahasiswa/input');
  
          }
      }
    }

