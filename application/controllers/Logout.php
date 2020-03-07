<?php

class logout extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
	}
	public function logout()
	{
		$this->M_auth->destroySession();
		redirect(site_url('auth'));
	}
}
