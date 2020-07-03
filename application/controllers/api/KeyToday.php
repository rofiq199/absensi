<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class KeyToday extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('TodayAndroid');
    }

    //fungsi get adalah fungsi baca dari resource. Di sini untuk menampilkan data kontak
    function index_get() {
        $prodi = $this->get('kode_prodi');
        $gol = $this->get('golongan');
        $sms = $this->get('semester');
        $hari = $this->get('hari');
        $jadwal = $this->TodayAndroid->getJadwal(array('jadwal.golongan' => $gol), array('matkul.semester' => $sms), array('matkul.kode_prodi' => $prodi), array('hari.nama_hari' => $hari));
        if($jadwal != FALSE){
            $this->response([
                'status' => TRUE,
                'message' => 'Data Collected.',
                'data' => $jadwal
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'There is no schedule today'], REST_Controller::HTTP_OK);
        }
    }
}
