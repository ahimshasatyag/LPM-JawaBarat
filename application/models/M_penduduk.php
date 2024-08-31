<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penduduk extends CI_Model
{
	public function tampil()
	{
		return $this->db->get('bansos')->result();
	}

	public function cari($nik)
	{
		$this->db->where('nik', $nik);
		$query = $this->db->get('bansos');
		if ($query->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}

	public function tambah($data)
	{
		return $this->db->insert('bansos', $data);
	}

	public function edit($nik)
	{
		$this->db->where('nik', $nik);
		return $this->db->get('bansos')->row();
	}

	public function proses_edit($where, $data)
	{
		$this->db->where($where);
		return $this->db->update('bansos', $data);
	}

	public function hapus($nik)
	{
		$this->db->where('nik', $nik);
		return $this->db->delete('bansos');
	}
	public function detail($nik = NULL)
	{
		$query = $this->db->get_where('bansos', array('nik' => $nik))->row();
		return $query;
	}
}






