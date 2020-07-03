<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Authentication extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserAndroid');
    }

    public function index_post() {
        $nim = $this->post('nim');
        $password = md5($this->post('password'));
            $checking = $this->UserAndroid->check_login('mahasiswa', array('nim' => $nim), array('password_mahasiswa' => $password));
            
            if($checking != FALSE){
                $this->response([
                    'status' => TRUE,
                    'message' => 'User login successful.',
                    'data' => $checking
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'Wrong email or password.'], REST_Controller::HTTP_OK);
            }
    }
}
?>