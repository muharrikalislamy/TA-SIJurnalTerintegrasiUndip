<?php

class M_auth extends CI_Model
{

	function auth_check($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function tes_check($table, $tes)
	{
		return $this->db->get_where($table, $tes);
	}

	function ambil_user()
	{
		$query = "SELECT * FROM auth JOIN pengguna ON auth.username = pengguna.username";
		return $this->db->query($query);
	}

	function ambil_id_user($id)
	{
		$param = array('id_user' => $id);
		return $this->db->get_where('pengguna', $param);
	}

	function selectAll()
	{
		return $this->db->get('auth')->result();
	}

	function tampil_data()
	{
		return $this->db->get('auth');
	}

	function destroySession()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama_user');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('permission');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('foto');

		$this->session->sess_destroy();
	}

	function setulangFoto()
	{
		$this->session->unset_userdata('foto');
	}

	function setulangNama()
	{
		$this->session->unset_userdata('nama_user');
	}
}
