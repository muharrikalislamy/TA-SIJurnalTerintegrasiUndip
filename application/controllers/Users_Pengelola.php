<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_Pengelola extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_users');
		$this->load->model('M_auth');
		$this->load->helper('url');
		$this->load->library('form_validation');
		if ($this->session->userdata('permission') != "pengelola") {
			redirect('cekpermission');
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

		// var_dump($data);
		// die()

		$this->M_users->update_pengguna($atad, $id);

		$this->M_auth->setulangNama();
		// $sambung = $this->M_auth->auth_check("pengguna",$tes);
		$data_session = array(
			'nama_user' => $this->input->post('inputnama'),
		);

		$this->session->set_userdata($data_session);

		$this->session->set_flashdata('successSave', 'ok');
		redirect('home-pengelola');
	}

	public function update_password()
	{
		$id = $this->input->post('inputiduser');
		//  $data = array(
		// 'username'=> $this->input->post('inputusername'),
		//  );

		$atad = array(
			'password' => md5($this->input->post('inputpassword')),
		);

		// var_dump($atad);
		// die();

		// $this->M_users->update_auth($data,$id);
		$this->M_users->update_pengguna($atad, $id);


		$this->session->set_flashdata('successSave', 'ok');
		redirect('home-pengelola');
	}

	public function update_username()
	{

		$this->form_validation->set_rules('inputusername', 'warningrakkanggo', 'is_unique[pengguna.username]');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('duplicateUsername', 'ok');
			redirect('home-pengelola');
		} else {
			$id = $this->input->post('inputiduser');
			//  $data = array(
			// 'username'=> $this->input->post('inputusername'),
			//  );

			$atad = array(
				'username' => $this->input->post('inputusername'),
			);

			// var_dump($data);
			// die()

			// $this->M_users->update_auth($data,$id);
			$this->M_users->update_pengguna($atad, $id);


			$this->session->set_flashdata('successSave', 'ok');
			redirect('home-admin');
		}
	}

	function edit_user()
	{
		$id =  $this->uri->segment(3);
		$data['recordpengguna'] =  $this->M_users->get_one_pengguna($id)->row_array();
		$this->load->view('v_edit_user_pengelola', $data);
	}

	function edit_username()
	{
		$id =  $this->uri->segment(3);
		$data['recordpengguna'] =  $this->M_users->get_one_pengguna($id)->row_array();
		// $data['recordauth']=  $this->M_users->get_one_auth($id)->row_array();
		$this->load->view('v_edit_username_pengelola', $data);
	}

	function edit_password()
	{
		$id = $this->uri->segment(3);
		$data['recordpengguna'] =  $this->M_users->get_one_pengguna($id)->row_array();

		$this->load->view('v_edit_password_pengelola', $data);
	}
}
