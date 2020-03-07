<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peringkat_Alternatif_Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_peringkat_alternatif');
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index()
	{
		$nilai = $this->M_peringkat_alternatif->ambil_nilai_alternatif();

		foreach ($nilai as $key => $value) {
			$name1 = $value->kode_alternatif;
			$name2 = $value->kode_kriteria;
			$rows[$name1][$name2] = $value->nilai;
			$kuadratnilai[$name1][$name2] = $value->kuadrat_nilai;
			$normalisasinilai[$name1][$name2] = $value->normalisasi;
			$normalisasiterbobotnilai[$name1][$name2] = $value->normalisasi_terbobot;
			$JSPnilai[$name1][$name2] = $value->jarak_solusi_positif;
			$JSNnilai[$name1][$name2] = $value->jarak_solusi_negatif;
		}
		// var_dump($value);
		// die();
		$kriteriaCode = $this->M_peringkat_alternatif->ambil_kriteria();
		$alternatifCode = $this->M_peringkat_alternatif->ambil_alternatif_hitung();
		$rank = $this->M_peringkat_alternatif->ambil_alternatif_rank();

		// $preferensiCode = $this->M_analisa_kriteria->ambil_preferensi();		
		// $pembobotan = $this->M_analisa_kriteria->ambil_nilai_bobot();
		// $datajnk = $this->M_analisa_kriteria->jumlah_nilai_kriteria();
		// $datannk = $this->M_analisa_kriteria->jumlah_nilai_normalisasi();

		$data = [
			'nilai' => $rows,
			'kriteria' => $kriteriaCode,
			'alternatif' => $alternatifCode,
			'alternatifsort' => $rank,
			'nilaikuadrat' => $kuadratnilai,
			'nilainormalisasi' => $normalisasinilai,
			'nilainormalisasiterbobot' => $normalisasiterbobotnilai,
			'nilaiJSP' => $JSPnilai,
			'nilaiJSN' => $JSNnilai,

			// 'datajnk'=>$datajnk,
			// 'datannk'=>$datannk,
		];
		//echo json_encode($kriteriaCode);
		//echo json_encode($rows);
		// $jnk1 = $this->M_analisa_kriteria->jumlah_nilai_kriteria1();
		// $jnk2 = $this->M_analisa_kriteria->jumlah_nilai_kriteria2();

		// $datajnk = array();
		// $datajnk['jnk2'] = $this->M_analisa_kriteria->jumlah_nilai_kriteria2();
		// $datajnk['jnk2'] = $this->M_analisa_kriteria->jumlah_nilai_kriteria2();
		// $datajnk['jnk3'] = $this->M_analisa_kriteria->jumlah_nilai_kriteria3();
		// $datajnk['jnk4'] = $this->M_analisa_kriteria->jumlah_nilai_kriteria4();
		// $datajnk['jnk5'] = $this->M_analisa_kriteria->jumlah_nilai_kriteria5();
		// $datajnk['jnk6'] = $this->M_analisa_kriteria->jumlah_nilai_kriteria6();
		// $datajnk['jnk7'] = $this->M_analisa_kriteria->jumlah_nilai_kriteria7();
		// $datajnk['jnk8'] = $this->M_analisa_kriteria->jumlah_nilai_kriteria8();
		// var_dump($datajnk);
		// die();


		// echo $rows["K1"]["K5"];
		// var_dump($datajnk);
		// die();

		$this->load->view('v_peringkat_alternatif', $data);
	}
}
