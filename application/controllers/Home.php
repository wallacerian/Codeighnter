<?php

defined('BASEPATH') or exit('No direct script acess allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$this->load->view('partes/header');
		$this->load->view('home/index');
		$this->load->view('partes/footer');
	}
}
