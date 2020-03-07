<?php

class M_kriteria extends CI_Model{

  function tampil_data_tabel_kriteria(){
    $query = "SELECT * FROM kriteria JOIN kriteria_details ON kriteria.kode_kriteria = kriteria_details.kode_kriteria ORDER BY urutan ASC";
    return $this->db->query($query);
  }

  function input_data_kriteria($tabel,$data)
  {
    $this->db->insert($tabel,$data);
  }

  function input_data_kriteria_details($tabel,$atad)
  {
    $this->db->insert($tabel,$atad);
  }

  function edit($data){
    $this->db->where($data);
    $edit = $this->db->get('kriteria');
    return $edit->result();
  }

  function kriteria_update($data,$id){
    $this->db->where('kode_kriteria', $id);
    $this->db->update('kriteria_details',$data);
  }

  function get_one($id)
  {
    $param = array('kode_kriteria'=>$id);
    return $this->db->get_where('kriteria_details',$param);
  }

  function delete_kriteria($id){
    $this->db->where('kode_kriteria', $id);
    $this->db->delete('kriteria');
  }

  function delete_kriteria_details($id){
    $this->db->where('kode_kriteria', $id);
    $this->db->delete('kriteria_details');
  }

  function delete_indikator_kriteria($id){
    $this->db->where('kode_kriteria', $id);
    $this->db->delete('indikator');
  }

  function delete_nilai_indikator_kriteria($id){
    $this->db->where('kode_kriteria', $id);
    $this->db->delete('nilai_indikator');
  }

  function get_kode()
  {
    $this->db->select('urutan');
    $this->db->order_by('urutan','desc');
    return $this->db->get('kriteria')->row();
  }

  public function set_satu($atad,$id){
    $this->db->where('id_analisa', $id);
    $this->db->update('analisa_kriteria',$atad);
  }
  // function get_kode()
  // {
  //   $this->db->select('kode');
  //   $this->db->order_by('kode','desc');
  //   return $this->db->get('kriteria')->row();
  // }
}
