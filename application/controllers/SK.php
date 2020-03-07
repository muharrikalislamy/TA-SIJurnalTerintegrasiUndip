<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SK extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(['M_sk']);
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index() //halaman awal sk
	{
		$data['sk'] = $this->M_sk->tampil_data_sk()->result();

		$this->load->view('v_sk', $data);
	}

	public function add_sk() //tambah data sk
	{

		if (!empty($this->input->post('inputnomorsk')) && !empty($this->input->post('inputpenetapansk'))) {
			if ($this->M_sk->add_sk(array(
				'nomor' => $this->input->post('inputnomorsk'),
				'deskripsi' => $this->input->post('inputdeskripsisk'),
				'tanggal' => $this->input->post('inputpenetapansk')
			))) {
				$this->session->set_flashdata('successSave', 'ok');
				redirect('data-sk');
			}
		}
		$this->load->view('v_add_sk');
	}

	public function edit_sk() //edit data sk
	{
		$id =  $this->uri->segment(3);
		$data['sk'] =  $this->M_sk->tampil_data_sk()->result();
		$data['record'] =  $this->M_sk->get_kode_sk($id)->row_array();
		$this->load->view('v_edit_sk', $data);
	}

	public function update_sk() //update data sk
	{
		$kode = $this->input->post('kode');
		$data = array(
			'nomor' => $this->input->post('inputnomorsk'),
			'deskripsi' => $this->input->post('inputdeskripsisk'),
			'tanggal' => $this->input->post('inputpenetapansk')
		);

		$this->M_sk->update_sk($data, $kode);
		$this->session->set_flashdata('successUpdate', 'ok');
		redirect('data-sk');
	}

	public function delete_sk($id)
	{
		$this->M_sk->delete_sk($id);
		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-sk');
	}
}
