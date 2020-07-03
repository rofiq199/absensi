<?php

class HadirAndroid extends CI_Model {

    /*
     * Get rows from the users table
     */
    function getData($field1, $field2, $field3, $field4)
    { 

        $query=$this->db->query("SELECT * FROM 
                        (SELECT matkul.nama_matkul, COUNT(*) as jumlah_hadir, GROUP_CONCAT(qrdata.pertemuan ORDER BY qrdata.pertemuan ASC SEPARATOR '   ') as minggu_hadir FROM absen, matkul, qrdata WHERE qrdata.id=absen.id_pertemuan AND absen.kode_matkul=matkul.kode_matkul and absen.nim='$field1' and absen.semester_absen='$field3' AND absen.golongan_absen='$field2' and absen.status='$field4' GROUP BY absen.kode_matkul) AS T1 
                        JOIN (SELECT nama_matkul AS matkul, COUNT(*) as jumlah_pertemuan, GROUP_CONCAT(qrdata.pertemuan ORDER BY qrdata.pertemuan SEPARATOR '   ') as minggu_pertemuan, GROUP_CONCAT(absen.status ORDER BY qrdata.pertemuan SEPARATOR '   ') as status_absen FROM absen, matkul, qrdata WHERE qrdata.id=absen.id_pertemuan AND absen.kode_matkul=matkul.kode_matkul and absen.nim='$field1' and absen.semester_absen='$field3' AND absen.golongan_absen='$field2' GROUP BY absen.kode_matkul) AS T2 
                        ON T1.nama_matkul = T2.matkul");
        
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result_array();
        } 






        // $this->db->select('matkul.nama_matkul, COUNT(*) as jumlah');
        // $this->db->from('absen, matkul');
        // $this->db->where('absen.kode_matkul=matkul.kode_matkul');
        // $this->db->where($field1);
        // $this->db->where($field2);
        // $this->db->where($field3);
        // $this->db->where($field4);
        // $this->db->group_by('absen.kode_matkul');
        // $query = $this->db->get();
        // if ($query->num_rows() == 0) {
        //     return FALSE;
        // } else {
        //     return $query->result_array();
        // }
    }
}