<?php

class M_jadwal extends CI_Model
{
	function logged_id()
	{
		return $this->session->userdata('username');
	}
	function tampil_jadwal($where)
	{
		$this->db->order_by('nama_hari DESC');
		$this->db->order_by('waktu_mulai ASC');
		$this->db->select('hari.nama_hari, matkul.nama_matkul, time_format(waktu.waktu_mulai, "%H:%i") as waktu_mulai, time_format(waktu.waktu_selesai, "%H:%i") AS waktu_selesai, dosen.nama_dosen, jadwal.ruangan, jadwal.golongan, matkul.semester');
        $this->db->from('jadwal, matkul, waktu, dosen, hari');
        $this->db->where('jadwal.kode_waktu=waktu.kode_waktu and jadwal.kode_matkul=matkul.kode_matkul and matkul.nip=dosen.nip and jadwal.kode_hari=hari.kode_hari');
        $this->db->where($where);
        $this->db->order_by('hari.kode_hari', 'asc');
        $this->db->order_by('waktu.waktu_mulai', 'desc');
		$query= $this->db->get();
		return $query;
	} 
}
