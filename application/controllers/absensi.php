<?php 
class absensi extends CI_Controller
{
    function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
 
	}
    public function index()
    {
        $this->load->view('admin/login');
    }

    function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'nim' => $username,
			'password_mahasiswa' => $password
			);
		$cek = $this->m_login->cek_login("mahasiswa",$where)->num_rows();

		$wheredosen = array(
			'nip' => $username,
			'password_dosen' => $password
			);
		$cekdosen = $this->m_login->cek_login("dosen",$wheredosen)->num_rows();

		$whereadmin = array(
			'username' => $username,
			'password' => $password
			);
		$cekadmin = $this->m_login->cek_login("admin",$whereadmin)->num_rows();
		if($cek > 0){
			$user= $this->m_login->cek_login("mahasiswa",$where)->result_array();
			foreach ($user as $key ) {
			$data_session = array(
				'username' => $username,
				'kode_prodi' => $key['kode_prodi'],
				'nama' => $key['nama_mahasiswa'],
				'semester' => $key['semester'],
				'golongan' => $key['golongan']
				);
			}
			$this->session->set_userdata($data_session);
			redirect(base_url('mahasiswa/absen'));
			// $this->load->view('home');
		//login dosen
		}else if($cekdosen > 0){
			$dosen= $this->m_login->cek_login("dosen",$wheredosen)->result_array();
			foreach ($dosen as $key ) {
			$data_session = array(
				'username' => $username,
				'kode_prodi' => $key['kode_prodi'],
				'nama' => $key['nama_dosen'],
				);
				}
				$this->session->set_userdata($data_session);
				redirect(base_url('dosen/matkul'));
				// $this->load->view('home');
		//login admin
		}else if($cekadmin > 0){
		$admin= $this->m_login->cek_login("admin",$whereadmin)->result_array();
		foreach ($admin as $key ) {
		$data_session = array(
		'username' => $username,
		);
		}
		$this->session->set_userdata($data_session);
		redirect(base_url('admin/jadwal'));
		// $this->load->view('home');
		
		}else{
			echo "Username dan password salah !";
		}
    }

    function logout(){
		$this->session->sess_destroy();
		redirect(base_url('absensi'));
	}
 
}
