<?php

class M_report extends CI_Model
{

  public function ambil_jurnal_akreditasi()
  {
    // if ($_SESSION['permission'] == 'admin') {

    $this->db->select('*');
    $this->db->from('jurnal_sk ');
    $this->db->order_by('peringkat_sinta');
    $this->db->join('jurnal', 'jurnal.kode_jurnal=jurnal_sk.kode_jurnal');
    $this->db->join('pengguna', 'pengguna.id_user=jurnal.id_user');
    $this->db->join('sk', 'sk.kode_sk=jurnal_sk.kode_sk');
    return $this->db->get()->result();
    // }
  }

  public function ambil_jurnal_english()
  {
    // if ($_SESSION['permission'] == 'admin') {
    $where = "english='1' OR english='2'";
    $this->db->select('*');
    $this->db->from('jurnal');
    // $this->db->where('english', '2','1');
    $this->db->where($where);
    $this->db->join('pengguna', 'pengguna.id_user=jurnal.id_user');
    return $this->db->get()->result();
    // }
  }

  public function ambil_jurnal_pengindeks()
  {
    // if ($_SESSION['permission'] == 'admin') {

    $this->db->select('*');
    $this->db->from('jurnal_pengindeks');
    $this->db->join('jurnal', 'jurnal.kode_jurnal=jurnal_pengindeks.kode_jurnal');
    $this->db->join('pengguna', 'pengguna.id_user=jurnal.id_user');
    $this->db->join('pengindeks', 'pengindeks.kode_pengindeks=jurnal_pengindeks.kode_pengindeks');
    return $this->db->get()->result();
    // }
  }

  public function ambil_jurnal_tidakaktif()
  {
    // if ($_SESSION['permission'] == 'admin') {
    $this->db->where('terbit_terakhir <=', 2016);
    $this->db->join('pengguna', 'pengguna.id_user=jurnal.id_user');
    return $this->db->get('jurnal')->result();
    // }
  }
}
