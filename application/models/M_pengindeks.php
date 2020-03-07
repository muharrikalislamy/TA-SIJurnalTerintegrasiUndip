<?php

class M_pengindeks extends CI_Model
{

  function tampil_data_pengindeks($id = null)
  {
    if (empty($id)) $query = "SELECT * FROM `pengindeks`";
    else $query = "SELECT * FROM `pengindeks` WHERE kode_pengindeks = '$id'";
    return $this->db->query($query);
  }

  public function ambil_pengindeks()
  {
    $this->db->select('*');
    $this->db->from('pengindeks');
    return $this->db->get()->result();
  }

  function add_pengindeks($data)
  {
    return $this->db->insert('pengindeks', $data);
  }

  function get_kode_pengindeks($id)
  {
    $param = array('kode_pengindeks' => $id);
    return $this->db->get_where('pengindeks', $param);
  }
  function update_pengindeks($data, $kode)
  {
    $this->db->where('kode_pengindeks', $kode);
    $this->db->update('pengindeks', $data);
  }

  function delete_pengindeks($id)
  {
    $this->db->where('kode_pengindeks', $id);
    $this->db->delete('pengindeks');
  }
}
