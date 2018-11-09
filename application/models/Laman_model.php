<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laman_model extends CI_Model{
	public function getKucing() // mengambil data kucing dari tabel KUCING
	{
		$query = $this->db->select('*') //kolom yg diambil
						->get('kucing'); //nama tabel
		return $query->result(); //mengembaikan data kucing sebnayak yang ada di database yang berupa objek
	}

	public function insertDiagnosa($data_insert)
	{
		$this->db->insert('diagnosis',$data_insert);
		if ($this->db->affected_rows()) {
			return $this->db->insert_id();
		} else {
			return 0;
		}
		
	}

	public function getPertanyaan($id)
	{
		$query = $this->db->select('*')
						->where('KODE_GEJALA',$id)
						->get('gejala'); 
		return $query->row();
	}

	public function insertAnamnesa($data)
	{
		$this->db->insert('anamnesa',$data);
		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}

	public function getGejalaDetail($id)
	{
		$sql = "SELECT 
				a.KODE_GEJALA, g.NAMA_GEJALA,
				a.IS_TRUE
				FROM anamnesa a 
				LEFT JOIN gejala g ON a.KODE_GEJALA = g.KODE_GEJALA
				WHERE a.KODE_DIAGNOSIS = ".$id;

		$query = $this->db->query($sql);

		return $query->result();
	}

	public function getPenyakitDetail($id)
	{
		$query = $this->db->select('*')
						->where('KODE_PENYAKIT',$id)
						->get('penyakit'); 
		return $query->row();
	}
}
?>