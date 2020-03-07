<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_home');
		$this->load->model('M_jurnal');
		$this->load->model('M_report');
		$this->load->model('M_fakultas');
		$this->load->model('M_grafik');


		if ($this->session->userdata('permission') != "admin") {
			redirect("cekpermission");
		}
	}

	function random_color_part()
	{
		return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
	}

	function random_color()
	{
		return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
	}

	function index()
	{
		// var_dump($this->session->userdata('id'));
		// die();
		$data['kriteria'] = $this->M_home->tampil_data_kriteria()->result();
		$data['alternatif'] = $this->M_home->ambil_alternatif_rank()->result();
		$data['userCount'] = $this->M_home->get_user_count();
		$data['kriteriaCount'] = $this->M_home->get_kriteria_count();
		$data['indikatorCount'] = $this->M_home->get_indikator_count();
		$data['jurnaltinggiCount'] = $this->M_home->get_jurnaltinggi_count();
		$data['jurnalbelumakreditasi'] = $this->M_jurnal->ambil_jurnal_belumakreditasi();
		$data['countjurnalbelumakreditasi'] = $this->M_jurnal->count_jurnal_belumakreditasi();
		$data['jurnaldoajCount'] = $this->M_home->get_jurnaldoaj_count();
		$data['alternatifCount'] = $this->M_home->get_alternatif_count();
		$data['jurnalCount'] = $this->M_home->get_jurnal_count();
		$data['jurnalakreditasiCount'] = $this->M_home->get_jurnalakreditasi_count();
		$data['preferensi'] = $this->M_home->ambil_datagrafik_preferensi();
		$data['jurnal'] = $this->M_jurnal->ambil_jurnal();
		$data['hitungjurnal'] = $this->M_home->ambil_jurnal();
		$data['jurnalakreditasi'] = $this->M_home->ambil_jurnal_akreditasi();
		$data['jurnalakreditasipertahun'] = $this->M_home->ambil_jurnal_akreditasi_pertahun();
		$data["graphDataJurnalAkreditasiByPenerbitSinta"] = $this->getGraphDataJurnalAkreditasiByPenerbitSinta();
		$data["graphDataJurnalAkreditasiByPenerbitSintaByTahun"] = $this->getGraphDataJurnalAkreditasiByPenerbitSintaByTahun();
		$data["graphDataJurnalAkreditasiPerTahun"] = $this->getGraphDataJurnalAkreditasiPerTahun();

		$graphbar = array();
		foreach ($data['preferensi'] as $key => $value) {
			array_push($graphbar, [$value->singkatan, $value->preferensi]);
		}

		$graphpie = array();
		foreach ($data['kriteria'] as $key => $value) {
			$color = "#" . $this->random_color();
			array_push($graphpie, [
				'value' => $value->bobot_baru * 100,
				'color' => $color,
				'highlight' => $color,
				'label' => $value->nama
			]);
		}

		$graphpiejurnalfakultas = array();
		foreach ($data['jurnalCount'] as $key => $value) {
			$color = "#" . $this->random_color();
			array_push($graphpiejurnalfakultas, [
				'value' => $value->count,
				'color' => $color,
				'highlight' => $color,
				'label' => $value->peringkat_sinta
			]);
		}

		$data['bobotGraphPie'] = json_encode($graphpie);
		$data['bobotGraphBar'] = json_encode($graphbar);
		$data['bobotGraphPieJurnalFakultas'] = json_encode($graphpiejurnalfakultas);


		$this->load->view('v_home_admin', $data);
	}

	function getGraphDataJurnalAkreditasiByPenerbitSinta()
	{
		$sinta = ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'];
		$faks = $this->M_fakultas->ambil_fakultas();
		$byFakultas = $this->M_grafik->countJurnalAkreditasiByFakultas();
		$categories = array();
		$resultSeries = array();

		foreach ($faks as $v) {
			array_push($categories, $v->nama);
		}

		for ($i = 0; $i < count($sinta); $i++) {
			array_push($resultSeries, ['name' => $sinta[$i]]);
		}

		for ($x = 0; $x < count($categories); $x++) {
			foreach ($byFakultas as $fakultas) {
				for ($in = 0; $in < count($sinta); $in++) {
					if ($fakultas->fakultas == $categories[$x] && $fakultas->sinta == $sinta[$in]) {
						$resultSeries[$in]['data'][$x] = (int) $fakultas->jumlah;
					} else {
						if (empty($resultSeries[$in]['data'][$x])) $resultSeries[$in]['data'][$x] = 0;
					}
				}
			}
		}

		return json_encode([
			'categories' => $categories,
			'series' => $resultSeries
		]);
	}

	function getGraphDataJurnalAkreditasiByPenerbitSintaByTahun()
	{
		$sinta = ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'];
		$sk = $this->M_home->ambil_jurnal_akreditasi_pertahun();
		$bySK = $this->M_grafik->countJurnalAkreditasiBySintaByTahun();
		$categories = array();
		$resultSeries = array();

		foreach ($sk as $v) {
			array_push($categories, $v->tahun);
		}

		for ($i = 0; $i < count($sinta); $i++) {
			array_push($resultSeries, ['name' => $sinta[$i]]);
		}

		for ($x = 0; $x < count($categories); $x++) {
			foreach ($bySK as $aa) {
				for ($in = 0; $in < count($sinta); $in++) {
					if ($aa->tahun == $categories[$x] && $aa->sinta == $sinta[$in]) {
						$resultSeries[$in]['data'][$x] = (int) $aa->jumlah;
					} else {
						if (empty($resultSeries[$in]['data'][$x])) $resultSeries[$in]['data'][$x] = 0;
					}
				}
			}
		}

		return json_encode([
			'categories' => $categories,
			'series' => $resultSeries
		]);
	}


	function getGraphDataJurnalAkreditasiPerTahun()
	{
		$counts = array();
		$tahun = array();

		$count = $this->M_home->ambil_jurnal_akreditasi_pertahun();
		foreach ($count as $key => $value) {
			array_push($counts, (int) $value->count);
			array_push($tahun, $value->tahun);
		}

		$data = array(
			'count' => $counts,
			'tahun' => $tahun
		);

		return json_encode((object) $data);
	}
}
