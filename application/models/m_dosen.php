<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_dosen extends CI_Model
{
    function logged_id()
	{
		return $this->session->userdata('username');
	}
    public function matkul($where)
    {
        return $this->db->from('pengajar')
            ->join('matkul', 'pengajar.kode_matkul=matkul.kode_matkul')
            ->where($where)
            ->get()
            ->result();
    }
    public function get($tabel)
    {
        return $this->db->get($tabel)->result();
    }

    public function get_where($tabel, $where)
    {
        return $this->db->get_where($tabel, $where);
    }
    function add($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function join_tabel($tabel1,$tabel2,$join,$where)
    {
        return $this->db->from($tabel1)
            ->join($tabel2, $join)
            ->where($where)
            ->get();
    }
}
