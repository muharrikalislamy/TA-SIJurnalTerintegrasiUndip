<?php

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->load->helper('url');

		//TENDANG USER YG UDAH LOGIN KE HOME YANG SEHARUSNYA
		switch ($this->session->userdata('permission')) {
			case "admin":
				redirect("home-admin");
				break;
			case "evaluator":
				redirect("home-evaluator");
				break;
			case "pengelola":
				redirect("home-pengelola");
				break;
			case "pimpinan":
				redirect("home-pimpinan");
				break;
			default:
				base_url();
		}
	}

	public function index()
	{
		//echo "hello";
		$this->load->view('v_login');
	}

	public function auth_process()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'password' => md5($password)
		);

		// $tes = array(
		// 	'username' => $username,
		// );

		$cek = $this->M_auth->auth_check("pengguna", $where);
		// $sambung = $this->M_auth->auth_check("pengguna",$tes);

		if ($cek->num_rows() > 0) {
			$data_session = array(
				// 'username' => $username,
				// 'status' => "login",

				'permission' => $cek->row(0)->permission,
				'nama_user' => $cek->row(0)->nama_user,
				'foto' => $cek->row(0)->foto,
				'id_user' => $cek->row(0)->id_user,

			);

			$this->db->where('username', $username);
			$this->session->set_userdata($data_session);

			if ($this->session->userdata('permission') === "admin") {
				redirect("home-admin");
			} else if ($this->session->userdata('permission') === "evaluator") {
				redirect("home-evaluator");
			} else if ($this->session->userdata('permission') === "pengelola") {
				redirect("home-pengelola");
			} else if ($this->session->userdata('permission') === "pimpinan") {
				redirect("home-pimpinan");
			}
		} else {
			$this->session->set_flashdata('wrongAuth', 'ok');
			$this->index();
		}
	}

	public function cekpermission()
	{
		if ($this->session->userdata('permission') === "admin") {
			redirect("home-admin");
		} else if ($this->session->userdata('permission') === "evaluator") {
			redirect("home-evaluator");
		} else if ($this->session->userdata('permission') === "pengelola") {
			redirect("home-pengelola");
		} else if ($this->session->userdata('permission') === "pimpinan") {
			redirect("home-pimpinan");
		} else {
			redirect("auth");
		}
	}
}
