<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
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
			redirect("Admin");
		}
		$this->load->view("administrator/user/user_add",$data);
	}

	public function edit($KODE_USER){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update($_POST, $KODE_USER);
			redirect('Admin');
		}
		$data['default'] = $this->Admin_model->get_default($ID);

		$this->load->view("administrator/user/user_add",$data);
	}
	public function delete($KODE_USER){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus($ID);
		redirect('Admin');
	}

	//------------------------------------------------------------kucing//
	public function kucing(){
		$this->load->model("Admin_model");
		$data['list_kucing'] = $this->Admin_model->data_kucing();
		$this->load->view("administrator/kucing/kucing_form",$data);
	}

	public function add_kucing(){
		$this->load->model("Admin_model");
		$data['tipe'] = "Add";
		if(isset($_POST['tombol_submit'])){
			$this->Admin_model->simpan_kucing($_POST);
			redirect("Admin/kucing");
		}
		$this->load->view("administrator/kucing/kucing_add",$data);
	}

	public function edit_kucing($KODE_KUCING){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update_kucing($_POST, $KODE_KUCING);
			redirect('Admin/kucing');
		}
		$data['default'] = $this->Admin_model->get_default_kucing($KODE_KUCING);

		$this->load->view("administrator/kucing/kucing_add",$data);
	}
	public function delete_kucing($KODE_KUCING){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus_kucing($KODE_KUCING);
		redirect('Admin/kucing');
	}
	//------------------------------------------------------------penyakit//
	public function penyakit(){
		$this->load->model("Admin_model");
		$data['list_penyakit'] = $this->Admin_model->data_penyakit();
		$this->load->view("administrator/penyakit/penyakit_form",$data);
	}

	public function add_penyakit(){
		$this->load->model("Admin_model");
		$data['tipe'] = "Add";
		if(isset($_POST['tombol_submit'])){
			$this->Admin_model->simpan_penyakit($_POST);
			redirect("Admin/gejala");
		}
		$this->load->view("administrator/penyakit/penyakit_add",$data);
	}

	
	public function edit_penyakit($KODE_PENYAKIT){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update_penyakit($_POST,$KODE_PENYAKIT,$KODE_GEJALA);
			redirect('Admin/penyakit');
		}
		$data['tampil_gejala'] = $this->Admin_model->ambil_gejala();
		$data['default'] = $this->Admin_model->get_default_penyakit($KODE_PENYAKIT);
		
		$this->load->view("administrator/penyakit/penyakit_add",$data);
	}
	public function delete_penyakit($KODE_PENYAKIT){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus_penyakit($KODE_PENYAKIT);
		redirect('Admin/penyakit');
	}
	//------------------------------------------------------------gejala//
	public function gejala(){
		$this->load->model("Admin_model");
		$data['list_gejala'] = $this->Admin_model->data_gejala();
		$this->load->view("administrator/gejala/gejala_form",$data);
	}

	public function add_gejala(){
		$this->load->model("Admin_model");
		$data['tipe'] = "Add";
		if(isset($_POST['tombol_submit'])){
			$this->Admin_model->simpan_gejala($_POST);
			redirect("Admin/gejala");
		}
		$this->load->view("administrator/gejala/gejala_add",$data);
	}

	public function edit_gejala($KODE_GEJALA){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update_gejala($_POST, $KODE_GEJALA);
			redirect('Admin/gejala');
		}
        $data['tampil_penyakit'] = $this->Admin_model->ambil_penyakit();
		$data['default'] = $this->Admin_model->get_default_gejala($KODE_GEJALA);

		$this->load->view("administrator/gejala/gejala_add",$data);
	}
	public function delete_gejala($KODE_GEJALA){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus_gejala($KODE_GEJALA);
		redirect('Admin/gejala');
	}
	//------------------------------------------------------------DIAGNOSIS//
	public function diagnosis(){
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
			redirect('Admin/diagnosis');
		}
        $data['tampil_penyakit'] = $this->Admin_model->ambil_penyakit();
        $data['tampil_kucing'] = $this->Admin_model->ambil_kucing();
		$data['default'] = $this->Admin_model->get_default_diagnosis($KODE_DIAGNOSIS);

		$this->load->view("administrator/diagnosis/diagnosis_add",$data);
	}
	public function delete_diagnosis($KODE_DIAGNOSIS){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus_diagnosis($KODE_DIAGNOSIS);
		redirect('Admin/diagnosis');
	}
	//------------------------------------------------------------solusi//
	public function solusi(){
		$this->load->model("Admin_model");
		$data['list_solusi'] = $this->Admin_model->data_solusi();
		$this->load->view("administrator/solusi/solusi_form",$data);
	}

	public function add_solusi(){
		$this->load->model("Admin_model");
		$data['tipe'] = "Add";
		if(isset($_POST['tombol_submit'])){
			$this->Admin_model->simpan_solusi($_POST);
			redirect("Admin/solusi");
		}
        $data['tampil_penyakit'] = $this->Admin_model->ambil_penyakit();
        $data['tampil_kucing'] = $this->Admin_model->ambil_kucing();
		$this->load->view("administrator/solusi/solusi_add",$data);
	}

	public function edit_solusi($KODE_SOLUSI){
		$this->load->model("Admin_model");
		$data['tipe'] = "Edit";
		if (isset($_POST['tombol_submit'])) {
			$this->Admin_model->update_solusi($_POST, $KODE_SOLUSI);
			redirect('Admin/solusi');
		}
        $data['tampil_penyakit'] = $this->Admin_model->ambil_penyakit();
        $data['tampil_kucing'] = $this->Admin_model->ambil_kucing();
		$data['default'] = $this->Admin_model->get_default_solusi($KODE_SOLUSI);

		$this->load->view("administrator/solusi/solusi_add",$data);
	}
	public function delete_solusi($KODE_SOLUSI){
		$this->load->model("Admin_model");
		$this->Admin_model->hapus_solusi($KODE_SOLUSI);
		redirect('Admin/solusi');
	}

}
?>
