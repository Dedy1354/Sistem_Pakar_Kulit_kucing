<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');

			if ($this->session->userdata("LEVEL_USER")!='admin') {
			redirect("Login");
		}
	}
	
	public function index(){
		$this->load->model("Admin_model");
		$data['list_user'] = $this->Admin_model->data_user();
		$this->load->view("administrator/user/user_form",$data);
	}

	public function add(){
		$this->load->model("Admin_model");
		$data['tipe'] = "Add";
		if(isset($_POST['tombol_submit'])){
			$this->Admin_model->simpan($_POST);
			redirect("User");
		}
		$this->load->view("administrator/user/user_add",$data);
	}

	public function edit($ID){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update($_POST, $ID);
			redirect('User');
		}
		$data['default'] = $this->Admin_model->get_default($ID);

		$this->load->view("administrator/user/user_add",$data);
	}
	public function delete($ID){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus($ID);
		redirect('User');
	}
}
