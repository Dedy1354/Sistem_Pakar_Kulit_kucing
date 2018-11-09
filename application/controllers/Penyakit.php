<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');

		if ($this->session->userdata("LEVEL_USER")!='admin') {
			redirect("Login");
		}
	}
	
	public function index(){
		$this->load->model("Admin_model");
		$data['list_penyakit'] = $this->Admin_model->data_penyakit();
		$this->load->view("administrator/penyakit/penyakit_form",$data);
	}

	public function add_penyakit(){
		$this->load->model("Admin_model");
		$data['tipe'] = "Add";
		if(isset($_POST['tombol_submit'])){
			$this->Admin_model->simpan_penyakit($_POST);
			redirect("Penyakit");
		}
		$this->load->view("administrator/penyakit/penyakit_add",$data);
	}

	
	public function edit_penyakit($KODE_PENYAKIT){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update_penyakit($_POST,$KODE_PENYAKIT,$KODE_GEJALA);
			redirect('Penyakit');
		}
		$data['default'] = $this->Admin_model->get_default_penyakit($KODE_PENYAKIT);
		
		$this->load->view("administrator/penyakit/penyakit_add",$data);
	}
	public function delete_penyakit($KODE_PENYAKIT){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus_penyakit($KODE_PENYAKIT);
		redirect('Penyakit');
	}
}
