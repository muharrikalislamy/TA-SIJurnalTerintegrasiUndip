<?php

class M_portal extends CI_Model
{

  function tampil_data_portal($id = null)
  {
    if (empty($id)) $query = "SELECT * FROM `portal`";
    else $query = "SELECT * FROM `portal` WHERE kode_portal = '$id'";
    return $this->db->query($query);
  }

  public function ambil_portal()
  {
    $this->db->select('*');
    $this->db->from('portal');
    return $this->db->get()->result();
  }

  function add_portal($data)
  {
    return $this->db->insert('portal', $data);
  }

  function get_kode_portal($id)
  {
    $param = array('kode_portal' => $id);
    return $this->db->get_where('portal', $param);
  }
  function update_portal($data, $kode)
  {
    $this->db->where('kode_portal', $kode);
    $this->db->update('portal', $data);
  }

  function delete_portal($id)
  {
    $this->db->where('kode_portal', $id);
    $this->db->delete('portal');
  }
}
