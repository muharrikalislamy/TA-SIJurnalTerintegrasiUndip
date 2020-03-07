<?php

class M_departemen extends CI_Model
{

  function tampil_data_departemen($id = null)
  {
    if (empty($id)) $query = "SELECT * FROM `departemen`";
    else $query = "SELECT * FROM `departemen` WHERE kode_departemen = '$id'";
    return $this->db->query($query);
  }

  public function ambil_departemen()
  {
    $this->db->select('*');
    $this->db->from('departemen');
    return $this->db->get()->result();
  }

  function add_departemen($data)
  {
    return $this->db->insert('departemen', $data);
  }

  function get_kode_departemen($id)
  {
    $param = array('kode_departemen' => $id);
    return $this->db->get_where('departemen', $param);
  }
  function update_departemen($data, $kode)
  {
    $this->db->where('kode_departemen', $kode);
    $this->db->update('departemen', $data);
  }

  function delete_departemen($id)
  {
    $this->db->where('kode_departemen', $id);
    $this->db->delete('departemen');
  }
}
