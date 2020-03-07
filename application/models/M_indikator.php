<?php

class M_indikator extends CI_Model
{
  // indikator
  // nilai indikator
  function tampil_data_nilai_indikator()
  {
    $query = "SELECT * FROM `nilai_indikator`";
    return $this->db->query($query);
  }

  function tampil_data_indikator()
  {
    $query = "SELECT * FROM `indikator`";
    return $this->db->query($query);
  }

  public function ambil_kriteria()
  {
    $this->db->select('*');
    $this->db->from('kriteria');
    $this->db->join('kriteria_details', 'kriteria_details.kode_kriteria = kriteria.kode_kriteria');
    $this->db->order_by('urutan', 'asc');
    return $this->db->get()->result();
  }

  public function ambil_subkriteria()
  {
    $this->db->select('*');
    $this->db->from('indikator');
    return $this->db->get()->result();
  }

  function input_data($tabel, $data)
  {
    $this->db->insert($tabel, $data);
  }

  function update_indikator($data, $id)
  {
    $this->db->where('kode_indikator', $id);
    $this->db->update('indikator', $data);
  }

  function update_nilai_indikator($data, $id)
  {
    $this->db->where('id_penilaian', $id);
    $this->db->update('nilai_indikator', $data);
  }

  function get_kode_indikator($id)
  {
    $param = array('kode_indikator' => $id);
    return $this->db->get_where('indikator', $param);
  }

  function get_id_penilaian($id)
  {
    $param = array('id_penilaian' => $id);
    return $this->db->get_where('nilai_indikator', $param);
  }

  function delete_indikator($id)
  {
    $this->db->where('kode_indikator', $id);
    $this->db->delete('indikator');
  }

  function delete_satu_nilai_indikator($id)
  {
    $this->db->where('kode_indikator', $id);
    $this->db->delete('nilai_indikator');
  }

  function delete_nilai_indikator($id)
  {
    $this->db->where('id_penilaian', $id);
    $this->db->delete('nilai_indikator');
  }
}
