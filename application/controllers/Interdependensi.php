<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Interdependensi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_analisa_kriteria');
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index()
	{
		$nilai = $this->M_analisa_kriteria->ambil_nilai_analisa();
		foreach ($nilai as $key => $value) {
			$name1 = $value->kriteria_pertama;
			$name2 = $value->kriteria_kedua;
			$rows[$name1][$name2] = $value->nilai_dependence_kriteria;
			$result[$name1][$name2] = $value->normalisasi_dependence_kriteria;
			$bobotdependence[$name1][$name2] = $value->bobot_dependence;
		}
		// var_dump($value);
		// die();

		$kriteriaCode = $this->M_analisa_kriteria->ambil_kriteria();
		$preferensiCode = $this->M_analisa_kriteria->ambil_preferensi();
		$pembobotan = $this->M_analisa_kriteria->ambil_nilai_bobot_baru();
		// $datajnk = $this->M_analisa_kriteria->jumlah_nilai_kriteria();
		// $datannk = $this->M_analisa_kriteria->jumlah_nilai_normalisasi();

		$data = [
			'preferensi' => $preferensiCode,
			'kriteria' => $kriteriaCode,
			'nilai' => $rows,
			'hasil' => $result,
			'bobot' => $pembobotan,
			'bode' => $bobotdependence,
			// 'datajnk'=>$datajnk,
			// 'datannk'=>$datannk,
		];

		$this->load->view('v_interdependensi', $data);
	}

	public function update_FU()
	{ //from update / 'perbarui' yang biasa
		$k1 = $this->input->post('kriteria1'); //ngambil nilai dari form
		$k2 = $this->input->post('kriteria2');
		$pref = array('nilai_dependence_kriteria' => $this->input->post('inputdependensi'));

		$this->M_analisa_kriteria->update_nilai_analisa($k1, $k2, $pref); //MASUKIN KE DB

		$datajdk = $this->M_analisa_kriteria->jumlah_dependence_kriteria(); //MANGGIL SELECT MASUKIN KE VARIABEL
		$nnn = array();
		for ($i = 0; $i < count($datajdk); $i++) {
			$this->M_analisa_kriteria->update_jumlah_nilai_dependence($datajdk[$i]['jdk'], $datajdk[$i]['sort']);
		}

		$this->M_analisa_kriteria->update_normalisasi_dependence(); //satu per lala, hitung buat buat matriks normalisasi UPDATE MASUK DB 

		$this->M_analisa_kriteria->update_bobot_dependence();

		$databode = $this->M_analisa_kriteria->jumlah_bobot_dependence(); //MANGGIL SELECT MASUKIN KE VARIABEL
		$mmm = array();
		for ($i = 0; $i < count($databode); $i++) {
			$this->M_analisa_kriteria->update_bobot_baru($databode[$i]['bode'], $databode[$i]['sort']);
		}


		$this->session->set_flashdata('successUpdate', 'ok');
		redirect('dependence-kriteria');
	}

	public function update_FA()
	{
		$datajdk = $this->M_analisa_kriteria->jumlah_dependence_kriteria(); //MANGGIL SELECT MASUKIN KE VARIABEL
		$nnn = array();
		for ($i = 0; $i < count($datajdk); $i++) {
			$this->M_analisa_kriteria->update_jumlah_nilai_dependence($datajdk[$i]['jdk'], $datajdk[$i]['sort']);
		}

		$this->M_analisa_kriteria->update_normalisasi_dependence(); //satu per lala, hitung buat buat matriks normalisasi UPDATE MASUK DB 

		$this->M_analisa_kriteria->update_bobot_dependence();

		$databode = $this->M_analisa_kriteria->jumlah_bobot_dependence(); //MANGGIL SELECT MASUKIN KE VARIABEL
		$mmm = array();
		for ($i = 0; $i < count($databode); $i++) {
			$this->M_analisa_kriteria->update_bobot_baru($databode[$i]['bode'], $databode[$i]['sort']);
		}


		$this->session->set_flashdata('successUpdate', 'ok');
		redirect('data-kriteria');
	}

	public function update_FD()
	{
		$datajdk = $this->M_analisa_kriteria->jumlah_dependence_kriteria(); //MANGGIL SELECT MASUKIN KE VARIABEL
		$nnn = array();
		for ($i = 0; $i < count($datajdk); $i++) {
			$this->M_analisa_kriteria->update_jumlah_nilai_dependence($datajdk[$i]['jdk'], $datajdk[$i]['sort']);
		}

		$this->M_analisa_kriteria->update_normalisasi_dependence(); //satu per lala, hitung buat buat matriks normalisasi UPDATE MASUK DB 

		$this->M_analisa_kriteria->update_bobot_dependence();

		$databode = $this->M_analisa_kriteria->jumlah_bobot_dependence(); //MANGGIL SELECT MASUKIN KE VARIABEL
		$mmm = array();
		for ($i = 0; $i < count($databode); $i++) {
			$this->M_analisa_kriteria->update_bobot_baru($databode[$i]['bode'], $databode[$i]['sort']);
		}


		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-kriteria');
	}

	public function update_FAB()
	{
		$this->M_analisa_kriteria->update_bobot_dependence();

		$databode = $this->M_analisa_kriteria->jumlah_bobot_dependence(); //MANGGIL SELECT MASUKIN KE VARIABEL
		$mmm = array();
		for ($i = 0; $i < count($databode); $i++) {
			$this->M_analisa_kriteria->update_bobot_baru($databode[$i]['bode'], $databode[$i]['sort']);
		}


		$this->session->set_flashdata('successUpdate', 'ok');
		redirect('analisa-kriteria');
	}
}
