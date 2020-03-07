<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lab extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(['M_lab', 'M_departemen']);
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index() //halaman awal lab
	{
		$data['lab'] = $this->M_lab->tampil_data_lab()->result();
		$data['departemen'] = $this->M_departemen->ambil_departemen();
		$this->load->view('v_lab', $data);
	}

	public function add_lab() //tambah data lab
	{
		$data['departemen'] = $this->M_lab->ambil_data_departemen();
		$this->form_validation->set_rules('inputnamalab', 'warningrakkanggo', 'is_unique[lab.nama]');

		if (!empty($this->input->post('inputnamalab')) && !empty($this->input->post('inputdepartemen'))) {
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('duplicateNama', 'ok');
				redirect('data-lab/add');
			}
			if ($this->M_lab->add_lab(array('kode_departemen' =>
			$this->input->post('inputdepartemen'), 'nama' =>
			$this->input->post('inputnamalab')))) {
				$this->session->set_flashdata('successSave', 'ok');
				redirect('data-lab');
			}
		}
		$this->load->view('v_add_lab', $data);
	}

	public function edit_lab() //edit data lab
	{
		$id =  $this->uri->segment(3);
		$data['lab'] =  $this->M_lab->tampil_data_lab()->result();
		$data['record'] =  $this->M_lab->get_kode_lab($id)->row_array();
		$data['departemen'] = $this->M_lab->ambil_data_departemen();
		$this->load->view('v_edit_lab', $data);
	}

	public function update_lab() //update data lab
	{
		if (!empty($this->input->post('inputnamalab'))) {
			$kode = $this->input->post('kode');
			$data = array(
				'nama' => $this->input->post('inputnamalab'),
				'kode_lab' => $this->input->post('inputlab'),
				'kode_departemen' => $this->input->post('inputdepartemen')
			);
			$this->form_validation->set_rules('inputnamalab', 'warningrakkanggo', 'is_unique[lab.nama]');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('duplicateNama', 'ok');
				redirect('data-lab');
			} else {
				$this->M_lab->update_lab($data, $kode);
				$this->session->set_flashdata('successUpdate', 'ok');
				redirect('data-lab');
			}
		}
	}

	public function delete_lab($id)
	{
		$this->M_lab->delete_lab($id);
		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-lab');
	}
}
