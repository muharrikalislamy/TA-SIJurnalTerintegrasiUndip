<?php

class M_kepentingan extends CI_Model
{

  function tampil_data()
  {
    $query = "SELECT * FROM nilai_preferensi ";
    // bisa buat bintang
    return $this->db->query($query);
  }

  function input_data($tabel, $data)
  {
    $this->db->insert($tabel, $data);
  }

  function edit($data)
  {
    $this->db->where($data);
    $edit = $this->db->get('nilai_preferensi');
    return $edit->result();
  }

  function update($data, $id)
  {
    $this->db->where('id_preferensi', $id);
    $this->db->update('nilai_preferensi', $data);
  }

  function get_one($id)
  {
    $param = array('id_preferensi' => $id);
    return $this->db->get_where('nilai_preferensi', $param);
  }
}
