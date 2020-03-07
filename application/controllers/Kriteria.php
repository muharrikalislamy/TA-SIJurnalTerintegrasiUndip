<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(['M_kriteria', 'M_analisa_kriteria']);
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index()
	{
		$data['kriteria'] = $this->M_kriteria->tampil_data_tabel_kriteria()->result();

		$this->load->view('v_kriteria', $data);
	}

	public function add_kriteria()
	{
		$this->load->view('v_add_kriteria');
	}

	public function submit_kriteria()
	{
		$this->form_validation->set_rules('inputkode', 'warningrakkanggo', 'is_unique[kriteria_details.id]');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('duplicateKode', 'ok');
			redirect('data-kriteria/add');
		} else {
			// $kode = intval(substr($this->M_kriteria->get_kode()->kode, 1)) + 1;
			// $kode = $this->M_kriteria->get_kode()->urutan +1;
			$kode = $this->input->post('inputkode');

			$data = array(
				'kode_kriteria' => strtoupper("k" . $kode),
				'urutan' => $kode,
			);

			$atad = array(
				'id' => $kode,
				'kode_kriteria' => strtoupper("k" . $kode),
				'nama' => $this->input->post('inputname'),
				'kependekan' => $this->input->post('inputkependekan'),
				'deskripsi' => $this->input->post('inputdeskripsi'),
			);


			// $kode = $this->M_kriteria->get_kode();
			// var_dump($kode);
			// die();

			$dataAnalisa = array();

			for ($i = 1; $i <= $kode; $i++) {
				$data1['id_analisa'] = "AK" . $i . "-" . $kode;
				$data1['kriteria_pertama'] = "K" . $i;
				$data1['kriteria_kedua'] = "K" . $kode;

				array_push($dataAnalisa, $data1);
			}

			for ($i = 1; $i < $kode; $i++) {
				$data2['id_analisa'] = "AK" . $kode . "-" . $i;
				$data2['kriteria_pertama'] = "K" . $kode;
				$data2['kriteria_kedua'] = "K" . $i;

				array_push($dataAnalisa, $data2);
			}

			// var_dump($dataAnalisa);
			// die();

			$this->M_kriteria->input_data_kriteria('kriteria', $data);
			$this->M_kriteria->input_data_kriteria_details('kriteria_details', $atad);


			foreach ($dataAnalisa as $key => $value) {
				$this->M_analisa_kriteria->addAnalisaKriteria($value);
			}

			// coba
			$id = "AK" . $kode . "-" . $kode;
			$atad = array(
				'nilai_dependence_kriteria' => 1,
			);
			$this->M_kriteria->set_satu($atad, $id);
			//coba

			// redirect('Analisa_Kriteria/update_FA'); //from add kriteria
			$this->session->set_flashdata('successSave', 'ok');
			redirect('data-kriteria'); //from add kriteria
		}
	}

	public function kode_check()
	{
		$cu = $this->db->select('kode_kriteria')->get('kriteria')->row();
		$iu = $this->input->post('inputkode');

		if ($cu->kode_kriteria == $iu) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function update_kriteria()
	{
		$id = $this->input->post('inputkriteria');
		$data = array(
			'kode_kriteria' => $this->input->post('inputkriteria'),
			'nama' => $this->input->post('inputname'),
			'kependekan' => $this->input->post('inputkependekan'),
			'deskripsi' => $this->input->post('inputdeskripsi'),
		);

		$this->M_kriteria->kriteria_update($data, $id);
		$this->session->set_flashdata('successUpdate', 'ok');
		redirect('data-kriteria');
	}

	public function edit_kriteria()
	{
		$id = $this->uri->segment(3);
		$data['kriteria'] =  $this->M_kriteria->tampil_data_tabel_kriteria()->result();
		$data['record'] =  $this->M_kriteria->get_one($id)->row_array();
		$this->load->view('v_edit_kriteria', $data);
	}

	public function delete_kriteria($id)
	{
		$this->M_kriteria->delete_kriteria($id);
		$this->M_kriteria->delete_kriteria_details($id);
		$this->M_analisa_kriteria->delete_analisa_kriteria($id);
		$this->M_kriteria->delete_indikator_kriteria($id);
		$this->M_kriteria->delete_nilai_indikator_kriteria($id);


		// redirect('Analisa_Kriteria/update_FD');
		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-kriteria'); //from add kriteria
	}
}
