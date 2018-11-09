<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laman extends CI_Controller{

	function __construct(){		
		parent::__construct();
		$this->load->model('Laman_model');
	}

	public function panduan(){
		$this->load->view("laman/panduan");
	}
	public function pertama(){
		$this->load->view("laman/pertanyaan/pertama");
	}
	public function kedua(){
		$this->load->view("laman/pertanyaan/kedua");
	}
	public function ketiga(){
		$this->load->view("laman/pertanyaan/ketiga");
	}
	public function keempat(){
		$this->load->view("laman/pertanyaan/keempat");
	}
	public function kelima(){
		$this->load->view("laman/pertanyaan/kelima");
	}
	public function keenam(){
		$this->load->view("laman/pertanyaan/keenam");
	}
	public function ketujuh(){
		$this->load->view("laman/pertanyaan/ketujuh");
	}
	public function kedelapan(){
		$this->load->view("laman/pertanyaan/kedelapan");
	}
	public function kesembilan(){
		$this->load->view("laman/pertanyaan/kesembilan");
	}
	public function kesepuluh(){
		$this->load->view("laman/pertanyaan/kesepuluh");
	}
	public function kesebelas(){
		$this->load->view("laman/pertanyaan/kesebelas");
	}
	public function keduabelas(){
		$this->load->view("laman/pertanyaan/keduabelas");
	}
	public function ketigabelas(){
		$this->load->view("laman/pertanyaan/ketigabelas");
	}
	public function kelimabelas(){
		$this->load->view("laman/pertanyaan/kelimabelas");
	}
	public function keenambelas(){
		$this->load->view("laman/pertanyaan/keenambelas");
	}
	public function ketujuhbelas(){
		$this->load->view("laman/pertanyaan/ketujuhbelas");
	}

	public function tambah_diagnosa()
	{
		$data['kucing'] = $this->Laman_model->getKucing();
		$this->load->view("laman/tambah_diagnosa",$data);
	}

	public function insert_diagnosa()
	{
		$data_insert = array( //data array yang berisi dari kirimin post halaman laman/tambah_diagnosa
				'KODE_KUCING' 	=> $this->input->post('KODE_KUCING'),
				'TGL_DIAGNOSIS' => date('Y-m-d')
			);

		$data['kode_diagnosis']	= $this->Laman_model->insertDiagnosa($data_insert); //menambahkan data ke tabel diagnosa
		$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(1);
		$data['kode_gejala'] 	= 1;

		$this->load->view('laman/list_pertanyaan',$data);
	}

	public function insertAnamnesa()
	{
		$jawaban = $this->input->post('jawaban');
		$data_insert = array(
				'KODE_GEJALA' 		=> $this->input->post('KODE_GEJALA'),
				'KODE_DIAGNOSIS' 	=> $this->input->post('KODE_DIAGNOSIS'),
				'IS_TRUE' 			=> $jawaban
			);

		$saved = $this->Laman_model->insertAnamnesa($data_insert);

		$kode_gejala = $this->input->post('kode_gejala');

		if ($saved) {
			switch ($kode_gejala) {

				case '1':
					$data['kode_diagnosis']	= $this->input->post('KODE_DIAGNOSIS'); //menambahkan data ke tabel diagnosa
					$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(2);
					$data['kode_gejala'] 	= 2;

					$this->load->view('laman/list_pertanyaan',$data);
					break;

				case '2':
					if ($jawaban == '1') { //jika iya
						$data['kode_diagnosis']	= $this->input->post('KODE_DIAGNOSIS'); //menambahkan data ke tabel diagnosa
						$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(3);
						$data['kode_gejala'] 	= 3;

						$this->load->view('laman/list_pertanyaan',$data);
					} else { //jika tidak
						$data['kode_diagnosis']	= $this->input->post('KODE_DIAGNOSIS'); //menambahkan data ke tabel diagnosa
						$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(4);
						$data['kode_gejala'] 	= 4;

						$this->load->view('laman/list_pertanyaan',$data);
					}
					break;

				case '3':					
					if ($jawaban == '1') { //jika iya
						$data['kode_diagnosis']	= $this->input->post('KODE_DIAGNOSIS'); //menambahkan data ke tabel diagnosa
						$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(5);
						$data['kode_gejala'] 	= 5;

						$this->load->view('laman/list_pertanyaan',$data);
					} else { //jika tidak
						$data['kode_diagnosis']	= $this->input->post('KODE_DIAGNOSIS'); //menambahkan data ke tabel diagnosa
						$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(6);
						$data['kode_gejala'] 	= 6;

						$this->load->view('laman/list_pertanyaan',$data);
					}
					break;

				case '4':					
					$diagnosis 			= $this->input->post('KODE_DIAGNOSIS');
					$data['gejala'] 	= $this->Laman_model->getGejalaDetail($diagnosis);
					$data['penyakit']	= $this->Laman_model->getPenyakitDetail(1);

					$this->load->view('laman/analisa',$data);
					break;

				case '5':
					if ($jawaban == '1') { //jika iya
						$data['kode_diagnosis']	= $this->input->post('KODE_DIAGNOSIS'); //menambahkan data ke tabel diagnosa
						$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(7);
						$data['kode_gejala'] 	= 7;

						$this->load->view('laman/list_pertanyaan',$data);
					} else { //jika tidak
						$diagnosis 			= $this->input->post('KODE_DIAGNOSIS');
					$data['gejala'] 	= $this->Laman_model->getGejalaDetail($diagnosis);
					$data['penyakit']	= $this->Laman_model->getPenyakitDetail(1);

						$this->load->view('laman/analisa',$data);
					}
					break;

				case '6':
					$diagnosis 			= $this->input->post('KODE_DIAGNOSIS');
					$data['gejala'] 	= $this->Laman_model->getGejalaDetail($diagnosis);
					$data['penyakit']	= $this->Laman_model->getPenyakitDetail(1);

					$this->load->view('laman/analisa',$data);
					break;

				case '7':
					if ($jawaban == '1') { //jika iya
						$data['kode_diagnosis']	= $this->input->post('KODE_DIAGNOSIS'); //menambahkan data ke tabel diagnosa
						$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(8);
						$data['kode_gejala'] 	= 8;

						$this->load->view('laman/list_pertanyaan',$data);
					} else { //jika tidak
						$diagnosis 			= $this->input->post('KODE_DIAGNOSIS');
					$data['gejala'] 	= $this->Laman_model->getGejalaDetail($diagnosis);
					$data['penyakit']	= $this->Laman_model->getPenyakitDetail(1);

						$this->load->view('laman/analisa',$data);
					}
					break;

				case '8':
					if ($jawaban == '1') { //jika iya
						$diagnosis 			= $this->input->post('KODE_DIAGNOSIS');
					$data['gejala'] 	= $this->Laman_model->getGejalaDetail($diagnosis);
					$data['penyakit']	= $this->Laman_model->getPenyakitDetail(2);

						$this->load->view('laman/analisa',$data);
					} else { //jika tidak
						$data['kode_diagnosis']	= $this->input->post('KODE_DIAGNOSIS'); //menambahkan data ke tabel diagnosa
						$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(9);
						$data['kode_gejala'] 	= 9;

						$this->load->view('laman/list_pertanyaan',$data);
					}
					break;

				case '9':
					if ($jawaban == '1') { //jika iya
						$data['kode_diagnosis']	= $this->input->post('KODE_DIAGNOSIS'); //menambahkan data ke tabel diagnosa
						$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(10);
						$data['kode_gejala'] 	= 10;

						$this->load->view('laman/list_pertanyaan',$data);
					} else { //jika tidak
						$data['keterangan']		= 'M';

						$this->load->view('laman/analisa',$data);
					}
					break;
				case '10':
					if ($jawaban == '1') { //jika iya
						$diagnosis 			= $this->input->post('KODE_DIAGNOSIS');
					$data['gejala'] 	= $this->Laman_model->getGejalaDetail($diagnosis);
					$data['penyakit']	= $this->Laman_model->getPenyakitDetail(3);

						$this->load->view('laman/analisa',$data);
					} else { //jika tidak
						$data['kode_diagnosis']	= $this->input->post('KODE_DIAGNOSIS'); //menambahkan data ke tabel diagnosa
						$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(11);
						$data['kode_gejala'] 	= 11;

						$this->load->view('laman/list_pertanyaan',$data);
					}
					break;

				case '11':
					if ($jawaban == '1') { //jika iya
						$data['kode_diagnosis']	= $this->input->post('KODE_DIAGNOSIS'); //menambahkan data ke tabel diagnosa
						$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(12);
						$data['kode_gejala'] 	= 12;

						$this->load->view('laman/list_pertanyaan',$data);
					} else { //jika tidak
						$diagnosis 			= $this->input->post('KODE_DIAGNOSIS');
					$data['gejala'] 	= $this->Laman_model->getGejalaDetail($diagnosis);
					$data['penyakit']	= $this->Laman_model->getPenyakitDetail(4);
						$this->load->view('laman/analisa',$data);
					}
					break;

				case '12':
					if ($jawaban == '1') { //jika iya
						$data['kode_diagnosis']	= $this->input->post('KODE_DIAGNOSIS'); //menambahkan data ke tabel diagnosa
						$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(13);
						$data['kode_gejala'] 	= 13;

						$this->load->view('laman/list_pertanyaan',$data);
					} else { //jika tidak
						$data['keterangan']		= 'IES';
						$diagnosis 			= $this->input->post('KODE_DIAGNOSIS');
					$data['gejala'] 	= $this->Laman_model->getGejalaDetail($diagnosis);
					$data['penyakit']	= $this->Laman_model->getPenyakitDetail(4);

						$this->load->view('laman/analisa',$data);
					}
					break;

				case '13':
					if ($jawaban == '1') { //jika iya
						$data['kode_diagnosis']	= $this->input->post('KODE_DIAGNOSIS'); //menambahkan data ke tabel diagnosa
						$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(14);
						$data['kode_gejala'] 	= 14;

						$this->load->view('laman/list_pertanyaan',$data);
					} else { //jika tidak
						$diagnosis 			= $this->input->post('KODE_DIAGNOSIS');
					$data['gejala'] 	= $this->Laman_model->getGejalaDetail($diagnosis);
					$data['penyakit']	= $this->Laman_model->getPenyakitDetail(4);

						$this->load->view('laman/analisa',$data);
					}
					break;

				case '14':
					if ($jawaban == '1') { //jika iya
						$data['keterangan']		= 'DA';
						$diagnosis 			= $this->input->post('KODE_DIAGNOSIS');
						$data['gejala'] 	= $this->Laman_model->getGejalaDetail($diagnosis);
						$data['penyakit']	= $this->Laman_model->getPenyakitDetail(6);

						$this->load->view('laman/analisa',$data);
					} else { //jika tidak
						$data['kode_diagnosis']	= $this->input->post('KODE_DIAGNOSIS'); //menambahkan data ke tabel diagnosa
						$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(15);
						$data['kode_gejala'] 	= 15;

						$this->load->view('laman/list_pertanyaan',$data);
					}
					break;

				case '15':
					if ($jawaban == '1') { //jika iya
						$data['keterangan']		= 'AC';
						$diagnosis 			= $this->input->post('KODE_DIAGNOSIS');
					$data['gejala'] 	= $this->Laman_model->getGejalaDetail($diagnosis);
					$data['penyakit']	= $this->Laman_model->getPenyakitDetail(7);

						$this->load->view('laman/analisa',$data);
					} else { //jika tidak
						$data['kode_diagnosis']	= $this->input->post('KODE_DIAGNOSIS'); //menambahkan data ke tabel diagnosa
						$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(16);
						$data['kode_gejala'] 	= 16;

						$this->load->view('laman/list_pertanyaan',$data);
					}
					break;

				case '16':
					if ($jawaban == '1') { //jika iya
						$data['keterangan']		= 'AC';
						$diagnosis 			= $this->input->post('KODE_DIAGNOSIS');
					$data['gejala'] 	= $this->Laman_model->getGejalaDetail($diagnosis);
					$data['penyakit']	= $this->Laman_model->getPenyakitDetail(7);

						$this->load->view('laman/analisa',$data);
					} else { //jika tidak
						$data['keterangan']		= 'IE';
						$diagnosis 			= $this->input->post('KODE_DIAGNOSIS');
					$data['gejala'] 	= $this->Laman_model->getGejalaDetail($diagnosis);
					$data['penyakit']	= $this->Laman_model->getPenyakitDetail(5);

						$this->load->view('laman/analisa',$data);
					}
					break;
				
				default:
					# code...
					break;
			}
		} else {
			# code...
		}
		
	}

	public function cek()
	{
		$data['pertanyaan'] 	= $this->Laman_model->getPertanyaan(1);
		var_dump($data['pertanyaan']);
	}

}