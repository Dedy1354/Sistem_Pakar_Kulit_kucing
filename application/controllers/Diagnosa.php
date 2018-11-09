<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_diagnosa');
	}

	public function index()
	{
		# code...
	}
}