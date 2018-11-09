<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function my_theme($url,$data)
	{
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view($url,$data);
		$this->load->view('template/footer',$data);
	}
}
