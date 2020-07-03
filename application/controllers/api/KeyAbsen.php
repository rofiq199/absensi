<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class KeyAbsen extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('AbsenAndroid');
    }

    //fungsi get adalah fungsi baca dari resource. Di sini untuk menampilkan data kontak
    function index_post()
    {
        $nim = $this->post('nim');
        $pertemuan = $this->post('pertemuan');
        $date = date('Y-m-d H:i:s');
        //$timestamp = date('Y-m-d H:i:s');
        $checkpertemuan = $this->AbsenAndroid->check(array('qrdata.id' => $pertemuan));
        $checkmhs = $this->AbsenAndroid->mhs(array('nim' => $nim));

        if ($checkpertemuan != FALSE) {
            $checkabsen = $this->AbsenAndroid->checkAbsen(array('absen.id_pertemuan' => $pertemuan), array('absen.nim' => $nim));
            if($checkmhs['semester']==$checkpertemuan['semester']){
                if ($checkabsen == 0) {
                    $data1 = array(
                        'id_pertemuan' => $pertemuan,
                        'pertemuan' => $checkpertemuan['pertemuan'],
                        'nim' => $nim,
                        'kode_matkul' => $checkpertemuan['kode_matkul'],
                        'golongan_absen' =>  $checkmhs['golongan'],
                        'semester_absen' => $checkmhs['semester'],
                        'status' => 'H',
                        'tanggal_absen' => $date
                    );
                    $this->AbsenAndroid->input_data($data1, 'absen');
                    $data = array(
                        'id_pertemuan' => $pertemuan,
                        'nim' => $nim,
                        'nama_mahasiswa' => $checkmhs['nama_mahasiswa'],
                        'kode_matkul' => $checkpertemuan['kode_matkul'],
                        'nama_matkul' => $checkpertemuan['nama_matkul'],
                        'pertemuan' => $checkpertemuan['pertemuan'],
                        'golongan_absen' =>  $checkmhs['golongan'],
                        'semester_absen' => $checkmhs['semester'],
                        'status' => 'Present',
                        'tanggal_absen' => $date
                    );
                    $this->response([
                        'status' => TRUE,
                        'message' => 'Success',
                        'data' => [$data]
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'You Already Presence.'
                    ], REST_Controller::HTTP_OK);
                }

            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'Your data is not permitted for presence.'
                ], REST_Controller::HTTP_OK);
            }
            
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Meeting data not found.'
            ], REST_Controller::HTTP_OK);
        }
    }
}
