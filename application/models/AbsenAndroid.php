<?php

class AbsenAndroid extends CI_Model {

    /*
     * Get rows from the users table
     */
    function check($data1){
        $this->db->select('*');
        $this->db->from('qrdata, matkul');
        $this->db->where('qrdata.kode_matkul=matkul.kode_matkul');
        $this->db->where($data1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row_array();
        }
    }

    function mhs($data1){
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where($data1);
        $query = $this->db->get();
        return $query->row_array();
    }

    function checkAbsen($data1, $data2){
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->where($data1);
        $this->db->where($data2);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function input_data($data, $table){
        $this->db->insert($table, $data);
    }

}