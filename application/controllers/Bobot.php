<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bobot extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_bobot');

		if ($this->session->userdata('permission') != "admin") {
			redirect("cekpermission");
		}
	}

	function index()
	{
		//echo 'ini adada';\
		// $datank['nk1'] = $this->M_bobot->ambil_nama_kriteria1();
		$nilai = $this->M_bobot->getNama();
		$nama = $this->M_bobot->getPreferensi();

		$data = [
			'tes' => $nilai,
			'tis' => $nama
		];
		// $data = [
		// 'data'=>$data
		// ];

		// var_dump($dota, $data);
		// die();


		$this->load->view('v_bobot', $data);
	}
}
