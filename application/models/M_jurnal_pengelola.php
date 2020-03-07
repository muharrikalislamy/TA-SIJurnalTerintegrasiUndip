<?php

class M_jurnal_pengelola extends CI_Model
{


  public function ambil_data_jurnal()
  {
    $this->db->select('*');
    $this->db->from('jurnal');
    return $this->db->get()->result();
  }

  public function ambil_data_judul()
  {
    $this->db->select('*');
    $this->db->from('pengindeks');
    return $this->db->get()->result();
  }

  public function ambil_data_pengelola()
  {
    if ($_SESSION['permission'] == 'admin') {

      $this->db->select('*');
      $this->db->from('pengguna');
      $this->db->where('permission', 'pengelola');
      return $this->db->get()->result();
    }
  }

  public function ambil_data_sk()
  {
    $this->db->select('*');
    $this->db->from('sk');
    return $this->db->get()->result();
  }

  public function getFakultasPenerbit()
  {
    $query = 'SELECT DISTINCT fakultas.nama, fakultas.kode_fakultas FROM fakultas JOIN departemen 
    ON departemen.kode_fakultas = fakultas.kode_fakultas WHERE fakultas.kode_fakultas 
    OR fakultas.kode_fakultas IN (SELECT fakultas.kode_fakultas FROM fakultas JOIN departemen 
    ON fakultas.kode_fakultas = departemen.kode_fakultas';

    return $this->db->query($query)->result();
  }

  function tampil_data_jurnal($id = null)
  {
    if (empty($id)) $query = "SELECT * FROM `jurnal`";
    else $query = "SELECT * FROM `jurnal` WHERE kode_jurnal = '$id'";
    return $this->db->query($query);
  }

  public function ambil_jurnal()
  {
    $this->db->select('*');
    $this->db->from('jurnal');
    return $this->db->get()->result();
  }

  function add_jurnal($data)
  {
    return $this->db->insert('jurnal', $data);
  }

  function get_kode_jurnal($id)
  {
    $param = array('kode_jurnal' => $id);
    return $this->db->get_where('jurnal', $param);
  }
  function update_jurnal($data, $kode)
  {
    $this->db->where('kode_jurnal', $kode);
    $this->db->update('jurnal', $data);
  }

  function delete_jurnal($id)
  {
    $this->db->where('kode_jurnal', $id);
    $this->db->delete('jurnal');
  }
}
