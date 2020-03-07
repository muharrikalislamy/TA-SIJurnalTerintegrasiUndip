<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_Alternatif extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_penilaian_alternatif');
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "evaluator") {
			redirect('cekpermission');
		}
	}

	public function index() //awal
	{
		$data['alternatifbelum'] = $this->M_penilaian_alternatif->tampil_data_alternatif_belum()->result();
		$data['alternatifsudah'] = $this->M_penilaian_alternatif->tampil_data_alternatif_sudah()->result();
		$this->load->view('v_penilaian_alternatif', $data);
	}

	public function nilai_alternatif() //klik nilai alternatif
	{
		$id =  $this->uri->segment(3);
		$recordalte =  $this->M_penilaian_alternatif->get_kode_alternatif($id)->row_array();
		$indikatorGet = $this->M_penilaian_alternatif->ambil_indikator();
		$data = [
			'indikator' => $indikatorGet,
			'record' => $recordalte,
		];

		$this->load->view('v_nilai_alternatif', $data);
	}

	public function submit_nilai_alternatif() //klik submit penilaian
	{
		$id = $this->input->post('inputalternatif'); // buat update status di database alternatif_details
		$atad = array(
			'status' => 'Sudah Dievaluasi',
			'id_user' => $this->input->post('inputpenilai'),
		);
		$this->M_penilaian_alternatif->update_status($atad, $id); //update where


		$logpenilaian = array(
			'id_user' => $this->session->userdata('id_user'),
			'kode_alternatif' => $this->input->post('inputalternatif'),
			'event' => 'Nilai Alternatif',
		);
		$this->M_penilaian_alternatif->input_data_log_penilaian('log_penilaian', $logpenilaian);


		$kode_alternatif = $this->input->post('inputalternatif'); // isi nilai di tabel nilai_alternatif		
		$nilai = $this->input->post('nilai');
		$catatan = $this->input->post('catatan');

		$data = array();
		$murni = array();
		foreach ($nilai as $key => $v) {
			$h = array(
				'kode_alternatif' => $kode_alternatif,
				'kode_kriteria' => $key,
				'nilai' => array_sum($v),
			);

			foreach ($v as $ind => $mur) {
				$i = $ind + 1;
				$m = [
					"kode_alternatif" => $kode_alternatif,
					"kode_indikator" => $key . "-" . $i,
					"nilai" => $mur,
					"catatan" => $catatan[$key][$ind],
				];

				array_push($murni, $m);
			}

			array_push($data, $h);
		}

		// var_dump($mur);
		// die;

		$this->M_penilaian_alternatif->input_data_batch_nilai($data); // inputan dari form masuk ke db nilai (tabel nilai_alternatif)
		$this->M_penilaian_alternatif->input_data_batch_nilai_murni($murni); // inputan dari form masuk ke db nilai (tabel nilai_alternatif)

		$this->M_penilaian_alternatif->update_kuadrat_nilai(); // inputan dari input data batch dikuadratin (tabel nilai_alternatif)


		$datajkn = $this->M_penilaian_alternatif->jumlah_kuadrat_nilai(); //ambil selectnya kuadrat_nilai masukin ke variabel datajkn
		$nnn = array();
		for ($i = 0; $i < count($datajkn); $i++) {
			$this->M_penilaian_alternatif->update_jumlah_kuadrat($datajkn[$i]['jkn'], $datajkn[$i]['sort']); //update datajkn ke db sesuai urutannya (tabel kriteria) 
		}


		$this->M_penilaian_alternatif->update_normalisasi_alternatif(); // kuadrat_nilai / akar jumlahkuadrat nilai (tabel nilai_alternatif)
		$this->M_penilaian_alternatif->update_normalisasi_terbobot(); // normalisasi * bobot


		$datasip = $this->M_penilaian_alternatif->hitung_solusi_ideal_positif(); //ambil selectnya sip masukin ke variabel datasip
		$mmm = array();
		for ($i = 0; $i < count($datasip); $i++) {
			$this->M_penilaian_alternatif->update_solusi_ideal_positif($datasip[$i]['sip'], $datasip[$i]['sort']); //update datasip ke db sesuai urutannya (tabel kriteria) 
		}


		$datasin = $this->M_penilaian_alternatif->hitung_solusi_ideal_negatif(); //ambil selectnya sip masukin ke variabel datasip
		$mmm = array();
		for ($i = 0; $i < count($datasin); $i++) {
			$this->M_penilaian_alternatif->update_solusi_ideal_negatif($datasin[$i]['sin'], $datasin[$i]['sort']); //update datasip ke db sesuai urutannya (tabel kriteria) 
		}


		$this->M_penilaian_alternatif->update_jarak_solusi_positif();
		$this->M_penilaian_alternatif->update_jarak_solusi_negatif();

		$datajsp = $this->M_penilaian_alternatif->jumlah_jarak_solusi_positif(); //ambil selectnya sip masukin ke variabel datasip
		$mmm = array();
		for ($i = 0; $i < count($datajsp); $i++) {
			$this->M_penilaian_alternatif->update_jumlah_jarak_solusi_positif($datajsp[$i]['jsp'], $datajsp[$i]['sort']); //update datasip ke db sesuai urutannya (tabel kriteria) 
		}

		$datajsn = $this->M_penilaian_alternatif->jumlah_jarak_solusi_negatif(); //ambil selectnya sip masukin ke variabel datasip
		$mmm = array();
		for ($i = 0; $i < count($datajsn); $i++) {
			$this->M_penilaian_alternatif->update_jumlah_jarak_solusi_negatif($datajsn[$i]['jsn'], $datajsn[$i]['sort']); //update datasip ke db sesuai urutannya (tabel kriteria) 
		}

		$datajnm = $this->M_penilaian_alternatif->jumlah_nilai_murni(); //ambil selectnya kuadrat_nilai masukin ke variabel datajkn
		$nnn = array();
		for ($i = 0; $i < count($datajnm); $i++) {
			$this->M_penilaian_alternatif->update_jumlah_nilai_murni($datajnm[$i]['jnm'], $datajnm[$i]['sort']); //update datajkn ke db sesuai urutannya (tabel kriteria) 
		}
		$this->M_penilaian_alternatif->update_preferensi();


		$this->session->set_flashdata('successSave', 'ok');
		redirect('penilaian-alternatif');

		// var_dump(array_sum($nilai['K1']));
		// var_dump($data);
		// die();
	}

	public function sinkron_delete()
	{
		$this->M_penilaian_alternatif->update_kuadrat_nilai(); // inputan dari input data batch dikuadratin (tabel nilai_alternatif)


		$datajkn = $this->M_penilaian_alternatif->jumlah_kuadrat_nilai(); //ambil selectnya kuadrat_nilai masukin ke variabel datajkn
		$nnn = array();
		for ($i = 0; $i < count($datajkn); $i++) {
			$this->M_penilaian_alternatif->update_jumlah_kuadrat($datajkn[$i]['jkn'], $datajkn[$i]['sort']); //update datajkn ke db sesuai urutannya (tabel kriteria) 
		}


		$this->M_penilaian_alternatif->update_normalisasi_alternatif(); // kuadrat_nilai / akar jumlahkuadrat nilai (tabel nilai_alternatif)
		$this->M_penilaian_alternatif->update_normalisasi_terbobot(); // normalisasi * bobot


		$datasip = $this->M_penilaian_alternatif->hitung_solusi_ideal_positif(); //ambil selectnya sip masukin ke variabel datasip
		$mmm = array();
		for ($i = 0; $i < count($datasip); $i++) {
			$this->M_penilaian_alternatif->update_solusi_ideal_positif($datasip[$i]['sip'], $datasip[$i]['sort']); //update datasip ke db sesuai urutannya (tabel kriteria) 
		}


		$datasin = $this->M_penilaian_alternatif->hitung_solusi_ideal_negatif(); //ambil selectnya sip masukin ke variabel datasip
		$mmm = array();
		for ($i = 0; $i < count($datasin); $i++) {
			$this->M_penilaian_alternatif->update_solusi_ideal_negatif($datasin[$i]['sin'], $datasin[$i]['sort']); //update datasip ke db sesuai urutannya (tabel kriteria) 
		}


		$this->M_penilaian_alternatif->update_jarak_solusi_positif();
		$this->M_penilaian_alternatif->update_jarak_solusi_negatif();

		$datajsp = $this->M_penilaian_alternatif->jumlah_jarak_solusi_positif(); //ambil selectnya sip masukin ke variabel datasip
		$mmm = array();
		for ($i = 0; $i < count($datajsp); $i++) {
			$this->M_penilaian_alternatif->update_jumlah_jarak_solusi_positif($datajsp[$i]['jsp'], $datajsp[$i]['sort']); //update datasip ke db sesuai urutannya (tabel kriteria) 
		}

		$datajsn = $this->M_penilaian_alternatif->jumlah_jarak_solusi_negatif(); //ambil selectnya sip masukin ke variabel datasip
		$mmm = array();
		for ($i = 0; $i < count($datajsn); $i++) {
			$this->M_penilaian_alternatif->update_jumlah_jarak_solusi_negatif($datajsn[$i]['jsn'], $datajsn[$i]['sort']); //update datasip ke db sesuai urutannya (tabel kriteria) 
		}

		$datajnm = $this->M_penilaian_alternatif->jumlah_nilai_murni(); //ambil selectnya kuadrat_nilai masukin ke variabel datajkn
		$nnn = array();
		for ($i = 0; $i < count($datajnm); $i++) {
			$this->M_penilaian_alternatif->update_jumlah_nilai_murni($datajnm[$i]['jnm'], $datajnm[$i]['sort']); //update datajkn ke db sesuai urutannya (tabel kriteria) 
		}

		$this->M_penilaian_alternatif->update_preferensi();


		$this->session->set_flashdata('successDelete', 'ok');
		redirect('penilaian-alternatif');

		// var_dump(array_sum($nilai['K1']));
		// var_dump($data);
		// die();
	}

	public function delete_penilaian_alternatif($id)
	{
		$loghapuspenilaian = array(
			'id_user' => $this->session->userdata('id_user'),
			'kode_alternatif' => $id,
			'event' => 'Hapus Nilai Alternatif',
		);
		$this->M_penilaian_alternatif->input_data_log_penilaian('log_penilaian', $loghapuspenilaian);

		$this->M_penilaian_alternatif->delete_penilaian_alternatif($id);
		$this->M_penilaian_alternatif->delete_nilai_murni_alternatif($id);
		$this->M_penilaian_alternatif->clean_alternatif();
		$this->M_penilaian_alternatif->clean_kriteria();

		$atad = array(
			'status' => 'Belum Dievaluasi',
		);
		$this->M_penilaian_alternatif->update_status($atad, $id);

		$this->session->set_flashdata('successDelete', 'ok');
		redirect('Penilaian_Alternatif/sinkron_delete');
	}

	public function edit_penilaian_alternatif()
	{
		$id =  $this->uri->segment(3);
		$this->load->model('M_alternatif');
		$data['alternatif'] =  $this->M_alternatif->tampil_data_tabel_alternatif()->result();

		$recordget =  $this->M_alternatif->get_one($id)->row_array();
		$indikatorGet = $this->M_penilaian_alternatif->ambil_indikator();
		$nilaiget =  $this->M_penilaian_alternatif->get_one($id)->result_array();

		$data = [
			'indikator' => $indikatorGet,
			'record' => $recordget,
			'recordnilai' => $nilaiget,
		];

		$this->load->view('v_edit_nilai_penilaian', $data);
	}

	public function update_nilai_alternatif()
	{
		$id = $this->input->post('inputalternatif');
		$this->M_penilaian_alternatif->delete_penilaian_alternatif($id);
		$this->M_penilaian_alternatif->delete_nilai_murni_alternatif($id);
		$this->M_penilaian_alternatif->clean_alternatif();
		$this->M_penilaian_alternatif->clean_kriteria();

		$atad = array(
			'status' => 'Belum Dievaluasi',
		);
		$this->M_penilaian_alternatif->update_status($atad, $id); //update where

		$atad = array(
			'status' => 'Sudah Dievaluasi',
			'id_user' => $this->input->post('inputpenilai'),
		);
		$this->M_penilaian_alternatif->update_status($atad, $id); //update where

		$logupdatepenilaian = array(
			'id_user' => $this->session->userdata('id_user'),
			'kode_alternatif' => $this->input->post('inputalternatif'),
			'event' => 'Update Nilai Alternatif',
		);
		$this->M_penilaian_alternatif->input_data_log_penilaian('log_penilaian', $logupdatepenilaian);


		$kode_alternatif = $this->input->post('inputalternatif'); // isi nilai di tabel nilai_alternatif		
		$nilai = $this->input->post('nilai');
		$catatan = $this->input->post('catatan');

		$data = array();
		$murni = array();
		foreach ($nilai as $key => $v) {
			$h = array(
				'kode_alternatif' => $kode_alternatif,
				'kode_kriteria' => $key,
				'nilai' => array_sum($v),
			);

			foreach ($v as $ind => $mur) {
				$i = $ind + 1;
				$m = [
					"kode_alternatif" => $kode_alternatif,
					"kode_indikator" => $key . "-" . $i,
					"nilai" => $mur,
					"catatan" => $catatan[$key][$ind],
				];

				array_push($murni, $m);
			}

			array_push($data, $h);
		}

		// var_dump($mur);
		// die;

		$this->M_penilaian_alternatif->input_data_batch_nilai($data); // inputan dari form masuk ke db nilai, ini sudah diproses tambah jadi ada 8 doang (tabel nilai_alternatif)
		$this->M_penilaian_alternatif->input_data_batch_nilai_murni($murni); // inputan dari form masuk ke db nilai, ini belum diproses baru jadi ada 39 (tabel nilai_murni)

		$this->M_penilaian_alternatif->update_kuadrat_nilai(); // inputan dari input data batch dikuadratin (tabel nilai_alternatif)


		$datajkn = $this->M_penilaian_alternatif->jumlah_kuadrat_nilai(); //ambil selectnya kuadrat_nilai masukin ke variabel datajkn
		$nnn = array();
		for ($i = 0; $i < count($datajkn); $i++) {
			$this->M_penilaian_alternatif->update_jumlah_kuadrat($datajkn[$i]['jkn'], $datajkn[$i]['sort']); //update datajkn ke db sesuai urutannya (tabel kriteria) 
		}


		$this->M_penilaian_alternatif->update_normalisasi_alternatif(); // kuadrat_nilai / akar jumlahkuadrat nilai (tabel nilai_alternatif)
		$this->M_penilaian_alternatif->update_normalisasi_terbobot(); // normalisasi * bobot


		$datasip = $this->M_penilaian_alternatif->hitung_solusi_ideal_positif(); //ambil selectnya sip masukin ke variabel datasip
		$mmm = array();
		for ($i = 0; $i < count($datasip); $i++) {
			$this->M_penilaian_alternatif->update_solusi_ideal_positif($datasip[$i]['sip'], $datasip[$i]['sort']); //update datasip ke db sesuai urutannya (tabel kriteria) 
		}


		$datasin = $this->M_penilaian_alternatif->hitung_solusi_ideal_negatif(); //ambil selectnya sip masukin ke variabel datasip
		$mmm = array();
		for ($i = 0; $i < count($datasin); $i++) {
			$this->M_penilaian_alternatif->update_solusi_ideal_negatif($datasin[$i]['sin'], $datasin[$i]['sort']); //update datasip ke db sesuai urutannya (tabel kriteria) 
		}


		$this->M_penilaian_alternatif->update_jarak_solusi_positif();
		$this->M_penilaian_alternatif->update_jarak_solusi_negatif();

		$datajsp = $this->M_penilaian_alternatif->jumlah_jarak_solusi_positif(); //ambil selectnya sip masukin ke variabel datasip
		$mmm = array();
		for ($i = 0; $i < count($datajsp); $i++) {
			$this->M_penilaian_alternatif->update_jumlah_jarak_solusi_positif($datajsp[$i]['jsp'], $datajsp[$i]['sort']); //update datasip ke db sesuai urutannya (tabel kriteria) 
		}

		$datajsn = $this->M_penilaian_alternatif->jumlah_jarak_solusi_negatif(); //ambil selectnya sip masukin ke variabel datasip
		$mmm = array();
		for ($i = 0; $i < count($datajsn); $i++) {
			$this->M_penilaian_alternatif->update_jumlah_jarak_solusi_negatif($datajsn[$i]['jsn'], $datajsn[$i]['sort']); //update datasip ke db sesuai urutannya (tabel kriteria) 
		}

		$datajnm = $this->M_penilaian_alternatif->jumlah_nilai_murni(); //ambil selectnya kuadrat_nilai masukin ke variabel datajkn
		$nnn = array();
		for ($i = 0; $i < count($datajnm); $i++) {
			$this->M_penilaian_alternatif->update_jumlah_nilai_murni($datajnm[$i]['jnm'], $datajnm[$i]['sort']); //update datajkn ke db sesuai urutannya (tabel kriteria) 
		}

		$this->M_penilaian_alternatif->update_preferensi(); //akhir proses


		$this->session->set_flashdata('successSave', 'ok');
		redirect('penilaian-alternatif');

		// var_dump(array_sum($nilai['K1']));
		// var_dump($data);
		// die();
	}
}
