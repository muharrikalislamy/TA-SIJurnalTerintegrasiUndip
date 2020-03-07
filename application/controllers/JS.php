<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JS extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(['M_sk']);
		$this->load->model(['M_jurnal']);
		$this->load->model(['M_js']);
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index() //halaman awal pengindeks
	{
		$data['js'] = $this->M_js->ambil_js();
		$data['sk'] = $this->M_sk->ambil_sk();
		$data['jurnal'] = $this->M_jurnal->tampil_data_jurnal()->result();
		$data['sk'] = $this->M_sk->tampil_data_sk()->result();

		$this->load->view('v_js', $data);
	}

	public function add_js() //tambah data pengindeks
	{
		$id =  $this->uri->segment(3);
		$data['id'] = $id;
		$data['js'] = $this->M_js->ambil_js();
		$data['sk'] = $this->M_sk->ambil_sk();
		$data['jurnal'] = $this->M_jurnal->tampil_data_jurnal()->result();
		$data['record'] =  $this->M_jurnal->get_kode_jurnal($id)->row_array();
		$this->load->view('v_add_js', $data);
	}

	public function add_js_sk() //tambah data pengindeks
	{
		$id =  $this->uri->segment(3);
		$data['id'] = $id;
		$data['js'] = $this->M_js->ambil_js();
		$data['sk'] = $this->M_sk->ambil_sk();
		$data['jurnal'] = $this->M_jurnal->tampil_data_jurnal()->result();
		$data['record'] =  $this->M_sk->get_kode_sk($id)->row_array();
		$this->load->view('v_add_js_sk', $data);
	}

	public function submit_js() //tambah data pengindeks
	{
		$id =  $this->uri->segment(3);
		$data['record'] =  $this->M_jurnal->get_kode_jurnal($id)->row_array();

		if (
			!empty($this->input->post('inputnomorsk'))
			&& !empty($this->input->post('inputjurnal'))
			&& !empty($this->input->post('inputsinta'))
			&& !empty($this->input->post('inputmulaisk'))
			&& !empty($this->input->post('inputakhirsk'))
			&& !empty($this->input->post('inputurlsinta'))
		) {
			if ($this->M_js->add_js(array(
				'kode_sk' => $this->input->post('inputnomorsk'),
				'kode_jurnal' => $this->input->post('inputjurnal'),
				'peringkat_sinta' => $this->input->post('inputsinta'),
				'tanggal_mulai' => $this->input->post('inputmulaisk'),
				'tanggal_berakhir' => $this->input->post('inputakhirsk'),
				'url_sinta' => $this->input->post('inputurlsinta'),

			))) {
				$this->session->set_flashdata('successSave', 'ok');
				redirect('data-jurnal');
			}
		}
	}

	public function submit_js_sk() //tambah data pengindeks
	{
		$id =  $this->uri->segment(3);
		$data['record'] =  $this->M_jurnal->get_kode_jurnal($id)->row_array();

		if (
			!empty($this->input->post('inputnomorsk'))
			&& !empty($this->input->post('inputjurnal'))
			&& !empty($this->input->post('inputsinta'))
			&& !empty($this->input->post('inputmulaisk'))
			&& !empty($this->input->post('inputakhirsk'))
			&& !empty($this->input->post('inputurlsinta'))
		) {
			if ($this->M_js->add_js(array(
				'kode_sk' => $this->input->post('inputnomorsk'),
				'kode_jurnal' => $this->input->post('inputjurnal'),
				'peringkat_sinta' => $this->input->post('inputsinta'),
				'tanggal_mulai' => $this->input->post('inputmulaisk'),
				'tanggal_berakhir' => $this->input->post('inputakhirsk'),
				'url_sinta' => $this->input->post('inputurlsinta'),

			))) {
				$this->session->set_flashdata('successSave', 'ok');
				redirect('data-sk');
			}
		}
	}




	public function edit_js() //edit data pengindeks
	{
		$id =  $this->uri->segment(3);
		$data['sk'] =  $this->M_sk->tampil_data_sk()->result();
		$data['record'] =  $this->M_pengindeks->get_kode_js($id)->row_array();
		$this->load->view('v_edit_js', $data);
	}

	public function update_js() //update data pengindeks
	{
		$kode = $this->input->post('kode');
		$data = array(
			'nama' => $this->input->post('inputnamapengindeks'),
			'kategori' => $this->input->post('inputkategori')
		);

		$this->M_pengindeks->update_pengindeks($data, $kode);
		$this->session->set_flashdata('successUpdate', 'ok');
		redirect('data-sk');
	}

	public function delete_js($id)

	{
		$this->db->where('kode_js', $id);
		$this->db->delete('jurnal_sk');
		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-jurnal');
	}

	public function delete_js_sk($id)

	{
		$this->db->where('kode_js', $id);
		$this->db->delete('jurnal_sk');
		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-sk');
	}
}
