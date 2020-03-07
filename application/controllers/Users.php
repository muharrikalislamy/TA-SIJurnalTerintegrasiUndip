<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_users');
		$this->load->model('M_auth');
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "admin") {
			redirect('cekpermission');
		}
	}

	public function index()
	{

		$data['auth'] = $this->M_users->tampil_data()->result();
		$this->load->view('v_users', $data);
	}

	public function tes()
	{
		$id = $this->session->userdata('username');
		$data['recordpengguna'] =  $this->M_users->get_one_pengguna($id)->row_array();
		$data['recordauth'] =  $this->M_users->get_one_auth($id)->row_array();
	}

	public function add_user()
	{
		$this->load->view('v_add_user');
	}

	public function submit_user()
	{
		$this->form_validation->set_rules('inputusername', 'warningrakkanggo', 'is_unique[pengguna.username]');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('duplicateUsername', 'ok');
			redirect('user-data/add');
		} else {
			$atad = array(
				'nama_user' => $this->input->post('inputnama'),
				'username' => $this->input->post('inputusername'),
				'permission' => $this->input->post('inputpermission'),
				'password' => md5($this->input->post('inputpassword')),
			);

			// $this->M_users->input_data_auth('auth',$data);
			$this->M_users->input_data_pengguna('pengguna', $atad);

			$this->session->set_flashdata('successSave', 'ok');
			redirect('user-data');
		}
	}

	public function update_user()
	{
		$id = $this->input->post('inputiduser');


		$atad = array(
			'username' => $this->input->post('inputusername'),
			'nama_user' => $this->input->post('inputnama'),
			'permission' => $this->input->post('inputpermission'),

		);

		$this->M_users->update_pengguna($atad, $id);


		$this->session->set_flashdata('successSave', 'ok');
		redirect('user-data');
	}

	public function update_password()
	{
		$id = $this->input->post('inputiduser');


		$atad = array(
			'password' => md5($this->input->post('inputpassword')),
		);

		$this->M_users->update_pengguna($atad, $id);


		$this->session->set_flashdata('successSave', 'ok');
		redirect('home-admin');
	}

	public function update_username()
	{

		$this->form_validation->set_rules('inputusername', 'warningrakkanggo', 'is_unique[pengguna.username]');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('duplicateUsername', 'ok');
			redirect('home-admin');
		} else {
			$id = $this->input->post('inputiduser');


			$atad = array(
				'username' => $this->input->post('inputusername'),
			);

			$this->M_users->update_pengguna($atad, $id);


			$this->session->set_flashdata('successSave', 'ok');
			redirect('home-admin');
		}
	}

	public function update_user_session()
	{
		$id = $this->input->post('inputiduser');

		$atad = array(
			'username' => $this->input->post('inputusername'),
			'nama_user' => $this->input->post('inputnama'),
			'permission' => $this->input->post('inputpermission'),

		);

		$this->M_users->update_pengguna($atad, $id);

		$this->M_auth->setulangNama();
		// $sambung = $this->M_auth->auth_check("pengguna",$tes);
		$data_session = array(
			'nama_user' => $this->input->post('inputnama'),
		);

		$this->session->set_userdata($data_session);

		$this->session->set_flashdata('successSave', 'ok');
		redirect('home-admin');
	}

	function edit_user()
	{
		$id =  $this->uri->segment(3);
		$data['recordpengguna'] =  $this->M_users->get_one_pengguna($id)->row_array();
		// $data['recordauth']=  $this->M_users->get_one_auth($id)->row_array();
		$this->load->view('v_edit_user', $data);
	}

	function edit_username()
	{
		$id =  $this->uri->segment(3);
		$data['recordpengguna'] =  $this->M_users->get_one_pengguna($id)->row_array();
		// $data['recordauth']=  $this->M_users->get_one_auth($id)->row_array();
		$this->load->view('v_edit_username', $data);
	}

	function edit_password()
	{
		$id = $this->uri->segment(3);
		$data['recordpengguna'] =  $this->M_users->get_one_pengguna($id)->row_array();

		$this->load->view('v_edit_password', $data);
	}

	function edit_user_session()
	{
		$id =  $this->uri->segment(3);
		$data['recordpengguna'] =  $this->M_users->get_one_pengguna($id)->row_array();
		$this->load->view('v_edit_user_session', $data);
	}

	public function delete_user()
	{
		$del = $this->uri->segment(3);
		// $query= $this->db->query('DELETE FROM auth WHERE username="'.$del.'"');
		$query = $this->db->query('DELETE FROM pengguna WHERE id_user="' . $del . '"');


		$this->session->set_flashdata('successDelete', 'ok');
		redirect('user-data');
	}
}
