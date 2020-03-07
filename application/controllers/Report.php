<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(['M_report']);
		$this->load->model(['M_home']);
		$this->load->model(['M_jurnal_pengelola']);
		$this->load->model('M_peringkat_alternatif');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	//////////////////////////////////////////////////////REPORT ADMIN//////////////////////////////////////////////////////////

	public function akreditasi_admin() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_akreditasi();
		$this->load->view('Report/Report_Admin/v_report_akreditasi', $data);
	}

	public function english_admin() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_english();
		$this->load->view('Report/Report_Admin/v_report_english', $data);
	}

	public function pengindeks_admin() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_pengindeks();
		$this->load->view('Report/Report_Admin/v_report_pengindeks', $data);
	}

	public function rekomendasi_admin() //halaman awal jurnal
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

		$kriteriaCode = $this->M_peringkat_alternatif->ambil_kriteria();
		$alternatifCode = $this->M_peringkat_alternatif->ambil_alternatif();
		$indikatorCode = $this->M_peringkat_alternatif->ambil_indikator();
		$rank = $this->M_peringkat_alternatif->ambil_alternatif_rank();

		$data = [
			'nilai' => $rows,
			'ialin' => $swor,
			'kriteria' => $kriteriaCode,
			'indikator' => $indikatorCode,
			'alternatif' => $alternatifCode,
			'alternatifsort' => $rank,

		];


		$this->load->view('Report/Report_Admin/v_report_rekomendasi', $data);
	}


	public function tidakaktif_admin() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_tidakaktif();
		$this->load->view('Report/Report_Admin/v_report_tidakaktif', $data);
	}

	//////////////////////////////////////////////////////REPORT EVALUATOR//////////////////////////////////////////////////////////

	public function akreditasi_evaluator() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_akreditasi();
		$this->load->view('Report/Report_Evaluator/v_report_akreditasi', $data);
	}

	public function english_evaluator() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_english();
		$this->load->view('Report/Report_Evaluator/v_report_english', $data);
	}

	public function pengindeks_evaluator() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_pengindeks();
		$this->load->view('Report/Report_Evaluator/v_report_pengindeks', $data);
	}

	public function rekomendasi_evaluator() //halaman awal jurnal
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

		$kriteriaCode = $this->M_peringkat_alternatif->ambil_kriteria();
		$alternatifCode = $this->M_peringkat_alternatif->ambil_alternatif();
		$indikatorCode = $this->M_peringkat_alternatif->ambil_indikator();
		$rank = $this->M_peringkat_alternatif->ambil_alternatif_rank();

		$data = [
			'nilai' => $rows,
			'ialin' => $swor,
			'kriteria' => $kriteriaCode,
			'indikator' => $indikatorCode,
			'alternatif' => $alternatifCode,
			'alternatifsort' => $rank,

		];



		$this->load->view('Report/Report_Evaluator/v_report_rekomendasi', $data);
	}


	public function tidakaktif_evaluator() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_tidakaktif();
		$this->load->view('Report/Report_Evaluator/v_report_tidakaktif', $data);
	}

	//////////////////////////////////////////////////////REPORT PENGELOLA//////////////////////////////////////////////////////////

	public function jurnal() //halaman awal jurnal
	{
		$data['a'] = $this->session->userdata('id_user');
		$data['jurnalpengelola'] = $this->M_jurnal_pengelola->ambil_data_jurnal();
		$this->load->view('Report/Report_Pengelola/v_jurnal_pengelola', $data);
	}

	public function akreditasi_pengelola() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_akreditasi();
		$this->load->view('Report/Report_Pengelola/v_report_akreditasi', $data);
	}

	public function english_pengelola() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_english();
		$this->load->view('Report/Report_Pengelola/v_report_english', $data);
	}

	public function pengindeks_pengelola() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_pengindeks();
		$this->load->view('Report/Report_Pengelola/v_report_pengindeks', $data);
	}

	public function rekomendasi_pengelola() //halaman awal jurnal
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

		$kriteriaCode = $this->M_peringkat_alternatif->ambil_kriteria();
		$alternatifCode = $this->M_peringkat_alternatif->ambil_alternatif();
		$indikatorCode = $this->M_peringkat_alternatif->ambil_indikator();
		$rank = $this->M_peringkat_alternatif->ambil_alternatif_rank();

		$data = [
			'nilai' => $rows,
			'ialin' => $swor,
			'kriteria' => $kriteriaCode,
			'indikator' => $indikatorCode,
			'alternatif' => $alternatifCode,
			'alternatifsort' => $rank,

		];


		$this->load->view('Report/Report_Pengelola/v_report_rekomendasi', $data);
	}


	public function tidakaktif_pengelola() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_tidakaktif();
		$this->load->view('Report/Report_Pengelola/v_report_tidakaktif', $data);
	}

	//////////////////////////////////////////////////////REPORT PIMPINAN//////////////////////////////////////////////////////////

	public function akreditasi_pimpinan() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_akreditasi();
		$this->load->view('Report/Report_Pimpinan/v_report_akreditasi', $data);
	}

	public function english_pimpinan() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_english();
		$this->load->view('Report/Report_Pimpinan/v_report_english', $data);
	}

	public function pengindeks_pimpinan() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_pengindeks();
		$this->load->view('Report/Report_Pimpinan/v_report_pengindeks', $data);
	}

	public function rekomendasi_pimpinan() //halaman awal jurnal
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

		$kriteriaCode = $this->M_peringkat_alternatif->ambil_kriteria();
		$alternatifCode = $this->M_peringkat_alternatif->ambil_alternatif();
		$indikatorCode = $this->M_peringkat_alternatif->ambil_indikator();
		$rank = $this->M_peringkat_alternatif->ambil_alternatif_rank();

		$data = [
			'nilai' => $rows,
			'ialin' => $swor,
			'kriteria' => $kriteriaCode,
			'indikator' => $indikatorCode,
			'alternatif' => $alternatifCode,
			'alternatifsort' => $rank,

		];


		$this->load->view('Report/Report_Pimpinan/v_report_rekomendasi', $data);
	}


	public function tidakaktif_pimpinan() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_report->ambil_jurnal_tidakaktif();
		$this->load->view('Report/Report_Pimpinan/v_report_tidakaktif', $data);
	}
}
