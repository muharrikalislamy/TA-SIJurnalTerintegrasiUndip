<?php

class M_nilai_murni extends CI_Model{

 	function tampil_data_nilai_murni(){
    	$query = "SELECT alternatif_details.kode_alternatif, alternatif_details.nama AS nama_alternatif, nilai_indikator.nama AS indikator, penilaian, catatan, nilai_murni.nilai, pengguna.nama_user FROM nilai_murni 
JOIN nilai_indikator ON nilai_murni.kode_indikator = nilai_indikator.kode_indikator AND nilai_murni.nilai = nilai_indikator.nilai
JOIN alternatif_details on nilai_murni.kode_alternatif = alternatif_details.kode_alternatif 
JOIN pengguna on alternatif_details.id_user = pengguna.id_user 
ORDER BY alternatif_details.id, nilai_murni.kode_indikator ASC";
    
    	return $this->db->query($query);  
	}

}
