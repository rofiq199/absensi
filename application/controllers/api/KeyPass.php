<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class KeyPass extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //fungsi get adalah fungsi baca dari resource. Di sini untuk menampilkan data kontak
    function index_post() {
        $nim = $this->post('nim');
        $pass = md5($this->post('pass'));
        $value = array(
            'password_mahasiswa' => $pass
        );
        $this->db->set($value);
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa');
        $this->response([
            'status' => TRUE,
            'message' => 'Data Updated'
        ], REST_Controller::HTTP_OK);
    }
}
