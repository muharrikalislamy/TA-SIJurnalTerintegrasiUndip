<?php

class M_peringkat_alternatif extends CI_Model{

  public function ambil_alternatif() {  
    $this->db->select('*');
    $this->db->from('alternatif');
    $this->db->join('alternatif_details', 'alternatif_details.kode_alternatif = alternatif.kode_alternatif');
    $this->db->where('status', 'Sudah Dievaluasi');
    $this->db->order_by('preferensi','desc');

    return $this->db->get()->result();
  }

  public function ambil_alternatif_hitung() {  
    $this->db->select('*');
    $this->db->from('alternatif');
    $this->db->join('alternatif_details', 'alternatif_details.kode_alternatif = alternatif.kode_alternatif');
    $this->db->where('status', 'Sudah Dievaluasi');

    return $this->db->get()->result();
  }

  public function ambil_kriteria() {  
    $this->db->select('*');
    $this->db->from('kriteria');
    $this->db->join('kriteria_details', 'kriteria_details.kode_kriteria = kriteria.kode_kriteria');
    $this->db->order_by('urutan','asc');
    return $this->db->get()->result();
  }

  public function ambil_nilai_alternatif() {  
    $this->db->select('*');
    $this->db->from('nilai_alternatif');
    return $this->db->get()->result();
  }

  public function ambil_nilai_murni() {  
    $this->db->select('*');
    $this->db->from('nilai_murni');
    return $this->db->get()->result();
  }

  public function ambil_indikator(){
    $this->db->select('*');
    $this->db->from('indikator');
    return $this->db->get()->result();
  }

  public function ambil_alternatif_rank() {  
    $this->db->select('*');
    $this->db->from('alternatif');
    $this->db->join('alternatif_details', 'alternatif_details.kode_alternatif = alternatif.kode_alternatif');
    $this->db->where('status', 'Sudah Dievaluasi');
    $this->db->order_by('preferensi','desc');
    return $this->db->get()->result();
  }


}
