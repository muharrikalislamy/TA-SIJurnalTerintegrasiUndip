<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departemen extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(['M_departemen', 'M_fakultas']);
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index() //halaman awal departemen
	{
		$data['departemen'] = $this->M_departemen->tampil_data_departemen()->result();
		$data['fakultas'] = $this->M_fakultas->ambil_fakultas();
		$this->load->view('v_departemen', $data);
	}

	public function add_departemen() //tambah data departemen
	{
		$data['fakultas'] = $this->M_fakultas->ambil_fakultas();
		$this->form_validation->set_rules('inputnamadepartemen', 'warningrakkanggo', 'is_unique[departemen.nama]');

		if (!empty($this->input->post('inputnamadepartemen')) && !empty($this->input->post('inputfakultas'))) {
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('duplicateNama', 'ok');
				redirect('data-departemen/add');
			}
			if ($this->M_departemen->add_departemen(array(
				'kode_fakultas' => $this->input->post('inputfakultas'),
				'nama' => $this->input->post('inputnamadepartemen')
			))) {
				$this->session->set_flashdata('successSave', 'ok');
				redirect('data-departemen');
			}
		}
		$this->load->view('v_add_departemen', $data);
	}

	public function edit_departemen() //edit data departemen
	{
		$id =  $this->uri->segment(3);
		$data['departemen'] =  $this->M_departemen->tampil_data_departemen()->result();
		$data['record'] =  $this->M_departemen->get_kode_departemen($id)->row_array();
		$data['fakultas'] = $this->M_fakultas->ambil_fakultas();
		$this->load->view('v_edit_departemen', $data);
	}

	public function update_departemen() //update data departemen
	{
		if (!empty($this->input->post('inputnamadepartemen')) && !empty($this->input->post('inputfakultas'))) {
			$kode = $this->input->post('kode');
			$data = array(
				'nama' => $this->input->post('inputnamadepartemen'),
				'kode_departemen' => $this->input->post('kode'),
				'kode_fakultas' => $this->input->post('inputfakultas')
			);
			$this->form_validation->set_rules('inputnamadepartemen', 'warningrakkanggo', 'is_unique[departemen.nama]');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('duplicateNama', 'ok');
				redirect('data-departemen');
			} else {
				$this->M_departemen->update_departemen($data, $kode);
				$this->session->set_flashdata('successUpdate', 'ok');
				redirect('data-departemen');
			}
		}
	}

	public function delete_departemen($id)
	{
		$this->M_departemen->delete_departemen($id);
		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-departemen');
	}
}
