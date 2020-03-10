<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_alternatif');
		$this->load->model('M_penilaian_alternatif');
		$this->load->model('M_log_penilaian');
		$this->load->model('M_jurnal');
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index()
	{
		$data['sudah'] = $this->M_alternatif->tampil_data_tabel_alternatif_sudah()->result();
		$data['belum'] = $this->M_alternatif->tampil_data_tabel_alternatif_belum()->result();

		$this->load->view('v_alternatif', $data);
	}

	public function add_alternatif()
	{
		$data['jurnal'] = $this->M_jurnal->ambil_jurnal_alternatifspk();
		$data['portal'] = $this->M_jurnal->ambil_data_portal();


		$this->load->view('v_add_alternatif', $data);
	}

	public function submit_alternatif()
	{
		$this->form_validation->set_rules('inputkode', 'warningrakkanggo', 'is_unique[alternatif.urutan]');
		$this->form_validation->set_rules('nama', 'warningrakkanggo', 'is_unique[alternatif_details.nama]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('duplicateKode', 'ok');
			redirect('data-alternatif/add');
		} else {
			$kode = $this->input->post('inputkode');

			$data = array(
				'kode_alternatif' => strtoupper("a" . $kode),
				'urutan' => $kode,
			);

			// $logadd = array(
			// 	'id_user'=> $this->session->userdata('id_user'),
			// 	'kode_alternatif'=> strtoupper("a".$kode),
			// 	'event'=> 'Tambah Data Alternatif',
			// );

			$jdl = explode(';', $this->input->post('inputname'));

			$atad = array(
				'id' => $kode,
				'kode_alternatif' => strtoupper("a" . $kode),
				'nama' => $jdl[1],
				'singkatan' => $jdl[0]
			);

			$this->M_alternatif->input_data_alternatif('alternatif', $data);
			// $this->M_alternatif->input_data_log('log_penilaian',$logadd);
			$this->M_alternatif->input_data_alternatif_details('alternatif_details', $atad);

			$this->session->set_flashdata('successSave', 'ok');
			redirect('data-alternatif');
		}

		$this->form_validation->set_rules('inputname', 'warningrakkanggo', 'is_unique[alternatif_details.nama]');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('duplicateKode', 'ok');
			redirect('data-alternatif/add');
		} else {
			$kode = $this->input->post('inputkode');

			$data = array(
				'kode_alternatif' => strtoupper("a" . $kode),
				'urutan' => $kode,
			);

			// $logadd = array(
			// 	'id_user'=> $this->session->userdata('id_user'),
			// 	'kode_alternatif'=> strtoupper("a".$kode),
			// 	'event'=> 'Tambah Data Alternatif',
			// );

			$jdl = explode(';', $this->input->post('inputname'));

			$atad = array(
				'id' => $kode,
				'kode_alternatif' => strtoupper("a" . $kode),
				'nama' => $jdl[1],
				'singkatan' => $jdl[0]
			);

			$this->M_alternatif->input_data_alternatif('alternatif', $data);
			// $this->M_alternatif->input_data_log('log_penilaian',$logadd);
			$this->M_alternatif->input_data_alternatif_details('alternatif_details', $atad);

			$this->session->set_flashdata('successSave', 'ok');
			redirect('data-alternatif');
		}
	}

	public function update_alternatif()
	{
		$id = $this->input->post('inputalternatif');
		$data = array(
			'kode_alternatif' => $this->input->post('inputalternatif'),
			'nama' => $this->input->post('inputname'),
			'singkatan' => $this->input->post('inputsingkatan'),
			'waktu_penilaian' => $this->input->post('inputwaktu'),
		);

		// $logadd = array(
		// 	'id_user'=> $this->session->userdata('id_user'),
		// 	'kode_alternatif'=> $this->input->post('inputalternatif'),
		// 	'event'=> 'Update Data Alternatif',
		// );

		$this->M_alternatif->update($data, $id);
		// $this->M_alternatif->input_data_log_alternatif('history_log',$logadd);

		$this->session->set_flashdata('successSave', 'ok');
		redirect('alternatif');
	}

	public function edit_alternatif()
	{
		$id =  $this->uri->segment(3);
		$data['alternatif'] =  $this->M_alternatif->tampil_data_tabel_alternatif()->result();
		$data['record'] =  $this->M_alternatif->get_one($id)->row_array();


		$this->load->view('v_edit_alternatif', $data);
	}

	public function delete_alternatif($id)
	{
		$this->M_alternatif->delete_alternatif($id);
		$this->M_alternatif->delete_alternatif_details($id);
		$this->M_alternatif->delete_log_penilaian_where($id);

		$this->M_penilaian_alternatif->delete_penilaian_alternatif($id);
		$this->M_penilaian_alternatif->delete_nilai_murni_alternatif($id);
		$this->M_penilaian_alternatif->clean_alternatif();
		$this->M_penilaian_alternatif->clean_kriteria();
		// $logadd = array(
		// 	'id_user'=> $this->session->userdata('id_user'),
		// 	'kode_alternatif'=> $id,
		// 	'event'=> 'Hapus Data Alternatif',
		// );

		// $this->M_alternatif->input_data_log_alternatif('history_log',$logadd);
		$this->session->set_flashdata('successDelete', 'ok');
		redirect('Alternatif/sinkron_delete');
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

		$this->M_penilaian_alternatif->update_preferensi();


		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-alternatif');

		// var_dump(array_sum($nilai['K1']));
		// var_dump($data);
		// die();
	}
}
