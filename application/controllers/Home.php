<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
    parent::__construct();
  }

	public function index()
	{
		$this->load->view('principal/header');
		$this->load->view('principal/nav');
		$this->load->view('principal/scripts');
		$this->load->view('principal/footer');
	}
}
