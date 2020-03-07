<?php

class M_lembaga extends CI_Model
{

  function tampil_data_lembaga($id = null)
  {
    if (empty($id)) $query = "SELECT * FROM `lembaga`";
    else $query = "SELECT * FROM `lembaga` WHERE kode_lembaga = '$id'";
    return $this->db->query($query);
  }

  public function ambil_lembaga()
  {
    $this->db->select('*');
    $this->db->from('lembaga');
    return $this->db->get()->result();
  }

  function add_lembaga($data)
  {
    return $this->db->insert('lembaga', $data);
  }

  function get_kode_lembaga($id)
  {
    $param = array('kode_lembaga' => $id);
    return $this->db->get_where('lembaga', $param);
  }
  function update_lembaga($data, $kode)
  {
    $this->db->where('kode_lembaga', $kode);
    $this->db->update('lembaga', $data);
  }

  function delete_lembaga($id)
  {
    $this->db->where('kode_lembaga', $id);
    $this->db->delete('lembaga');
  }
}
