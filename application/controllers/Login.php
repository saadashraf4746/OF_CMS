<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('is_admin_logged_in'))
		{
			redirect(base_url('/'));
		}

	}

	public function index()
	{
		$this->load->view('login-page');
	}
}
