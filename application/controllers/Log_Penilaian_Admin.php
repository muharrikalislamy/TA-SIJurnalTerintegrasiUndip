<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_Penilaian_Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_log_penilaian');

		if ($this->session->userdata('permission') != "admin") {
			redirect("cekpermission");
		}
	}

	function index()
	{
		$data['logpenilaian'] = $this->M_log_penilaian->tampil_data_log_penilaian()->result();

		$this->load->view('permission/admin/v_log_penilaian', $data);
	}

	function delete_log_penilaian()
	{
		$this->M_log_penilaian->delete_log();

		$this->session->set_flashdata('successDelete', 'ok');
		redirect('Log_Penilaian_Admin');
	}
}
