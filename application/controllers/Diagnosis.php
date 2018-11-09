<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosis extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');

		if ($this->session->userdata("LEVEL_USER")!='admin') {
			redirect("Login");
		}
	}
	
	public function index(){
		$this->load->model("Admin_model");
		$data['list_diagnosis'] = $this->Admin_model->data_diagnosis();
		$this->load->view("administrator/diagnosis/diagnosis_form",$data);
	}

	public function add_diagnosis()
	{
		$data['tipe'] = 'Add';
		$data['tampil_penyakit'] = $this->Admin_model->ambil_penyakit();
        $data['tampil_kucing'] = $this->Admin_model->ambil_kucing();
		$this->load->view("administrator/diagnosis/diagnosis_add",$data);
	}

	public function insert_diagnosis()
	{
		$data_insert = array(
				'KODE_KUCING' => $this->input->post('KODE_KUCING'),
				'TGL_DIAGNOSIS' => $this->input->post('TGL_DIAGNOSIS')
			);

		$kode_diagnosis = $this->Admin_model->insert_diagnosis($data_insert); //mengambil kode dianosis yang baru saja diinputkan

		$data['KODE_DIAGNOSIS'] = $kode_diagnosis;
		
		$this->load->view('administrator/diagnosis/pertanyaan',$data); //membuka view untuk pertanyaan
	}

	// public function add_diagnosis(){
	// 	$this->load->model("Admin_model");
	// 	$data['tipe'] = "Add";
	// 	if(isset($_POST['tombol_submit'])){
	// 		$saved = $this->Admin_model->simpan_diagnosis($_POST);
	// 		if ($saved != '') {
	// 			$data['KODE_DIAGNOSIS'] = $saved;
	// 			$this->load->view('administrator/diagnosis/pertanyaan',$data);
	// 		// redirect("Admin/diagnosis");
	// 		}
	// 	}
 //        $data['tampil_penyakit'] = $this->Admin_model->ambil_penyakit();
 //        $data['tampil_kucing'] = $this->Admin_model->ambil_kucing();
	// 	$this->load->view("administrator/diagnosis/diagnosis_add",$data);
	// }

	public function edit_diagnosis($KODE_DIAGNOSIS){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update_diagnosis($_POST, $KODE_DIAGNOSIS);
			redirect('Diagnosis');
		}
        $data['tampil_penyakit'] = $this->Admin_model->ambil_penyakit();
        $data['tampil_kucing'] = $this->Admin_model->ambil_kucing();
		$data['default'] = $this->Admin_model->get_default_diagnosis($KODE_DIAGNOSIS);

		$this->load->view("administrator/diagnosis/diagnosis_add",$data);
	}
	public function delete_diagnosis($KODE_DIAGNOSIS){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus_diagnosis($KODE_DIAGNOSIS);
		redirect('Diagnosis');
	}
}
