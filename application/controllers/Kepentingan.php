<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepentingan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_kepentingan');
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}


	public function index()
	{
		$data['kepentingan'] = $this->M_kepentingan->tampil_data()->result();
		$this->load->view('v_kepentingan', $data);
	}


	public function update_kepentingan()
	{
		$id = $this->input->post('inputpreferensi');
		$data = array(
			'id_preferensi' => $this->input->post('inputpreferensi'),
			'nilai' => $this->input->post('inputnilai'),
			'keterangan' => $this->input->post('inputketerangan'),
		);

		$this->M_kepentingan->update($data, $id);
		$this->session->set_flashdata('successUpdate', 'ok');
		redirect('nilai-kepentingan');
	}


	function edit_kepentingan()
	{
		$id =  $this->uri->segment(3);
		$this->load->model('M_kepentingan');
		$data['nilai_preferensi'] =  $this->M_kepentingan->tampil_data()->result();
		$data['record'] =  $this->M_kepentingan->get_one($id)->row_array();
		$this->load->view('v_edit_kepentingan', $data);
	}
}
