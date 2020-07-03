<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class KeyHadir extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config); 
        $this->load->database();
        $this->load->model('HadirAndroid');
    }

    //fungsi get adalah fungsi baca dari resource. Di sini untuk menampilkan data kontak
    function index_get() {
        $nim = $this->get('nim');
        $gol = $this->get('golongan');
        $sms = $this->get('semester');
        $status = "H";
        $kehadiran = $this->HadirAndroid->getData($nim, $gol, $sms, $status);
        if($kehadiran != FALSE){
            $this->response([
                'status' => TRUE,
                'message' => 'Data Collected.',
                'data' => $kehadiran
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'No Attendance Data.'], REST_Controller::HTTP_OK);
        }
    }
}
