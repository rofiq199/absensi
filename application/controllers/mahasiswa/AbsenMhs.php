<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AbsenMhs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_absen'); 
    }

    public function index()
    {
        if ($this->m_absen->logged_id()) {
            $prodi = $this->session->userdata('kode_prodi');
            $nim = $this->session->userdata('username');
            $semester = $this->session->userdata('semester');
            $golongan = $this->session->userdata('golongan');
            $status = "H";
            $where = array(
                'kode_prodi' => $prodi,
                'semester' => $semester
            );
            $where2 = array(
                'golongan_absen' => $golongan,
                'semester_absen' => $semester,
                'nim' => $nim
            );
            $data['matkul'] = $this->m_absen->absensi('matkul', $where)->result();
            $data['pertemuan'] = $this->m_absen->pertemuan()->result();
            $hasil = $this->m_absen->rekap($where2);
            $data['rekap'] = $this->m_absen->rekap($where2);
            $data['persen'] = $this->m_absen->persentase($nim, $golongan, $semester, $status)->result();
            $this->load->view('mahasiswa/header');
            $this->load->view('mahasiswa/absen', $data);
            $this->load->view('mahasiswa/footer');
        } else {
            redirect("Auth");
        }
    }
}
