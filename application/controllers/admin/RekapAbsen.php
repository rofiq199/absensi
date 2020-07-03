<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekapAbsen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_admin');
        $this->load->library('cetak_pdf');
    }

    public function index()
    {
        if ($this->m_admin->logged_id()) {
            $x['jurusan'] = $this->m_admin->select('jurusan')->result();
            $kode_matkul = $this->uri->segment('4');
            $golongan = $this->uri->segment('5');
            $semester = $this->uri->segment('6');
            $where = array(
                'golongan' => $golongan,
                'semester' => $semester
            );
            $where1 = array('kode_matkul' => $kode_matkul);
            $data['mahasiswa'] = $this->m_admin->show('mahasiswa', $where)->result();
            $data['pertemuan'] = $this->m_admin->select('pertemuan')->result();
            $data['rekap'] = $this->m_admin->show('absen', $where1)->result();
            $this->load->view('admin/header', $x);
            $this->load->view('admin/rekap_absen', $data);
            $this->load->view('admin/footer');
        } else {
            redirect("Auth");
        }
    }
    public function export()
    {

        $kode_matkul = $this->uri->segment('4');
        $golongan = $this->uri->segment('5');
        $semester = $this->uri->segment('6');
        $where = array(
            'golongan' => $golongan,
            'semester' => $semester
        );
        $where1 = array('kode_matkul' => $kode_matkul);
        $data['mahasiswa'] = $this->m_admin->show('mahasiswa', $where)->result();
        $data['pertemuan'] = $this->m_admin->select('pertemuan')->result();
        $data['rekap'] = $this->m_admin->show('absen', $where1)->result();

        $pdf = new FPDF('L', 'mm', 'A4');

        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'Rekap Absen ' . $kode_matkul, 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(8, 12, 'No', 1, 0, 'C');
        $pdf->Cell(80, 12, 'Nama Mahasiswa', 1, 0, 'C');
        $pdf->Cell(160, 6, 'minggu', 1, 1, 'C');
        $pdf->Cell(8, 6, '', 0, 0, 'C');
        $pdf->Cell(80, 6, '', 0, 0, 'C');

        foreach ($data['pertemuan'] as $key) {
            $pdf->Cell(10, 6, $key->minggu, 1, 0, 'C');
        }
        $pdf->Cell(15, 6, '', 0, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $no = 1;
        foreach ($data['mahasiswa'] as $a) {
            $pdf->Cell(8, 6, $no, 1, 0, 'C');
            $pdf->Cell(80, 6, $a->nama_mahasiswa, 1, 0, 'C');
            $no++;
            foreach ($data['pertemuan'] as $b) {

                foreach ($data['rekap'] as $c) {
                    if ($a->nim == $c->nim && $b->minggu == $c->pertemuan) {
                        $pdf->Cell(10, 6, $c->status, 1, 0, 'C');
                    }
                }
            }
            $pdf->Cell(15, 6, '', 0, 1, 'C');
        }
        $pdf->Cell(248, 0, '', 1, 1, 'C');
        // $barang = $this->db->get('barang')->result();
        // $no=0;
        // foreach ($barang as $data){
        //     $pdf->Cell(8,6,$no,1,0);
        //     $pdf->Cell(100,6,$data->nama_barang,1,0);
        //     $pdf->Cell(35,6,"Rp ".number_format($data->harga, 0, ".", "."),1,0);
        //     $pdf->Cell(15,6,$data->stok,1,1);
        //     $no++;
        // }
        $pdf->Output();
    }
}
