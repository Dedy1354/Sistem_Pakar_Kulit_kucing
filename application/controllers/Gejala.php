<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');

		if ($this->session->userdata("LEVEL_USER")!='admin') {
			redirect("Login");
		}
	}
	
	public function index(){
		$this->load->model("Admin_model");
		$data['list_gejala'] = $this->Admin_model->data_gejala();
		$this->load->view("administrator/gejala/gejala_form",$data);
	}

	public function add_gejala(){
		$this->load->model("Admin_model");
		$data['tipe'] = "Add";
		if(isset($_POST['tombol_submit'])){
			$this->Admin_model->simpan_gejala($_POST);
			redirect("Gejala");
		}
		$this->load->view("administrator/gejala/gejala_add",$data);
	}

	public function edit_gejala($KODE_GEJALA){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update_gejala($_POST, $KODE_GEJALA);
			redirect('Gejala');
		}
        $data['tampil_penyakit'] = $this->Admin_model->ambil_penyakit();
		$data['default'] = $this->Admin_model->get_default_gejala($KODE_GEJALA);

		$this->load->view("administrator/gejala/gejala_add",$data);
	}
	public function delete_gejala($KODE_GEJALA){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus_gejala($KODE_GEJALA);
		redirect('Gejala');
	}
}
