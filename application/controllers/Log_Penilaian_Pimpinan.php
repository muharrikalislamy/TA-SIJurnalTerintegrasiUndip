<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_Penilaian_Pimpinan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_log_penilaian');

		if ($this->session->userdata('permission') != "pimpinan") {
			redirect("cekpermission");
		}
	}

	function index()
	{
		$data['logpenilaian'] = $this->M_log_penilaian->tampil_data_log_penilaian()->result();

		$this->load->view('permission/pimpinan/v_log_penilaian', $data);
	}
}
