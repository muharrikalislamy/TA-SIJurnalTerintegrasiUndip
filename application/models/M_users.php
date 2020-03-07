<?php

class M_users extends CI_Model
{

  function tampil_data()
  {
    $query = "SELECT * FROM pengguna";
    return $this->db->query($query);
  }

  function input_data_auth($tabel, $data)
  {
    $this->db->insert($tabel, $data);
  }

  function input_data_pengguna($tabel, $atad)
  {
    $this->db->insert($tabel, $atad);
  }

  function edit($data)
  {
    $this->db->where($data);
    $edit = $this->db->get('pengguna');
    return $edit->result();
  }

  function update_auth($data, $id)
  {
    $this->db->where('id_user', $id);
    $this->db->update('pengguna', $data);
  }

  function update_pengguna($atad, $id)
  {
    $this->db->where('id_user', $id);
    $this->db->update('pengguna', $atad);
  }

  function update_foto($id, $data)
  {
    $this->db->where('id_user', $id);
    $this->db->update('pengguna', $data);
  }

  function get_one_pengguna($id)
  {
    $param = array('id_user' => $id);
    return $this->db->get_where('pengguna', $param);
  }
}
