<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class KeyJadwal extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('JadwalAndroid');
    }

    //fungsi get adalah fungsi baca dari resource. Di sini untuk menampilkan data kontak
    function index_get() {
        $prodi = $this->get('kode_prodi');
        $gol = $this->get('golongan');
        $sms = $this->get('semester');
        $jadwal = $this->JadwalAndroid->getJadwal(array('jadwal.golongan' => $gol), array('matkul.semester' => $sms), array('matkul.kode_prodi' => $prodi));
        if($jadwal != FALSE){
            $this->response([
                'status' => TRUE,
                'message' => 'Data Collected.',
                'data' => $jadwal
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No Schedule Data'], REST_Controller::HTTP_OK);
        }
    }
}
