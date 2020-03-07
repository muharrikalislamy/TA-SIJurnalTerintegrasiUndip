<?php

class M_analisa_kriteria extends CI_Model
{

  public function ambil_nilai_analisa()
  {
    $this->db->select('*');
    $this->db->from('analisa_kriteria');
    return $this->db->get()->result();
  }

  // public function ambil_nilai_where($kriteria) {
  //   $this->db->where($kriteria);
  //   $this->db->from('analisa_kriteria');
  //   return $this->db->get()->result();
  // }

  public function ambil_kriteria()
  {
    $this->db->select('*');
    $this->db->from('kriteria');
    $this->db->join('kriteria_details', 'kriteria_details.kode_kriteria = kriteria.kode_kriteria');
    $this->db->order_by('urutan', 'asc');
    return $this->db->get()->result();
  }

  public function ambil_nilai_bobot()
  {
    $this->db->select('*');
    $this->db->from('kriteria');
    $this->db->join('kriteria_details', 'kriteria_details.kode_kriteria = kriteria.kode_kriteria');
    $this->db->order_by('bobot_kriteria', 'desc');
    return $this->db->get()->result();
  }

  public function ambil_nilai_bobot_baru()
  {
    $this->db->select('*');
    $this->db->from('kriteria');
    $this->db->join('kriteria_details', 'kriteria_details.kode_kriteria = kriteria.kode_kriteria');
    $this->db->order_by('bobot_baru', 'desc');
    return $this->db->get()->result();
  }

  public function ambil_preferensi()
  {
    $this->db->select('*');
    $this->db->from('nilai_preferensi');
    return $this->db->get()->result();
  }

  public function jumlah_dependence_kriteria()
  {
    $query = $this->db->query("SELECT CAST(SUBSTRING(id_analisa, 5) AS UNSIGNED) as sort, SUM(nilai_dependence_kriteria) AS jdk FROM `analisa_kriteria` GROUP BY `kriteria_kedua` order by sort asc");
    return $query->result_array();
    // jdk jumlah dependence kriteria
  }

  public function jumlah_nilai_kriteria()
  {
    $query = $this->db->query("SELECT CAST(SUBSTRING(id_analisa, 5) AS UNSIGNED) as sort, 
      SUM(nilai_analisa_kriteria) AS jnk FROM `analisa_kriteria` GROUP BY `kriteria_kedua` order by sort asc");
    return $query->result_array();
    // jnk jumlah nilai kriteria
  }

  public function jumlah_nilai_normalisasi()
  {
    $query = $this->db->query("SELECT CAST(SUBSTRING(id_analisa, 3) AS UNSIGNED) as sort, 
      SUM(normalisasi_analisa_kriteria) AS nnk FROM `analisa_kriteria` GROUP BY `kriteria_pertama` order by sort asc");
    return $query->result_array();
    // nnk normalisasi nilai kriteria
  }

  public function jumlah_bobot_dependence()
  {
    $query = $this->db->query("SELECT CAST(SUBSTRING(id_analisa, 3) AS UNSIGNED) as sort, SUM(bobot_dependence) AS bode FROM `analisa_kriteria` GROUP BY `kriteria_pertama` order by sort asc");
    return $query->result_array();
    // nnk normalisasi nilai kriteria
  }

  public function addAnalisaKriteria($data)
  {
    return $this->db->insert('analisa_kriteria', $data) ? true : false;
  }

  public function delete_analisa_kriteria($kode)
  {
    $this->db->where('kriteria_pertama', $kode);
    $this->db->or_where('kriteria_kedua', $kode);
    $this->db->delete('analisa_kriteria');
  }

  function update_nilai_analisa($k1, $k2, $nilai)
  {
    $this->db->where('kriteria_pertama', $k1);
    $this->db->where('kriteria_kedua', $k2);
    $this->db->update('analisa_kriteria', $nilai);
  }

  function update_normalisasi_analisa()
  {
    $query = "UPDATE analisa_kriteria a JOIN kriteria k ON k.kode_kriteria = a.kriteria_kedua SET a.normalisasi_analisa_kriteria = (a.nilai_analisa_kriteria / k.jumlah_nilai_kriteria)";
    return $this->db->query($query);
  }

  function update_normalisasi_dependence()
  {
    $query = "UPDATE analisa_kriteria a JOIN kriteria k ON k.kode_kriteria = a.kriteria_kedua SET a.normalisasi_dependence_kriteria = (a.nilai_dependence_kriteria / k.jumlah_dependence_kriteria)";
    return $this->db->query($query);
  }

  function update_bobot_dependence()
  {
    $query = "UPDATE analisa_kriteria a JOIN kriteria k ON k.kode_kriteria = a.kriteria_kedua SET a.bobot_dependence = (a.normalisasi_dependence_kriteria * k.bobot_kriteria)";
    return $this->db->query($query);
  }

  function update_bobot()
  {
    $query = "UPDATE kriteria set bobot_kriteria = jumlah_nilai_normalisasi / (SELECT COUNT(*) FROM kriteria_details)";
    return $this->db->query($query);
  }

  public function update_jumlah_nilai($data, $urutan)
  {
    $this->db->where('urutan', $urutan);
    $this->db->update('kriteria', ['jumlah_nilai_kriteria' => $data]);
  }

  public function update_jumlah_nilai_dependence($data, $urutan)
  {
    $this->db->where('urutan', $urutan);
    $this->db->update('kriteria', ['jumlah_dependence_kriteria' => $data]);
  }

  public function update_jumlah_normalisasi($data, $urutan)
  {
    $this->db->where('urutan', $urutan);
    $this->db->update('kriteria', ['jumlah_nilai_normalisasi' => $data]);
  }

  public function update_bobot_baru($data, $urutan)
  {
    $this->db->where('urutan', $urutan);
    $this->db->update('kriteria', ['bobot_baru' => $data]);
  }

  public function get_kriteria_count()
  {
    $data = $this->db->query('select count(*) as count from kriteria');
    return $data->result();
  }
}
