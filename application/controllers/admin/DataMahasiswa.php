<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataMahasiswa extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('download');
    $this->load->model('m_admin');
  }

  public function index()
  {
    if ($this->m_admin->logged_id()) {
      $x['jurusan'] = $this->m_admin->select('jurusan')->result();
      $data['prodi'] = $this->m_admin->prodi();
      $data['mahasiswa'] = $this->m_admin->list_mahasiswa();
      $this->load->view('admin/header', $x);
      $this->load->view('admin/list_mahasiswa', $data);
      $this->load->view('admin/footer');
    } else {
      redirect("Auth");
    }
  }
  function add()
  {
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
      'password_mahasiswa' => md5($password),
      'golongan' => $golongan,
      'semester' => $semester
    );
    $this->m_admin->add($data, 'mahasiswa');
    
    $this->session->set_flashdata('flash','Ditambahkan');
    redirect('admin/DataMahasiswa');
  }

  public function download()
  {
    force_download('excel/format_mahasiswa.xlsx', NULL);
  }
  public function upload()
  {
    // Load plugin PHPExcel nya
    include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

    $config['upload_path'] = realpath('excel');
    $config['allowed_types'] = 'xlsx|xls|csv';
    $config['max_size'] = '10000';
    $config['encrypt_name'] = true;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload()) {

      //upload gagal
      $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> ' . $this->upload->display_errors() . '</div>');
      //redirect halaman
      redirect('admin/DataMahasiswa');
    } else {

      $data_upload = $this->upload->data();

      $excelreader     = new PHPExcel_Reader_Excel2007();
      $loadexcel         = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
      $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

      $data = array();

      $numrow = 1;
      foreach ($sheet as $row) {
        if ($numrow > 1) {
          array_push($data, array(
            'nim' => $row['A'], // Insert data nis dari kolom A di excel
            'kode_prodi' => $row['B'], // Insert data nama dari kolom B di excel
            'nama_mahasiswa' => $row['C'], // Insert data jenis kelamin dari kolom C di excel
            'password_mahasiswa' => md5($row['D']), // Insert data alamat dari kolom D di excel
            'golongan' => $row['E'],
            'semester' => $row['F'],
          ));
        }
        $numrow++;
      }
      $this->db->insert_batch('mahasiswa', $data);
      //delete file from server
      unlink(realpath('excel/' . $data_upload['file_name']));

      //upload success
    $this->session->set_flashdata('flash','Diimport');
      //redirect halaman
      redirect('admin/DataMahasiswa');
    }
  }
  function update()
  {
    $nim = $this->input->post('nim1');
    $nama = $this->input->post('nama1');
    $golongan = $this->input->post('golongan1');
    $password = $this->input->post('password1');
    $prodi = $this->input->post('prodi1');
    $semester = $this->input->post('semester1');

    $data = array(
      'kode_prodi' => $prodi,
      'nama_mahasiswa' => $nama,
      'golongan' => $golongan,
      'semester' => $semester
    );

    $where = array(
      'nim' => $nim
    );
    $this->m_admin->update($where, $data, 'mahasiswa');
    
    $this->session->set_flashdata('flash','Diubah');
    redirect('admin/DataMahasiswa');
  }
  function hapus($nim)
  {
    $where = array('nim' => $nim);
    $this->m_admin->hapus($where, 'mahasiswa');
    
    $this->session->set_flashdata('flash','Dihapus');
    redirect('admin/DataMahasiswa');
  }
}
