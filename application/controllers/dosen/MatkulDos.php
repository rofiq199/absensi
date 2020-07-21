<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MatkulDos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_dosen');
    }

    public function index()
    {
        if ($this->m_dosen->logged_id()) {
            $nip = $this->session->userdata('username');
            $where = array('pengajar' => $nip);
            $data['pertemuan'] = $this->m_dosen->get('pertemuan');
            $data['hak'] = $this->m_dosen->matkul($where);
            $data['absen'] = $this->m_dosen->get('absen');
            $this->load->view('dosen/header');
            $this->load->view('dosen/matkul', $data);
            $this->load->view('dosen/footer');
        } else {
            redirect("Auth");
        }
    }
    public function qrcode()
    {
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
        $id = uniqid();
        $kode_matkul = $this->uri->segment('4');
        $pertemuan = $this->uri->segment('5');
        $where = array(
            'id' => $id,
            'kode_matkul' => $kode_matkul,
            'pertemuan' => $pertemuan
        );
        $this->m_dosen->add($where, 'qrdata');
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)

        $this->ciqrcode->initialize($config);

        $image_name = $id . '.png'; //buat name dari qr code sesuai dengan nip

        $params['data'] = $id; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        redirect('dosen/MatkulDos/show/' . $id); //redirect ke pegawai usai simpan data
    }
    public function tampil($id)
    {
        if ($this->m_dosen->logged_id()) {
            $where = array('id' => $id);
            $data['matkul'] = $this->m_dosen->get_where('qrdata', $where)->result();
            $data['show']= $this->m_dosen->get_where('absen',$where)->result();
            $this->load->view('dosen/header');
            $this->load->view('dosen/tampil', $data);
            $this->load->view('dosen/footer');
        } else {
            redirect("Auth");
        }
    }
    public function show($id)
    {
        if ($this->m_dosen->logged_id()) {
            $where = array('id' => $id);
            $where1 = array('id_pertemuan' => $id);
            $data['matkul'] = $this->m_dosen->get_where('qrdata', $where)->result();
            $data['show']= $this->m_dosen->get_where('absen',$where1)->result();
            $data['tampil']=$this->m_dosen->join_tabel('absen','mahasiswa','absen.nim=mahasiswa.nim',$where1)->result();
            $this->load->view('dosen/header');
            $this->load->view('dosen/qrcode',$data);
            $this->load->view('dosen/footer');
        } else {
            redirect("Auth");
        }
    }
    function update()
    {
      $nim = $this->input->post('nip');
      $status = $this->input->post('status');
  
      $data = array(
        'status' => $status
    );
  
      $where = array(
        'nim' => $nim
      );
      $this->m_admin->update($where, $data, 'dosen');
      redirect('dosen');
    }
    function hapus($nip)
    {
      $where = array('nip' => $nip);
      $this->m_admin->hapus($where, 'dosen');
      $this->session->set_flashdata('flash','Dihapus');
      redirect('admin/DataDosen');
    }
}
