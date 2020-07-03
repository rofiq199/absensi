<?php
class JadwalMhs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_jadwal');
    }
    // public function jadwal()
    // {
    //     $semester = $this->session->userdata('semester');
    //     $golongan = $this->session->userdata('golongan');
    //     $kode_prodi = $this->session->userdata('kode_prodi');
    //     $where = array(
    //         'semester' => $semester,
    //         'golongan' => $golongan,
    //         'kode_prodi' => $kode_prodi
    //     );
    //     $data['tampil'] = $this->m_jadwal->tampil_jadwal("tampil_jadwal", $where)->result_array();
    //     $this->load->view('tampil', $data);
    // }
    public function index()
    {
        if ($this->m_jadwal->logged_id()) {
            $semester = $this->session->userdata('semester');
            $golongan = $this->session->userdata('golongan');
            $kode_prodi = $this->session->userdata('kode_prodi');
            $where = array(
                'matkul.semester' => $semester,
                'jadwal.golongan' => $golongan,
                'matkul.kode_prodi' => $kode_prodi
            );
            $data['jadwal'] = $this->m_jadwal->tampil_jadwal($where)->result();
            $this->load->view('mahasiswa/header');
            $this->load->view('mahasiswa/list_jadwal', $data);
            $this->load->view('mahasiswa/footer');
        } else {
            redirect("Auth");
        }
    }
}
