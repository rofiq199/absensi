<?php

class UserAndroid extends CI_Model {

    /*
     * Get rows from the users table
     */
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('prodi', 'mahasiswa.kode_prodi=prodi.kode_prodi');
        $this->db->join('jurusan', 'prodi.kode_jurusan=jurusan.kode_jurusan');
        $this->db->where($field1);
        $this->db->where($field2);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result_array();
        }
    }

}