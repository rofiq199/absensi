<?php

class TodayAndroid extends CI_Model {

    /*
     * Get rows from the users table
     */
    function getJadwal($field1, $field2, $field3, $field4)
    {
        $this->db->select('hari.nama_hari, matkul.nama_matkul,  time_format(waktu.waktu_mulai, "%H:%i") as waktu_mulai, time_format(waktu.waktu_selesai, "%H:%i") AS waktu_selesai, dosen.nama_dosen, jadwal.ruangan, jadwal.golongan, matkul.semester');
        $this->db->from('jadwal, matkul, waktu, dosen, hari');
        $this->db->where('jadwal.kode_waktu=waktu.kode_waktu and jadwal.kode_matkul=matkul.kode_matkul and matkul.nip=dosen.nip and jadwal.kode_hari=hari.kode_hari');
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->where($field3);
        $this->db->where($field4);
        $this->db->order_by('hari.kode_hari', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result_array();
        }
    }
}