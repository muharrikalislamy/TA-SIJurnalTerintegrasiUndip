<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(['M_portal']);
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index() //halaman awal portal
	{
		$data['portal'] = $this->M_portal->tampil_data_portal()->result();

		$this->load->view('v_portal', $data);
	}

	public function add_portal() //tambah data portal
	{
		if (!empty($this->input->post('inputnamaportal'))) {
			if ($this->M_portal->add_portal(array('nama' => $this->input->post('inputnamaportal')))) {
				$this->session->set_flashdata('successSave', 'ok');
				redirect('data-portal');
			}
		}
		$this->load->view('v_add_portal');
	}

	public function edit_portal() //edit data portal
	{
		$id =  $this->uri->segment(3);
		$data['portal'] =  $this->M_portal->tampil_data_portal()->result();
		$data['record'] =  $this->M_portal->get_kode_portal($id)->row_array();
		$this->load->view('v_edit_portal', $data);
	}

	public function update_portal() //update data portal
	{
		$kode = $this->input->post('kode');
		$data = array(
			'nama' => $this->input->post('inputnamaportal'),
			'kode_portal' => $this->input->post('inputportal'),
		);

		$this->M_portal->update_portal($data, $kode);
		$this->session->set_flashdata('successUpdate', 'ok');
		redirect('data-portal');
	}

	public function delete_portal($id)
	{
		$this->M_portal->delete_portal($id);
		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-portal');
	}
}
