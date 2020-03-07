<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Vardump extends CI_Controller{
 
	function __construct(){
	parent::__construct();
	}

 
	function index(){
		var_dump($this->session->userdata('id_auth'));
		var_dump($this->session->userdata('id_user'));

		var_dump($this->session->userdata('username'));
		var_dump($this->session->userdata('nama_user'));
		var_dump($this->session->userdata('foto'));

		die();	
	}

}