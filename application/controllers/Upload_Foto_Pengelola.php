<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload_Foto_Pengelola extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_users');
		$this->load->model('M_auth');
		$this->load->helper('url', 'form');
		if ($this->session->userdata('permission') != "pengelola") {
			redirect('cekpermission');
		}
	}
	public function index()
	{
		// var_dump($this->session->userdata('foto'));
		// die();
		$this->load->view('permission/pengelola/v_upload_photo');
	}

	public function aksi_upload()
	{
		$config['upload_path']          = './foto/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10240;
		$config['overwrite']			= TRUE;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('filefoto')) {
			$upload_data = $this->upload->data();

			$id = $this->session->userdata('username');
			$data = array(
				'foto' => $file_name = $upload_data['file_name']
			);

			$this->M_users->update_foto($id, $data, 'pengguna');

			$this->M_auth->setulangFoto();
			// $sambung = $this->M_auth->auth_check("pengguna",$tes);
			$data_session = array(
				'foto' => $file_name = $upload_data['file_name'],
			);

			$this->session->set_userdata($data_session);

			$this->session->set_flashdata('successUpload', 'ok');
			redirect('Upload_Foto_Pengelola');
		} else {
			$this->session->set_flashdata('errorUpload', 'ok');
			redirect('Upload_Foto_Pengelola');
		}
	}
}
