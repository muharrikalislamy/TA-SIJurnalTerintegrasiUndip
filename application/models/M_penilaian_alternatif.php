<?php

class M_penilaian_alternatif extends CI_Model
{

  public function input_data_log_penilaian($tabel, $logpenilaian)
  {
    $this->db->insert($tabel, $logpenilaian);
  }

  public function tampil_data_alternatif_belum()
  {
    $query = "SELECT * FROM alternatif JOIN alternatif_details ON alternatif.kode_alternatif=alternatif_details.kode_alternatif WHERE status='Belum Dievaluasi'";
    return $this->db->query($query);
  }

  public function tampil_data_alternatif_sudah()
  {
    $query = "SELECT * FROM pengguna JOIN alternatif_details on alternatif_details.id_user = pengguna.id_user WHERE status='Sudah Dievaluasi' ORDER BY alternatif_details.waktu_penilaian DESC";
    return $this->db->query($query);
  }

  public function ambil_indikator()
  {
    $this->db->select('*');
    $this->db->from('indikator');
    return $this->db->get()->result();
  }

  public function ambil_nilai_indikator($kode)
  {
    $this->db->select('*');
    $this->db->where('kode_indikator', $kode);
    $this->db->from('nilai_indikator');
    return $this->db->get()->result();
  }

  public function get_kode_alternatif($id)
  {
    $param = array('kode_alternatif' => $id);
    return $this->db->get_where('alternatif_details', $param);
  }

  public function input_data_batch_nilai($data)
  {
    return $this->db->insert_batch('nilai_alternatif', $data) ? true : false;
  }

  public function input_data_batch_nilai_murni($data)
  {
    return $this->db->insert_batch('nilai_murni', $data) ? true : false;
  }

  public function jumlah_nilai_murni()
  {
    $query = $this->db->query("SELECT CAST(SUBSTRING(kode_alternatif, 2) AS UNSIGNED) AS sort, SUM(nilai) AS jnm FROM `nilai_murni` GROUP BY `kode_alternatif` ORDER BY sort ASC");
    return $query->result_array();
  }

  public function jumlah_kuadrat_nilai()
  {
    $query = $this->db->query("SELECT CAST(SUBSTRING(kode_kriteria, 2) AS UNSIGNED) AS sort, SUM(kuadrat_nilai) AS jkn FROM `nilai_alternatif` GROUP BY `kode_kriteria` ORDER BY sort ASC");
    return $query->result_array();
  }

  public function hitung_solusi_ideal_positif()
  {
    $query = $this->db->query("SELECT CAST(SUBSTRING(kode_kriteria, 2) AS UNSIGNED) AS sort, MAX(normalisasi_terbobot) AS sip FROM nilai_alternatif GROUP BY kode_kriteria ORDER BY sort ASC");
    return $query->result_array();
  }

  public function hitung_solusi_ideal_negatif()
  {
    $query = $this->db->query("SELECT CAST(SUBSTRING(kode_kriteria, 2) AS UNSIGNED) AS sort, MIN(normalisasi_terbobot) AS sin FROM nilai_alternatif GROUP BY kode_kriteria ORDER BY sort ASC");
    return $query->result_array();
  }

  public function jumlah_jarak_solusi_positif()
  {
    $query = $this->db->query("SELECT CAST(SUBSTRING(kode_alternatif, 2) AS UNSIGNED) AS sort, SQRT(SUM(jarak_solusi_positif)) AS jsp FROM `nilai_alternatif` GROUP BY `kode_alternatif` ORDER BY sort ASC");
    return $query->result_array();
  }

  public function jumlah_jarak_solusi_negatif()
  {
    $query = $this->db->query("SELECT CAST(SUBSTRING(kode_alternatif, 2) AS UNSIGNED) AS sort, SQRT(SUM(jarak_solusi_negatif)) AS jsn FROM `nilai_alternatif` GROUP BY `kode_alternatif` ORDER BY sort ASC");
    return $query->result_array();
  }

  public function update_jumlah_nilai_murni($data, $urutan)
  {
    $this->db->where('urutan', $urutan);
    $this->db->update('alternatif', ['jumlah_nilai_murni' => $data]);
  }

  public function update_jumlah_kuadrat($data, $urutan)
  {
    $this->db->where('urutan', $urutan);
    $this->db->update('kriteria', ['jumlah_kuadrat_nilai' => $data]);
  }

  public function update_solusi_ideal_positif($data, $urutan)
  {
    $this->db->where('urutan', $urutan);
    $this->db->update('kriteria', ['solusi_ideal_positif' => $data]);
  }

  public function update_solusi_ideal_negatif($data, $urutan)
  {
    $this->db->where('urutan', $urutan);
    $this->db->update('kriteria', ['solusi_ideal_negatif' => $data]);
  }

  public function update_jumlah_jarak_solusi_positif($data, $urutan)
  {
    $this->db->where('urutan', $urutan);
    $this->db->update('alternatif', ['jumlah_jarak_solusi_positif' => $data]);
  }

  public function update_jumlah_jarak_solusi_negatif($data, $urutan)
  {
    $this->db->where('urutan', $urutan);
    $this->db->update('alternatif', ['jumlah_jarak_solusi_negatif' => $data]);
  }

  public function update_status($atad, $id)
  {
    $this->db->where('kode_alternatif', $id);
    $this->db->update('alternatif_details', $atad);
  }

  public function update_kuadrat_nilai()
  {
    $query = "UPDATE nilai_alternatif set kuadrat_nilai = nilai * nilai";
    return $this->db->query($query);
  }

  public function update_normalisasi_alternatif()
  {
    $query = "UPDATE nilai_alternatif a JOIN kriteria k ON k.kode_kriteria = a.kode_kriteria SET a.normalisasi = (a.nilai / SQRT(k.jumlah_kuadrat_nilai))";
    return $this->db->query($query);
  }

  public function update_normalisasi_terbobot()
  {
    $query = "UPDATE nilai_alternatif a JOIN kriteria k ON k.kode_kriteria = a.kode_kriteria SET a.normalisasi_terbobot = (a.normalisasi * k.bobot_baru)";
    return $this->db->query($query);
  }

  public function update_jarak_solusi_positif()
  {
    $query = "UPDATE nilai_alternatif a JOIN kriteria k ON k.kode_kriteria = a.kode_kriteria SET a.jarak_solusi_positif = (a.normalisasi_terbobot - k.solusi_ideal_positif) * (a.normalisasi_terbobot - k.solusi_ideal_positif)";
    return $this->db->query($query);
  }

  public function update_jarak_solusi_negatif()
  {
    $query = "UPDATE nilai_alternatif a JOIN kriteria k ON k.kode_kriteria = a.kode_kriteria SET a.jarak_solusi_negatif = (a.normalisasi_terbobot - k.solusi_ideal_negatif) * (a.normalisasi_terbobot - k.solusi_ideal_negatif)";
    return $this->db->query($query);
  }

  public function update_preferensi()
  {
    $query = "UPDATE alternatif SET preferensi = jumlah_jarak_solusi_negatif / (jumlah_jarak_solusi_positif+jumlah_jarak_solusi_negatif)";
    return $this->db->query($query);
  }

  public function delete_penilaian_alternatif($id)
  {
    $this->db->where('kode_alternatif', $id);
    $this->db->delete('nilai_alternatif');
  }

  public function delete_nilai_murni_alternatif($id)
  {
    $this->db->where('kode_alternatif', $id);
    $this->db->delete('nilai_murni');
  }

  public function clean_alternatif()
  {
    $query = "UPDATE alternatif SET jumlah_jarak_solusi_positif = 0, jumlah_jarak_solusi_negatif = 0, preferensi = 0";
    return $this->db->query($query);
  }

  public function clean_kriteria()
  {
    $query = "UPDATE kriteria SET jumlah_kuadrat_nilai = 0, solusi_ideal_positif = 0, solusi_ideal_negatif = 0";
    return $this->db->query($query);
  }

  public function get_one($id)
  {
    $param = array('kode_alternatif' => $id);
    return $this->db->get_where('nilai_murni', $param);
  }
}
