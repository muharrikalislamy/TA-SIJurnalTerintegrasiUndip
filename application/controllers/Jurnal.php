<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(['M_jurnal', 'M_portal', 'M_fakultas', 'M_departemen', 'M_lab', 'M_lembaga', 'M_js',  'M_home']);
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index() //halaman awal jurnal
	{
		$data['jurnal'] = $this->M_jurnal->ambil_jurnal();
		$this->load->view('v_jurnal', $data);
	}

	public function jurnal_tinggi() //halaman awal jurnal
	{
		$data['jurnaltinggi'] = $this->M_home->get_jurnaltinggi();
		$this->load->view('v_jurnaltinggi', $data);
	}

	public function jurnal_doaj() //halaman awal jurnal
	{
		$data['jurnaldoaj'] = $this->M_home->get_jurnaldoaj();
		$this->load->view('v_jurnaldoaj', $data);
	}

	public function jurnal_belumakre() //halaman awal jurnal
	{
		$data['jurnalbelumakre'] = $this->M_jurnal->ambil_jurnal_belumakreditasi();
		$this->load->view('v_jurnalbelumakreditasi', $data);
	}

	public function add_jurnal() //tambah data jurnal
	{
		$data['portal'] = $this->M_portal->ambil_portal();
		$data['pengelola'] = $this->M_jurnal->ambil_data_pengelola();
		$data['fakultas'] = $this->M_fakultas->ambil_fakultas();
		$data['departemen'] = $this->M_departemen->ambil_departemen();
		$data['lab'] = $this->M_lab->ambil_lab();
		$data['lembaga'] = $this->M_lembaga->ambil_lembaga();
		$this->form_validation->set_rules('judul', 'warningrakkanggo', 'is_unique[jurnal.judul]');

		if (!empty($this->input->post('judul'))) {
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('duplicateNama', 'ok');
				redirect('data-jurnal/add');
			}
			if (
				!empty($this->input->post('judul'))
				// && !empty($this->input->post('singkatan'))
				// && !empty($this->input->post('nomorjurnal'))
				// && !empty($this->input->post('fakultas'))
				// && !empty($this->input->post('departemen'))
				// && !empty($this->input->post('lab'))
				// && !empty($this->input->post('lembaga'))
				// // && !empty($this->input->post('portal'))
				// // && !empty($this->input->post('urlportal'))
				// // && !empty($this->input->post('sponsor'))
				// // && !empty($this->input->post('pengelola'))
				// // && !empty($this->input->post('pissn'))
				// // && !empty($this->input->post('eissn'))
				// // && !empty($this->input->post('english'))
				// // && !empty($this->input->post('mpgundip'))
				// // && !empty($this->input->post('doi'))
				// // && !empty($this->input->post('thnmulai'))
				// // && !empty($this->input->post('blnterbit'))
				// // && !empty($this->input->post('terbitakhir'))
				// // && !empty($this->input->post('noterakhir'))

			) {
				if ($this->M_jurnal->add_jurnal(array(
					'judul' => $this->input->post('judul'),
					'singkatan' => $this->input->post('singkatan'),
					'nomor_jurnal' => $this->input->post('nomorjurnal'),
					'nama_fakultas' => $this->input->post('fakultas'),
					'nama_departemen' => $this->input->post('departemen'),
					'nama_lab' => $this->input->post('lab'),
					'nama_lembaga' => $this->input->post('lembaga'),
					'nama_portal' => $this->input->post('portal'),
					'url' => $this->input->post('urlportal'),
					'sponsor' => $this->input->post('sponsor'),
					'id_user' => $this->input->post('pengelola'),
					'p_issn' => $this->input->post('pissn'),
					'e_issn' => $this->input->post('eissn'),
					'english' => $this->input->post('english'),
					'mpgundip' => $this->input->post('mpgundip'),
					'doi' => $this->input->post('doi'),
					'tahun_mulai' => $this->input->post('thnmulai'),
					'bln_terbit' => implode(",", $this->input->post('blnterbit')),
					'terbit_terakhir' => $this->input->post('terbitakhir'),
					'no_terakhir' => $this->input->post('noterakhir'),
				))) {
					$this->session->set_flashdata('successSave', 'ok');
					redirect('data-jurnal');
				}
			}
		}
		$this->load->view('v_add_jurnal', $data);
	}

	public function edit_jurnal() //edit data jurnal
	{
		$id =  $this->uri->segment(3);
		$data['jurnal'] =  $this->M_jurnal->tampil_data_jurnal()->result();
		$data['record'] =  $this->M_jurnal->get_kode_jurnal($id)->row_array();
		$data['portal'] = $this->M_jurnal->ambil_portal();
		$data['pengelola'] = $this->M_jurnal->ambil_data_pengelola();
		$data['fakultas'] = $this->M_fakultas->ambil_fakultas();
		$data['departemen'] = $this->M_departemen->ambil_departemen();
		$data['lab'] = $this->M_lab->ambil_lab();
		$data['lembaga'] = $this->M_lembaga->ambil_lembaga();
		$this->load->view('v_edit_jurnal', $data);
	}

	public function update_jurnal() //update data jurnal
	{
		$kode = $this->input->post('kode');
		$data = array(
			'judul' => $this->input->post('judul'),
			'singkatan' => $this->input->post('singkatan'),
			'nomor_jurnal' => $this->input->post('nomorjurnal'),
			'nama_fakultas' => $this->input->post('fakultas'),
			'nama_departemen' => $this->input->post('departemen'),
			'nama_lab' => $this->input->post('lab'),
			'nama_lembaga' => $this->input->post('lembaga'),
			'nama_portal' => $this->input->post('portal'),
			'url' => $this->input->post('urlportal'),
			'sponsor' => $this->input->post('sponsor'),
			'id_user' => $this->input->post('pengelola'),
			'p_issn' => $this->input->post('pissn'),
			'e_issn' => $this->input->post('eissn'),
			'english' => $this->input->post('english'),
			'mpgundip' => $this->input->post('mpgundip'),
			'doi' => $this->input->post('doi'),
			'tahun_mulai' => $this->input->post('thnmulai'),
			'bln_terbit' => implode(",", $this->input->post('blnterbit')),
			'terbit_terakhir' => $this->input->post('terbitakhir'),
			'no_terakhir' => $this->input->post('noterakhir'),
		);

		$this->M_jurnal->update_jurnal($data, $kode);
		$this->session->set_flashdata('successUpdate', 'ok');
		redirect('data-jurnal');
	}

	public function delete_jurnal($id)
	{
		$this->M_jurnal->delete_jurnal($id);
		$this->session->set_flashdata('successDelete', 'ok');
		redirect('data-jurnal');
	}
}
