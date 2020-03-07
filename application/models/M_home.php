<?php

class M_home extends CI_Model
{

  public function get_user_count()
  {
    $data = $this->db->query('select count(*) as count from pengguna');

    return $data->result();
  }

  public function get_kriteria_count()
  {
    $data = $this->db->query('select count(*) as count from kriteria');

    return $data->result();
  }

  public function get_indikator_count()
  {
    $data = $this->db->query('select count(*) as count from indikator');

    return $data->result();
  }

  public function get_jurnaltinggi_count()
  {
    $data = $this->db->query("select count(*) as count from jurnal_pengindeks WHERE kode_pengindeks='1' OR kode_pengindeks='7'");
    return $data->result();
  }

  public function get_jurnaldoaj_count()
  {
    $data = $this->db->query("select count(*) as count from jurnal_pengindeks WHERE kode_pengindeks=3");
    return $data->result();
  }

  public function get_jurnaltinggi()
  {
    $where = "kode_pengindeks='1' OR kode_pengindeks='7'";
    $this->db->select('*');
    $this->db->from('jurnal_pengindeks');
    $this->db->where($where);
    $this->db->join('jurnal', 'jurnal.kode_jurnal=jurnal_pengindeks.kode_jurnal');
    $this->db->join('pengguna', 'pengguna.id_user=jurnal.id_user');
    // $this->db->join('pengindeks', 'pengindeks.kode_pengindeks=jurnal_pengindeks.kode_pengindeks');
    return $this->db->get()->result();
  }

  public function get_jurnaldoaj()
  {
    // $data = $this->db->query("select * from jurnal_pengindeks WHERE kode_pengindeks=9");
    $this->db->select('*');
    $this->db->from('jurnal_pengindeks');
    $this->db->where('kode_pengindeks =', 3);
    $this->db->join('jurnal', 'jurnal.kode_jurnal=jurnal_pengindeks.kode_jurnal');
    $this->db->join('pengguna', 'pengguna.id_user=jurnal.id_user');
    // $this->db->join('pengindeks', 'pengindeks.kode_pengindeks=jurnal_pengindeks.kode_pengindeks');
    return $this->db->get()->result();
  }

  public function get_jurnalperfakultas_count()
  {
    // $this->db->join('jurnal', 'jurnal.kode_jurnal=jurnal_sk.kode_jurnal');
    $data = $this->db->query('select count(*) as count from jurnal ');

    return $data->result();
  }

  public function get_alternatif_count()
  {
    $data = $this->db->query('select count(*) as count from alternatif');

    return $data->result();
  }

  public function ambil_jurnal_akreditasi()
  {
    // if ($_SESSION['permission'] == 'admin') {

    $this->db->select('*');
    $this->db->from('jurnal_sk');
    $this->db->join('jurnal', 'jurnal.kode_jurnal=jurnal_sk.kode_jurnal');
    $this->db->join('pengguna', 'pengguna.id_user=jurnal.id_user');
    $this->db->join('sk', 'sk.kode_sk=jurnal_sk.kode_sk');
    return $this->db->get()->result();
    // }
  }

  public function ambil_jurnal_akreditasi_pertahun($tahun = null)
  {
    $data = $this->db->query('select YEAR(sk.tanggal) as tahun ,count(*) as count from jurnal_sk join sk on jurnal_sk.kode_sk=sk.kode_sk GROUP BY YEAR(sk.tanggal)');
    return $data->result();
  }

  public function get_jurnal_count()
  {
    $data = $this->db->query('select peringkat_sinta, count(*) as count from jurnal_sk where length(peringkat_sinta)>0 or "peringkat_sinta" > 0 GROUP BY peringkat_sinta');
    return $data->result();
  }

  public function ambil_jurnal()
  {
    $data = $this->db->query('select count(*) as count from jurnal');
    return $data->result();
  }

  public function get_jurnalakreditasi_count()
  {
    $data = $this->db->query('select count(*) as count from jurnal_sk');

    return $data->result();
  }

  public function tampil_data_kriteria()
  {
    $query = "SELECT * FROM kriteria JOIN kriteria_details ON kriteria.kode_kriteria = kriteria_details.kode_kriteria ORDER BY bobot_baru DESC";
    return $this->db->query($query);
  }

  public function ambil_alternatif_rank()
  {
    $query = "SELECT alternatif.kode_alternatif, nama, preferensi FROM `alternatif_details` JOIN alternatif ON alternatif.kode_alternatif = alternatif_details.kode_alternatif WHERE status = 'Sudah Dievaluasi' ORDER BY `preferensi` DESC";
    return $this->db->query($query);
  }

  public function ambil_datagrafik_rank()
  {
    $data = $this->db->query('SELECT alternatif.kode_alternatif, preferensi FROM `alternatif_details` JOIN alternatif ON alternatif.kode_alternatif = alternatif_details.kode_alternatif WHERE status = "Sudah Dievaluasi" ORDER BY `preferensi` DESC');
    return $data->result();
  }

  public function ambil_datagrafik_preferensi()
  {
    $data = $this->db->query('SELECT alternatif_details.singkatan, preferensi FROM `alternatif_details` JOIN alternatif ON alternatif.kode_alternatif = alternatif_details.kode_alternatif WHERE status = "Sudah Dievaluasi" ORDER BY `preferensi` DESC');
    return $data->result();
  }
}
