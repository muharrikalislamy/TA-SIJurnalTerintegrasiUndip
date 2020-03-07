<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(['M_fakultas']);
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index() //halaman awal fakultas
	{
		$data['fakultas'] = $this->M_fakultas->tampil_data_fakultas()->result();

		$this->load->view('v_fakultas', $data);
	}

	public function add_fakultas() //tambah data fakultas
	{

		$this->form_validation->set_rules('inputnamafakultas', 'warningrakkanggo', 'is_unique[fakultas.nama]');

		if (!empty($this->input->post('inputnamafakultas'))) {
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('duplicateNama', 'ok');
				redirect('data-fakultas/add');
			}
			if ($this->M_fakultas->add_fakultas(array(
				'kode_fakultas' => $this->input->post('inputfakultas'),
				'nama' => $this->input->post('inputnamafakultas')
			))) {
				$this->session->set_flashdata('successSave', 'ok');
				redirect('data-fakultas');
			}
		}

		$this->load->view('v_add_fakultas');
	}

	public function edit_fakultas() //edit data fakultas
	{
		$id =  $this->uri->segment(3);
		$data['fakultas'] =  $this->M_fakultas->tampil_data_fakultas()->result();
		$data['record'] =  $this->M_fakultas->get_kode_fakultas($id)->row_array();
		$this->load->view('v_edit_fakultas', $data);
	}

	public function update_fakultas() //update data fakultas
	{
		$kode = $this->input->post('kode');
		$data = array(
			'nama' => $this->input->post('inputnamafakultas'),
			'kode_fakultas' => $this->input->post('inputfakultas'),
		);

		if (!empty($this->input->post('inputnamafakultas'))) {
			$kode = $this->input->post('kode');
			$data = array(
				'nama' => $this->input->post('inputnamafakultas'),
				'kode_fakultas' => $this->input->post('kode')
			);
			$this->form_validation->set_rules('inputnamafakultas', 'warningrakkanggo', 'is_unique[fakultas.nama]');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('duplicateNama', 'ok');
				redirect('data-fakultas');
			} else {
				$this->M_fakultas->update_fakultas($data, $kode);
				$this->session->set_flashdata('successUpdate', 'ok');
				redirect('data-fakultas');
			}
		}
	}

	public function delete_fakultas($id)
	{
		$this->M_fakultas->delete_fakultas($id);
		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-fakultas');
	}
}
