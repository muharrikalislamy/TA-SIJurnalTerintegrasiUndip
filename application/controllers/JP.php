<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JP extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(['M_pengindeks']);
		$this->load->model(['M_jurnal']);
		$this->load->model(['M_jp']);
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index() //halaman awal pengindeks
	{
		$data['jp'] = $this->M_jp->ambil_jp();
		$data['pengindeks'] = $this->M_pengindeks->tampil_data_pengindeks()->result();
		$data['jurnal'] = $this->M_jurnal->tampil_data_jurnal()->result();

		$this->load->view('v_jp', $data);
	}

	public function add_jp() //tambah data pengindeks
	{
		$id =  $this->uri->segment(3);
		$data['id'] = $id;
		$data['jp'] = $this->M_jp->ambil_jp();
		$data['pengindeks'] = $this->M_pengindeks->tampil_data_pengindeks()->result();
		$data['jurnal'] = $this->M_jurnal->tampil_data_jurnal()->result();
		$data['record'] =  $this->M_jurnal->get_kode_jurnal($id)->row_array();
		$this->load->view('v_add_jp', $data);
	}

	public function add_jp_pengindeks() //tambah data pengindeks
	{
		$id =  $this->uri->segment(3);
		$data['id'] = $id;
		$data['jp'] = $this->M_jp->ambil_jp();
		$data['pengindeks'] = $this->M_pengindeks->tampil_data_pengindeks()->result();
		$data['jurnal'] = $this->M_jurnal->tampil_data_jurnal()->result();
		$data['record'] =  $this->M_pengindeks->get_kode_pengindeks($id)->row_array();
		$this->load->view('v_add_jp_pengindeks', $data);
	}

	public function submit_jp() //tambah data pengindeks
	{
		if (
			!empty($this->input->post('inputnamapengindeks'))
			&& !empty($this->input->post('inputkategori'))
			&& !empty($this->input->post('inputjurnal'))
			&& !empty($this->input->post('inputurl'))
			&& !empty($this->input->post('inputketerangan'))

		) {
			if ($this->M_jp->add_jp(array(
				'kode_pengindeks' => $this->input->post('inputnamapengindeks'),
				'kategori' => $this->input->post('inputkategori'),
				'kode_jurnal' => $this->input->post('inputjurnal'),
				'url_pengindeks' => $this->input->post('inputurl'),
				'keterangan' => $this->input->post('inputketerangan'),

			))) {
				$this->session->set_flashdata('successSave', 'ok');
				redirect('data-jurnal');
			}
		}
	}

	public function submit_jp_pengindeks() //tambah data pengindeks
	{
		if (
			!empty($this->input->post('inputnamapengindeks'))
			&& !empty($this->input->post('inputkategori'))
			&& !empty($this->input->post('inputjurnal'))
			&& !empty($this->input->post('inputurl'))
			&& !empty($this->input->post('inputketerangan'))
		) {
			if ($this->M_jp->add_jp(array(
				'kode_pengindeks' => $this->input->post('inputnamapengindeks'),
				'kategori' => $this->input->post('inputkategori'),
				'kode_jurnal' => $this->input->post('inputjurnal'),
				'url_pengindeks' => $this->input->post('inputurl'),
				'keterangan' => $this->input->post('inputketerangan'),

			))) {
				$this->session->set_flashdata('successSave', 'ok');
				redirect('data-pengindeks');
			}
		}
	}

	public function edit_jp() //edit data pengindeks
	{
		$id =  $this->uri->segment(3);
		$data['pengindeks'] =  $this->M_pengindeks->tampil_data_pengindeks()->result();
		$data['record'] =  $this->M_pengindeks->get_kode_pengindeks($id)->row_array();
		$this->load->view('v_edit_pengindeks', $data);
	}

	public function update_jp() //update data pengindeks
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

	public function delete_jp($id)
	{
		$this->db->where('kode_jp', $id);
		$this->db->delete('jurnal_pengindeks');
		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-jurnal');
	}

	public function delete_jp_pengindeks($id)
	{
		$this->db->where('kode_jp', $id);
		$this->db->delete('jurnal_pengindeks');
		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-pengindeks');
	}
}
