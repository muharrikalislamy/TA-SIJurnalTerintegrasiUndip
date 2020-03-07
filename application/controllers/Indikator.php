<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Indikator extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(['M_indikator']);
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index() //halaman awal indikator
	{
		$data['nilai'] = $this->M_indikator->tampil_data_nilai_indikator()->result();
		$data['indikator'] = $this->M_indikator->tampil_data_indikator()->result();

		$this->load->view('v_indikator', $data);
	}

	public function add_indikator() //tambah data indikator
	{
		$kriteriaGet = $this->M_indikator->ambil_kriteria();

		$data = [
			'kriteria' => $kriteriaGet,
		];

		$this->load->view('v_add_indikator', $data);
	}

	public function input_nilai_indikator() //masukan nilai indikator
	{
		$id =  $this->uri->segment(3);
		$data['indikator'] =  $this->M_indikator->tampil_data_indikator()->result();
		$data['record'] =  $this->M_indikator->get_kode_indikator($id)->row_array();

		$this->load->view('v_add_nilai_indikator', $data);
	}

	public function submit_indikator() //submit add data indikator
	{
		$kode = $this->input->post('inputkriteria');
		$data = array(
			'kode_kriteria' => $this->input->post('inputkriteria'),
			'kode_indikator' => strtoupper($kode . "-" . $this->input->post('inputindikator')),
			'nama' => $this->input->post('inputnamaindikator'),
		);

		// $cu = $this->db->select('kode_indikator')->get('indikator')->result();
		$iu = strtoupper("'" . $kode . "-" . $this->input->post('inputindikator') . "'");

		$cek = $this->db->query('select * from indikator where kode_indikator = ' . $iu . ' ')->num_rows();

		// var_dump($cek);
		// die();

		if ($cek <= 0) {
			// echo "mashok";
			$this->M_indikator->input_data('indikator', $data);
			$this->session->set_flashdata('successSave', 'ok');
			redirect('data-indikator');
		} else {
			// echo "ups tidak bisa";
			$this->session->set_flashdata('duplicateKode', 'ok');
			redirect('data-indikator/add');
		}

		// $this->form_validation->set_rules('inputindikator', 'warningrakkanggo', 'is_unique[indikator.kode_indikator]');
		// if ($this->form_validation->run() == FALSE)
		//       {
		// 	$this->session->set_flashdata('duplicateKode','ok');
		//           redirect('data-indikator/add');
		//       }
		//       else
		//       {
		// 	$kode = $this->input->post('inputkriteria');
		// 	$data = array(
		// 			'kode_kriteria'=> $this->input->post('inputkriteria'),
		// 			'kode_indikator'=> strtoupper($kode."-".$this->input->post('inputindikator')),
		// 			'nama'=> $this->input->post('inputnamaindikator'),
		// 			);

		// 	$this->M_indikator->input_data('indikator',$data);
		// 	$this->session->set_flashdata('successSave','ok');
		// 	redirect('data-indikator');
		//       }
	}

	public function submit_nilai_indikator() //submit add nilai indikator
	{
		// $this->form_validation->set_rules('inputidpenilaian', 'warningrakkanggo', 'is_unique[nilai_indikator.id_penilaian]');
		// 	if ($this->form_validation->run() == FALSE)
		//       {
		// 	$this->session->set_flashdata('duplicateKode','ok');
		//           redirect('data-indikator/');
		//       }
		//       else
		//       {
		$id = $this->input->post('inputkodeindikator');
		$data = array(
			// 'id_penilaian'=> $this->input->post('inputidpenilaian'),
			'id_penilaian' => strtoupper($id . "-" . $this->input->post('inputidpenilaian')),

			'kode_kriteria' => $this->input->post('inputkriteria'),
			'kode_indikator' => $this->input->post('inputkodeindikator'),
			'nama' => $this->input->post('inputnamaindikator'),
			'penilaian' => $this->input->post('inputpenilaian'),
			'nilai' => $this->input->post('inputnilaipenilaian'),
		);

		$iu = strtoupper("'" . $id . "-" . $this->input->post('inputidpenilaian') . "'");

		$cek = $this->db->query('select * from nilai_indikator where id_penilaian = ' . $iu . ' ')->num_rows();

		if ($cek <= 0) {
			// echo "mashok";
			$this->M_indikator->input_data('nilai_indikator', $data);
			$this->session->set_flashdata('successSave', 'ok');
			redirect('data-indikator');
		} else {
			// echo "ups tidak bisa";
			$this->session->set_flashdata('duplicateKode', 'ok');
			redirect('data-indikator');
		}


		// }
	}

	public function kode_check() // pancing
	{
		$cu = $this->db->select('kode_indikator')->get('indikator')->row();
		$iu = $this->input->post('inputindikator');

		if ($cu->kode_indikator == $iu) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function update_indikator() //update data indikator
	{
		$id = $this->input->post('inputindikator');
		$data = array(
			'kode_kriteria' => $this->input->post('inputkriteria'),
			'nama' => $this->input->post('inputnamaindikator'),
			'kode_indikator' => $this->input->post('inputindikator'),

		);

		$this->M_indikator->update_indikator($data, $id);
		$this->session->set_flashdata('successUpdate', 'ok');
		redirect('data-indikator');
	}

	public function update_nilai_indikator() //update data indikator
	{
		$id = $this->input->post('inputidpenilaian');
		$data = array(
			'id_penilaian' => $this->input->post('inputidpenilaian'),
			'kode_kriteria' => $this->input->post('inputkriteria'),
			'nama' => $this->input->post('inputnamaindikator'),
			'penilaian' => $this->input->post('inputpenilaian'),
			'nilai' => $this->input->post('inputnilaipenilaian'),

		);

		$this->M_indikator->update_nilai_indikator($data, $id);
		$this->session->set_flashdata('successUpdate', 'ok');
		redirect('data-indikator');
	}


	public function edit_indikator() // edit data indikator
	{
		$id =  $this->uri->segment(3);
		$data['indikator'] =  $this->M_indikator->tampil_data_indikator()->result();
		$data['record'] =  $this->M_indikator->get_kode_indikator($id)->row_array();
		$this->load->view('v_edit_indikator', $data);
	}

	public function edit_nilai_indikator() // edit nilai indikator
	{
		$id =  $this->uri->segment(3);
		$data['nilai_indikator'] =  $this->M_indikator->tampil_data_nilai_indikator()->result();
		$data['record'] =  $this->M_indikator->get_id_penilaian($id)->row_array();
		$this->load->view('v_edit_nilai_indikator', $data);
	}

	public function delete_indikator($id)
	{
		$this->M_indikator->delete_indikator($id);
		$this->M_indikator->delete_satu_nilai_indikator($id);


		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-indikator');
	}

	public function delete_nilai_indikator($id)
	{
		$this->M_indikator->delete_nilai_indikator($id);

		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-indikator');
	}
}
