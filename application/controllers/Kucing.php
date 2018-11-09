<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kucing extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');

		if ($this->session->userdata("LEVEL_USER")!='admin') {
			redirect("Login");
		}
	}
	
	public function index(){
		$this->load->model("Admin_model");
		$data['list_kucing'] = $this->Admin_model->data_kucing();
		$this->load->view("administrator/kucing/kucing_form",$data);
	}

	public function add_kucing(){
		$this->load->model("Admin_model");
		$data['tipe'] = "Add";
		if(isset($_POST['tombol_submit'])){
			$this->Admin_model->simpan_kucing($_POST);
			redirect("Kucing");
		}
		$this->load->view("administrator/kucing/kucing_add",$data);
	}

	public function edit_kucing($KODE_KUCING){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update_kucing($_POST, $KODE_KUCING);
			redirect('Kucing');
		}
		$data['default'] = $this->Admin_model->get_default_kucing($KODE_KUCING);

		$this->load->view("administrator/kucing/kucing_add",$data);
	}
	public function delete_kucing($KODE_KUCING){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus_kucing($KODE_KUCING);
		redirect('Kucing');
	}
}
