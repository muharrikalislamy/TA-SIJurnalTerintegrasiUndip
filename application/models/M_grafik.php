<?php
class M_grafik extends CI_model
{

        public function countJurnalByLembaga($tahun = null, $sinta = null)
        {
                $this->db->select("COUNT(DISTINCT jurnal.kode_jurnal) as jumlah");
                $this->db->where('nama_lembaga', NULL);

                return $this->db->get('jurnal')->result();
        }

        public function get_jurnal_count()
        {
                $data = $this->db->query('select nama_fakultas, count(*) as count from jurnal where length(nama_fakultas)>0 or "nama_fakultas" > 0 GROUP BY nama_fakultas');
                return $data->result();
        }

        public function countJurnalAkreditasiByFakultas()
        {
                $this->db->select("COUNT(DISTINCT jurnal_sk.kode_jurnal) as jumlah, j.nama_fakultas as fakultas, jurnal_sk.peringkat_sinta as sinta");
                $this->db->join('jurnal j', 'jurnal_sk.kode_jurnal = j.kode_jurnal');
                $this->db->group_by(array('j.nama_fakultas', 'jurnal_sk.peringkat_sinta'));
                return $this->db->get('jurnal_sk')->result();
        }

        public function countJurnalAkreditasiBySintaByTahun()
        {
                $this->db->select("COUNT(DISTINCT jurnal_sk.kode_sk) as jumlah, YEAR(s.tanggal) as tahun, jurnal_sk.peringkat_sinta as sinta");
                $this->db->join('sk s', 'jurnal_sk.kode_sk = s.kode_sk');
                $this->db->group_by(array('YEAR(s.tanggal)', 'jurnal_sk.peringkat_sinta'));
                return $this->db->get('jurnal_sk')->result();
        }
}
