<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lembaga extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(['M_lembaga']);
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index() //halaman awal lembaga
	{
		$data['lembaga'] = $this->M_lembaga->tampil_data_lembaga()->result();

		$this->load->view('v_lembaga', $data);
	}

	public function add_lembaga() //tambah data lembaga
	{
		$this->form_validation->set_rules('inputnamalembaga', 'warningrakkanggo', 'is_unique[lembaga.nama]');

		if (!empty($this->input->post('inputnamalembaga'))) {
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('duplicateNama', 'ok');
				redirect('data-lembaga/add');
			}
			if ($this->M_lembaga->add_lembaga(array('nama' => $this->input->post('inputnamalembaga')))) {
				$this->session->set_flashdata('successSave', 'ok');
				redirect('data-lembaga');
			}
		}
		$this->load->view('v_add_lembaga');
	}

	public function edit_lembaga() //edit data lembaga
	{
		$id =  $this->uri->segment(3);
		$data['lembaga'] =  $this->M_lembaga->tampil_data_lembaga()->result();
		$data['record'] =  $this->M_lembaga->get_kode_lembaga($id)->row_array();
		$this->load->view('v_edit_lembaga', $data);
	}

	public function update_lembaga() //update data lembaga
	{
		$kode = $this->input->post('kode');
		$data = array(
			'nama' => $this->input->post('inputnamalembaga'),
			'kode_lembaga' => $this->input->post('inputlembaga'),
		);

		if (!empty($this->input->post('inputnamalembaga'))) {
			$kode = $this->input->post('kode');
			$data = array(
				'nama' => $this->input->post('inputnamalembaga'),
				'kode_lembaga' => $this->input->post('kode')
			);
			$this->form_validation->set_rules('inputnamalembaga', 'warningrakkanggo', 'is_unique[lembaga.nama]');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('duplicateNama', 'ok');
				redirect('data-lembaga');
			} else {
				$this->M_lembaga->update_lembaga($data, $kode);
				$this->session->set_flashdata('successUpdate', 'ok');
				redirect('data-lembaga');
			}
		}

		$this->M_lembaga->update_lembaga($data, $kode);
		$this->session->set_flashdata('successUpdate', 'ok');
		redirect('data-lembaga');
	}

	public function delete_lembaga($id)
	{
		$this->M_lembaga->delete_lembaga($id);
		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-lembaga');
	}
}
