<?php

class M_sk extends CI_Model
{

  function tampil_data_sk($id = null)
  {
    if (empty($id)) $query = "SELECT * FROM `sk`";
    else $query = "SELECT * FROM `sk` WHERE kode_sk = '$id'";
    return $this->db->query($query);
  }

  public function ambil_sk()
  {
    $this->db->select('*');
    $this->db->from('sk');
    return $this->db->get()->result();
  }

  public function ambil_sk1($id)
  {

    $param = array('kode_sk' => $id);
    return $this->db->get_where('sk', $param);
  }

  function add_sk($data)
  {
    return $this->db->insert('sk', $data);
  }

  function get_kode_sk($id)
  {
    $param = array('kode_sk' => $id);
    return $this->db->get_where('sk', $param);
  }
  function update_sk($data, $kode)
  {
    $this->db->where('kode_sk', $kode);
    $this->db->update('sk', $data);
  }

  function delete_sk($id)
  {
    $this->db->where('kode_sk', $id);
    $this->db->delete('sk');
  }
}
