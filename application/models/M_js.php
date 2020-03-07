<?php

class M_js extends CI_Model
{

  function tampil_data_js($id = null)
  {
    if (empty($id)) $query = "SELECT * FROM `jurnal_sk`";
    else $query = "SELECT * FROM `jurnal_sk` WHERE kode_js = '$id'";
    return $this->db->query($query);
  }

  public function ambil_js()
  {
    $this->db->select('*');
    $this->db->from('jurnal_sk');
    $this->db->join('sk', 'sk.kode_sk=jurnal_sk.kode_sk');
    $this->db->join('jurnal', 'jurnal.kode_jurnal=jurnal_sk.kode_jurnal');
    $this->db->join('pengguna', 'pengguna.id_user=jurnal.id_user'); 
    return $this->db->get()->result();
  }


  function add_js($data)
  {
    return $this->db->insert('jurnal_sk', $data);
  }

  function get_kode_js($id)
  {
    $param = array('kode_js' => $id);
    return $this->db->get_where('jurnal_sk', $param);
  }
  function update_js($data, $kode)
  {
    $this->db->where('kode_js', $kode);
    $this->db->update('jurnal_sk', $data);
  }

  function delete_js($id)
  {
    $this->db->where('kode_js', $id);
    $this->db->delete('jurnal_sk');
  }
}
