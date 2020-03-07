<?php

class M_alternatif extends CI_Model
{

  function tampil_data_tabel_alternatif()
  {
    $query = "SELECT * FROM alternatif JOIN alternatif_details ON alternatif.kode_alternatif = alternatif_details.kode_alternatif";
    return $this->db->query($query);
  }

  function tampil_data_tabel_alternatif_sudah()
  {
    $query = "SELECT * FROM pengguna JOIN alternatif_details on alternatif_details.id_user = pengguna.id_user WHERE status = 'Sudah Dievaluasi'";
    return $this->db->query($query);
  }

  function tampil_data_tabel_alternatif_belum()
  {
    $query = "SELECT * FROM alternatif JOIN alternatif_details ON alternatif.kode_alternatif = alternatif_details.kode_alternatif WHERE status = 'Belum Dievaluasi'";
    return $this->db->query($query);
  }

  public function ambil_data_jurnal()
  {
    $this->db->select('*');
    $this->db->from('jurnal');
    return $this->db->get()->result();
  }

  function input_data_alternatif($tabel, $data)
  {
    $this->db->insert($tabel, $data);
  }

  function input_data_log($tabel, $logadd)
  {
    $this->db->insert($tabel, $logadd);
  }

  function input_data_alternatif_details($tabel, $atad)
  {
    $this->db->insert($tabel, $atad);
  }

  function edit($data)
  {
    $this->db->where($data);
    $edit = $this->db->get('alternatif');
    return $edit->result();
  }

  function update($data, $id)
  {
    $this->db->where('kode_alternatif', $id);
    $this->db->update('alternatif_details', $data);
  }

  function get_one($id)
  {
    $param = array('kode_alternatif' => $id);
    return $this->db->get_where('alternatif_details', $param);
  }

  function delete_alternatif($id)
  {
    $this->db->where('kode_alternatif', $id);
    $this->db->delete('alternatif');
  }

  function delete_alternatif_details($id)
  {
    $this->db->where('kode_alternatif', $id);
    $this->db->delete('alternatif_details');
  }

  function delete_log_penilaian_where($id)
  {
    $this->db->where('kode_alternatif', $id);
    $this->db->delete('log_penilaian');
  }
}
