<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisa_Kriteria extends CI_Controller
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
			$rows[$name1][$name2] = $value->nilai_analisa_kriteria;
			$result[$name1][$name2] = $value->normalisasi_analisa_kriteria;
		}
		// var_dump($value);
		// die();

		$kriteriaCode = $this->M_analisa_kriteria->ambil_kriteria();
		$preferensiCode = $this->M_analisa_kriteria->ambil_preferensi();
		$pembobotan = $this->M_analisa_kriteria->ambil_nilai_bobot();
		// $datajnk = $this->M_analisa_kriteria->jumlah_nilai_kriteria();
		// $datannk = $this->M_analisa_kriteria->jumlah_nilai_normalisasi();

		$data = [
			'preferensi' => $preferensiCode,
			'kriteria' => $kriteriaCode,
			'nilai' => $rows,
			'hasil' => $result,
			'bobot' => $pembobotan,
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

		$this->load->view('v_analisa_kriteria', $data);
	}

	public function update_FU()
	{
		$k1 = $this->input->post('kriteria1'); //ngambil nilai dari form
		$k2 = $this->input->post('kriteria2');
		if ($k1 == $k2) {
			$this->session->set_flashdata('gagalUpdate', 'ok');
			redirect('analisa-kriteria');
		} else {
			$pref = array('nilai_analisa_kriteria' => $this->input->post('preferensi'));
			$prefinvers = array('nilai_analisa_kriteria' => 1 / intval($this->input->post('preferensi')));


			$this->M_analisa_kriteria->update_nilai_analisa($k1, $k2, $pref); //MASUKIN KE DB
			$this->M_analisa_kriteria->update_nilai_analisa($k2, $k1, $prefinvers); //MASUKIN KE DB


			$datajnk = $this->M_analisa_kriteria->jumlah_nilai_kriteria(); //MANGGIL SELECT MASUKIN KE VARIABEL
			$nnn = array();
			for ($i = 0; $i < count($datajnk); $i++) {
				$this->M_analisa_kriteria->update_jumlah_nilai($datajnk[$i]['jnk'], $datajnk[$i]['sort']);
			}


			$this->M_analisa_kriteria->update_normalisasi_analisa(); //satu per lala, hitung buat buat matriks normalisasi UPDATE MASUK DB 


			$datannk = $this->M_analisa_kriteria->jumlah_nilai_normalisasi(); //SAMA
			$mmm = array();
			for ($i = 0; $i < count($datannk); $i++) {
				$this->M_analisa_kriteria->update_jumlah_normalisasi($datannk[$i]['nnk'], $datannk[$i]['sort']);
			}


			// var_dump($nilai["K1"]);
			// die();
			$this->M_analisa_kriteria->update_bobot(); //hitung buat buat matriks normalisasi UPDATE MASUK DB

			$this->session->set_flashdata('successUpdate', 'ok');
			redirect('Interdependensi/update_FAB');

			// var_dump([$pref]);
			// die();
		}
	}

	public function update_FA()
	{
		$k1 = $this->input->post('kriteria1'); //ngambil nilai dari form
		$k2 = $this->input->post('kriteria2');
		$pref = array('nilai_analisa_kriteria' => $this->input->post('preferensi'));
		$prefinvers = array('nilai_analisa_kriteria' => 1 / intval($this->input->post('preferensi')));


		$this->M_analisa_kriteria->update_nilai_analisa($k1, $k2, $pref); //MASUKIN KE DB
		$this->M_analisa_kriteria->update_nilai_analisa($k2, $k1, $prefinvers); //MASUKIN KE DB


		$datajnk = $this->M_analisa_kriteria->jumlah_nilai_kriteria(); //MANGGIL SELECT MASUKIN KE VARIABEL
		$nnn = array();
		for ($i = 0; $i < count($datajnk); $i++) {
			$this->M_analisa_kriteria->update_jumlah_nilai($datajnk[$i]['jnk'], $datajnk[$i]['sort']);
		}


		$this->M_analisa_kriteria->update_normalisasi_analisa(); //satu per lala, hitung buat buat matriks normalisasi UPDATE MASUK DB 


		$datannk = $this->M_analisa_kriteria->jumlah_nilai_normalisasi(); //SAMA
		$mmm = array();
		for ($i = 0; $i < count($datannk); $i++) {
			$this->M_analisa_kriteria->update_jumlah_normalisasi($datannk[$i]['nnk'], $datannk[$i]['sort']);
		}


		$this->M_analisa_kriteria->update_bobot(); //hitung buat buat matriks normalisasi UPDATE MASUK DB

		redirect('Interdependensi/update_FAB');
	}

	public function update_FD()
	{
		$k1 = $this->input->post('kriteria1'); //ngambil nilai dari form
		$k2 = $this->input->post('kriteria2');
		$pref = array('nilai_analisa_kriteria' => $this->input->post('preferensi'));
		$prefinvers = array('nilai_analisa_kriteria' => 1 / intval($this->input->post('preferensi')));


		$this->M_analisa_kriteria->update_nilai_analisa($k1, $k2, $pref); //MASUKIN KE DB
		$this->M_analisa_kriteria->update_nilai_analisa($k2, $k1, $prefinvers); //MASUKIN KE DB


		$datajnk = $this->M_analisa_kriteria->jumlah_nilai_kriteria(); //MANGGIL SELECT MASUKIN KE VARIABEL
		$nnn = array();
		for ($i = 0; $i < count($datajnk); $i++) {
			$this->M_analisa_kriteria->update_jumlah_nilai($datajnk[$i]['jnk'], $datajnk[$i]['sort']);
		}

		$this->M_analisa_kriteria->update_normalisasi_analisa(); //satu per lala, hitung buat buat matriks normalisasi UPDATE MASUK DB 

		$datannk = $this->M_analisa_kriteria->jumlah_nilai_normalisasi(); //SAMA
		$mmm = array();
		for ($i = 0; $i < count($datannk); $i++) {
			$this->M_analisa_kriteria->update_jumlah_normalisasi($datannk[$i]['nnk'], $datannk[$i]['sort']);
		}


		$this->M_analisa_kriteria->update_bobot(); //hitung buat buat matriks normalisasi UPDATE MASUK DB

		redirect('Interdependensi/update_FD');
	}
}
