<?php

class M_log_penilaian extends CI_Model
{

	function tampil_data_log_penilaian()
	{
		$query = "SELECT * FROM log_penilaian JOIN pengguna ON log_penilaian.id_user = pengguna.id_user JOIN alternatif_details ON log_penilaian.kode_alternatif = alternatif_details.kode_alternatif ORDER BY Waktu DESC";
		return $this->db->query($query);
	}

	function delete_log()
	{
		$query = "DELETE FROM log_penilaian";
		return $this->db->query($query);
	}
}
