<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengindeks extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(['M_pengindeks']);
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index() //halaman awal pengindeks
	{
		$data['pengindeks'] = $this->M_pengindeks->tampil_data_pengindeks()->result();

		$this->load->view('v_pengindeks', $data);
	}

	public function add_pengindeks() //tambah data pengindeks
	{
		if (!empty($this->input->post('inputnamapengindeks')) && !empty($this->input->post('inputkategori'))) {
			if ($this->M_pengindeks->add_pengindeks(array(
				'nama' => $this->input->post('inputnamapengindeks'),
				'kategori' => $this->input->post('inputkategori')
			))) {
				$this->session->set_flashdata('successSave', 'ok');
				redirect('data-pengindeks');
			}
		}
		$this->load->view('v_add_pengindeks');
	}

	public function edit_pengindeks() //edit data pengindeks
	{
		$id =  $this->uri->segment(3);
		$data['pengindeks'] =  $this->M_pengindeks->tampil_data_pengindeks()->result();
		$data['record'] =  $this->M_pengindeks->get_kode_pengindeks($id)->row_array();
		$this->load->view('v_edit_pengindeks', $data);
	}

	public function update_pengindeks() //update data pengindeks
	{
		$kode = $this->input->post('kode');
		$data = array(
			'nama' => $this->input->post('inputnamapengindeks'),
			'kategori' => $this->input->post('inputkategori')
		);

		$this->M_pengindeks->update_pengindeks($data, $kode);
		$this->session->set_flashdata('successUpdate', 'ok');
		redirect('data-pengindeks');
	}

	public function delete_pengindeks($id)
	{
		$this->M_pengindeks->delete_pengindeks($id);
		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-pengindeks');
	}
}
