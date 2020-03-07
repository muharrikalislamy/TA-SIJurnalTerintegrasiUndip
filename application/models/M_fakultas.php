<?php

class M_fakultas extends CI_Model
{

  function tampil_data_fakultas($id = null)
  {
    if (empty($id)) $query = "SELECT * FROM `fakultas`";
    else $query = "SELECT * FROM `fakultas` WHERE kode_fakultas = '$id'";
    return $this->db->query($query);
  }

  public function ambil_fakultas()
  {
    $this->db->select('*');
    $this->db->from('fakultas');
    return $this->db->get()->result();
  }

  function add_fakultas($data)
  {
    return $this->db->insert('fakultas', $data);
  }

  function get_kode_fakultas($id)
  {
    $param = array('kode_fakultas' => $id);
    return $this->db->get_where('fakultas', $param);
  }
  function update_fakultas($data, $kode)
  {
    $this->db->where('kode_fakultas', $kode);
    $this->db->update('fakultas', $data);
  }

  function delete_fakultas($id)
  {
    $this->db->where('kode_fakultas', $id);
    $this->db->delete('fakultas');
  }
}
