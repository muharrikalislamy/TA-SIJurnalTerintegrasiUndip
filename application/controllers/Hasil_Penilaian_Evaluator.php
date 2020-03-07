<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_Penilaian_Evaluator extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_peringkat_alternatif');
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "evaluator") {
			redirect('cekpermission');
		}
	}

	public function index()
	{
		$nilai = $this->M_peringkat_alternatif->ambil_nilai_alternatif();
		$murni = $this->M_peringkat_alternatif->ambil_nilai_murni();

		foreach ($nilai as $key => $value) {
			$name1 = $value->kode_alternatif;
			$name2 = $value->kode_kriteria;
			$rows[$name1][$name2] = $value->nilai;
		}

		foreach ($murni as $key => $value) {
			$name1 = $value->kode_indikator;
			$name2 = $value->kode_alternatif;
			$swor[$name1][$name2] = $value->nilai;
		}
		// var_dump($value);
		// die();
		$kriteriaCode = $this->M_peringkat_alternatif->ambil_kriteria();
		$alternatifCode = $this->M_peringkat_alternatif->ambil_alternatif();
		$indikatorCode = $this->M_peringkat_alternatif->ambil_indikator();
		$rank = $this->M_peringkat_alternatif->ambil_alternatif_rank();


		// $preferensiCode = $this->M_analisa_kriteria->ambil_preferensi();		
		// $pembobotan = $this->M_analisa_kriteria->ambil_nilai_bobot();
		// $datajnk = $this->M_analisa_kriteria->jumlah_nilai_kriteria();
		// $datannk = $this->M_analisa_kriteria->jumlah_nilai_normalisasi();

		$data = [
			'nilai' => $rows,
			'ialin' => $swor,
			'kriteria' => $kriteriaCode,
			'indikator' => $indikatorCode,
			'alternatif' => $alternatifCode,
			'alternatifsort' => $rank,

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

		$this->load->view('v_hasil_penilaian_e', $data);
	}
}
