<?php

class M_lab extends CI_Model
{

  function tampil_data_lab($id = null)
  {
    if (empty($id)) $query = "SELECT * FROM `lab`";
    else $query = "SELECT * FROM `lab` WHERE kode_lab = '$id'";
    return $this->db->query($query);
  }

  public function ambil_data_departemen()
  {
    $this->db->select('*');
    $this->db->from('departemen');
    return $this->db->get()->result();
  }



  public function ambil_lab()
  {
    $this->db->select('*');
    $this->db->from('lab');
    return $this->db->get()->result();
  }

  function add_lab($data)
  {
    return $this->db->insert('lab', $data);
  }

  function get_kode_lab($id)
  {
    $param = array('kode_lab' => $id);
    return $this->db->get_where('lab', $param);
  }
  function update_lab($data, $kode)
  {
    $this->db->where('kode_lab', $kode);
    $this->db->update('lab', $data);
  }

  function delete_lab($id)
  {
    $this->db->where('kode_lab', $id);
    $this->db->delete('lab');
  }
}
