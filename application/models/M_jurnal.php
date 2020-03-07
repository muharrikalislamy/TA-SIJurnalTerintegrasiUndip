<?php

class M_jurnal extends CI_Model
{


  public function ambil_portal()
  {
    $this->db->select('*');
    $this->db->from('portal');
    return $this->db->get()->result();
  }

  public function ambil_data_portal()
  {
    // $this->db->join('jurnal', 'jurnal.kode_portal=portal.kode_portal');
    $this->db->select('*');
    $this->db->from('portal');
    return $this->db->get()->result();
  }

  public function ambil_data_pengindeks()
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
    if ($_SESSION['permission'] == 'pengelola') {

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
    $this->db->join('pengguna', 'pengguna.id_user=jurnal.id_user');
  }

  public function count_jurnal_belumakreditasi()
  {
    $this->db->select('pengguna.nama_user, jurnal.kode_jurnal, jurnal.nomor_jurnal, jurnal.id_user, jurnal.judul, jurnal.singkatan, jurnal.nama_fakultas, jurnal.nama_departemen, jurnal.nama_lab, jurnal.nama_lembaga, jurnal.nama_portal, jurnal.sponsor, jurnal.e_issn, jurnal.p_issn, jurnal.english, jurnal.tahun_mulai, jurnal.no_terakhir, jurnal.terbit_terakhir, jurnal.mpgundip, jurnal.url, jurnal.doi, jurnal.bln_terbit');
    $this->db->from('jurnal');
    $this->db->join('jurnal_sk', 'jurnal.kode_jurnal = jurnal_sk.kode_jurnal', 'left');
    $this->db->where('jurnal_sk.kode_sk', NULL);
    $this->db->join('pengguna', 'pengguna.id_user=jurnal.id_user');
    $this->db->select('count(*) as jumlah');
    return $this->db->get()->result();
  }

  public function ambil_jurnal_belumakreditasi()
  {
    $this->db->select('pengguna.nama_user, jurnal.kode_jurnal, jurnal.nomor_jurnal, jurnal.id_user, jurnal.judul, jurnal.singkatan, jurnal.nama_fakultas, jurnal.nama_departemen, jurnal.nama_lab, jurnal.nama_lembaga, jurnal.nama_portal, jurnal.sponsor, jurnal.e_issn, jurnal.p_issn, jurnal.english, jurnal.tahun_mulai, jurnal.no_terakhir, jurnal.terbit_terakhir, jurnal.mpgundip, jurnal.url, jurnal.doi, jurnal.bln_terbit');
    $this->db->from('jurnal');
    $this->db->join('jurnal_sk', 'jurnal.kode_jurnal = jurnal_sk.kode_jurnal', 'left');
    $this->db->where('jurnal_sk.kode_sk', NULL);
    $this->db->join('pengguna', 'pengguna.id_user=jurnal.id_user');
    // $this->db->select('count(*) as jumlah');
    return $this->db->get()->result();
  }

  public function ambil_jurnal_alternatifspk()
  {
    $wheresinta = "peringkat_sinta='S3' OR peringkat_sinta='S4' OR peringkat_sinta='S5' OR peringkat_sinta='S6'";
    $this->db->select('jurnal_sk.peringkat_sinta, pengguna.nama_user, jurnal.kode_jurnal, jurnal.nomor_jurnal, jurnal.id_user, jurnal.judul, jurnal.singkatan, jurnal.nama_fakultas, jurnal.nama_departemen, jurnal.nama_lab, jurnal.nama_lembaga, jurnal.nama_portal, jurnal.sponsor, jurnal.e_issn, jurnal.p_issn, jurnal.english, jurnal.tahun_mulai, jurnal.no_terakhir, jurnal.terbit_terakhir, jurnal.mpgundip, jurnal.url, jurnal.doi, jurnal.bln_terbit');
    $this->db->from('jurnal');
    $this->db->join('jurnal_sk', 'jurnal.kode_jurnal = jurnal_sk.kode_jurnal', 'left');
    $this->db->where('jurnal_sk.kode_sk', NULL);
    $this->db->or_where($wheresinta);
    $this->db->join('pengguna', 'pengguna.id_user=jurnal.id_user');
    return $this->db->get()->result();
  }

  public function ambil_jurnal()
  {
    $this->db->select('*');
    $this->db->from('jurnal');
    $this->db->join('pengguna', 'pengguna.id_user=jurnal.id_user', 'portal', 'portal.kode_portal=jurnal.kode_portal');
    return $this->db->get()->result();
  }

  function add_jurnal($data)
  {
    return $this->db->insert('jurnal', $data);
  }

  function get_kode_jurnal($id)
  {
    $this->db->join('pengguna', 'pengguna.id_user=jurnal.id_user');
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
    $this->db->where('kode_jurnal', $id);
    $this->db->delete('jurnal_sk');
    $this->db->where('kode_jurnal', $id);
    $this->db->delete('jurnal_pengindeks');
  }
}
