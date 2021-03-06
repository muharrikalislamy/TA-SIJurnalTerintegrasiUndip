<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_Murni_Pimpinan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_nilai_murni');

		if ($this->session->userdata('permission') != "pimpinan") {
			redirect("cekpermission");
		}
	}

	function index()
	{
		$data['murni'] = $this->M_nilai_murni->tampil_data_nilai_murni()->result();

		$this->load->view('permission/pimpinan/v_nilai_murni', $data);
	}
}
