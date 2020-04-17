<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('download');
        $this->load->model('m_admin');
      }
    
	public function index()
	{     
        $data['prodi']= $this->m_admin->prodi();
        $data['mahasiswa'] = $this->m_admin->list_mahasiswa();
        $this->load->view('admin/header'); 
        $this->load->view('admin/list_mahasiswa',$data);
        $this->load->view('admin/footer'); 
  }
  function add(){
      $nim = $this->input->post('nim');
      $nama = $this->input->post('nama');
      $golongan = $this->input->post('golongan');
      $password = $this->input->post('password');
      $prodi = $this->input->post('prodi');
      $semester = $this->input->post('semester');
    $data = array(
      'nim' => $nim,
      'kode_prodi' => $prodi,
      'nama_mahasiswa' => $nama,
      'password_mahasiswa' => $password,
      'golongan' => $golongan,
      'semester' => $semester
      );
    $this->m_admin->add($data,'mahasiswa');
    redirect(base_url('admin/mahasiswa'));
    }
  
  public function download(){
    force_download('excel/format_mahasiswa.xlsx',NULL);
  }
  public function upload(){
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
          redirect('admin/mahasiswa');

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
          redirect(base_url('admin/mahasiswa'));

      }
    }
    function update(){
      $kode_barang = $this->input->post('kode_barang1');
      $nama_supplier = $this->input->post('nama_supplier1');
      $nama_barang = $this->input->post('nama_barang1');
      $stok = $this->input->post('stok1');
      $harga = $this->input->post('harga1');
    
      $data = array(
        'kode_supplier' => $nama_supplier,
        'nama_barang' => $nama_barang,
        'harga' => $harga,
        'stok' => $stok
        );
    
      $where = array(
        'kd_barang' => $kode_barang
      );
      $this->m_barang->update_data($where,$data,'barang');
      redirect(base_url('barang'));
    }
    function hapus($nim){
      $where = array('nim' => $nim);
      $this->m_admin->hapus($where,'mahasiswa');
      redirect(base_url('admin/mahasiswa'));
    }
}
