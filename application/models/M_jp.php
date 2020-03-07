<?php

class M_jp extends CI_Model
{

  function tampil_data_jp($id = null)
  {
    if (empty($id)) $query = "SELECT * FROM `jurnal_pengindeks`";
    else $query = "SELECT * FROM `jurnal_pengindeks` WHERE kode_jp = '$id'";
    return $this->db->query($query);
  }

  public function ambil_jp()
  {
    $this->db->select('*');
    $this->db->from('jurnal_pengindeks');
    $this->db->join('pengindeks', 'pengindeks.kode_pengindeks=jurnal_pengindeks.kode_pengindeks');
    $this->db->join('jurnal', 'jurnal.kode_jurnal=jurnal_pengindeks.kode_jurnal');
    return $this->db->get()->result();
  }

  function add_jp($data)
  {
    return $this->db->insert('jurnal_pengindeks', $data);
  }

  function get_kode_pengindeks($id)
  {
    $param = array('kode_jp' => $id);
    return $this->db->get_where('jurnal_pengindeks', $param);
  }
  function update_jp($data, $kode)
  {
    $this->db->where('kode_jp', $kode);
    $this->db->update('jurnal_pengindeks', $data);
  }

  function delete_jp($id)
  {
    $this->db->where('kode_jp', $id);
    $this->db->delete('jurnal_pengindeks');
  }
}
