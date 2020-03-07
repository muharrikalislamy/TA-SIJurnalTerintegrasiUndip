<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluator extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_home');
		$this->load->model('M_penilaian_alternatif');


		if ($this->session->userdata('permission') != "evaluator") {
			redirect("cekpermission");
		}
	}

	function random_color_part()
	{
		return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
	}

	function random_color()
	{
		return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
	}

	function index()
	{
		// var_dump($this->session->userdata('id'));
		// die();
		$data['kriteria'] = $this->M_home->tampil_data_kriteria()->result();
		$data['alternatif'] = $this->M_home->ambil_alternatif_rank()->result();

		$data['userCount'] = $this->M_home->get_user_count();
		$data['kriteriaCount'] = $this->M_home->get_kriteria_count();
		$data['indikatorCount'] = $this->M_home->get_indikator_count();
		$data['alternatifCount'] = $this->M_home->get_alternatif_count();

		$data['alternatifbelum'] = $this->M_penilaian_alternatif->tampil_data_alternatif_belum()->result();


		// $res = $this->M_home->ambil_datagrafik_rank();
		// $colors = []; 
		$graph = array();
		foreach ($data['kriteria'] as $key => $value) {
			$color = "#" . $this->random_color();
			array_push($graph, [
				'value' => $value->bobot_kriteria * 100,
				'color' => $color,
				'highlight' => $color,
				'label' => $value->nama
			]);
		}

		$data['bobotGraph'] = json_encode($graph);
		// var_dump(json_encode($graph));
		// die();


		$this->load->view('v_home_evaluator', $data);
	}
}
