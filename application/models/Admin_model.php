<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_model extends CI_Model{
		
		public function data_user(){
			$data = $this->db->query("select * from user");
			return $data->result_array();
		}

		public function simpan($post){

		$ID= $this->db->escape($post['ID']);
		$USERNAME = $this->db->escape($post['USERNAME']);
		$PASSWORD = $this->db->escape($post['PASSWORD']);
		$LEVEL_USER = $this->db->escape($post['LEVEL_USER']);

		$sql = $this->db->query("INSERT INTO user VALUES ($ID,$USERNAME, $PASSWORD,$LEVEL_USER)");
		if($sql)
			return true;
		return false;
		}

		public function get_default($ID){
			$sql = $this->db->query("select * from user where ID = ".intval($ID));
			if($sql->num_rows() > 0)
				return $sql->row_array();
			return false;
		}

		public function update($post, $ID){
		$USERNAME = $this->db->escape($post['USERNAME']);
		$PASSWORD = $this->db->escape($post['PASSWORD']);
		$LEVEL_USER = $this->db->escape($post['LEVEL_USER']);

		$sql =  $this->db->query("UPDATE user SET ID=$ID, USERNAME=$USERNAME, PASSWORD=$PASSWORD, LEVEL_USER=$LEVEL_USER WHERE ID = ".intval($ID));
		return true;
		}

		public function hapus($ID){
			$sql = $this->db->query("DELETE FROM user WHERE ID =" .intval($ID));
		}

		//---------------------kucing--------------------------------------------------------//
		public function data_kucing(){
			$data = $this->db->query("select * from kucing");
			return $data->result_array();
		}

		public function simpan_kucing($post){
		$KODE_KUCING = $this->db->escape($post['KODE_KUCING']);
		$NAMA_KUCING = $this->db->escape($post['NAMA_KUCING']);
		$sql = $this->db->query("INSERT INTO kucing VALUES ($KODE_KUCING, $NAMA_KUCING)");
		if($sql)
			return true;
		return false;
		}

		public function get_default_kucing($KODE_KUCING){
			$sql = $this->db->query("select * from kucing where KODE_KUCING = ".intval($KODE_KUCING));
			if($sql->num_rows() > 0)
				return $sql->row_array();
			return false;
		}

		public function update_kucing($post, $KODE_KUCING){
		$NAMA_KUCING = $this->db->escape($post['NAMA_KUCING']);

		$sql =  $this->db->query("UPDATE kucing SET NAMA_KUCING=$NAMA_KUCING WHERE KODE_KUCING = ".intval($KODE_KUCING));
		return true;
		}

		public function hapus_kucing($KODE_KUCING){
			$sql = $this->db->query("DELETE FROM kucing WHERE KODE_KUCING =" .intval($KODE_KUCING));
		}
		//---------------------penyakit--------------------------------------------------------//
		public function data_penyakit(){
			// $data = $this->db->query(" SELECT * FROM vwpenyakit ORDER BY ID_PENYAKIT DESC ");
			$data = $this->db->query("select * from penyakit");
			return $data->result_array();
		}

		public function simpan_penyakit($post){

		$KODE_PENYAKIT = $this->db->escape($post['KODE_PENYAKIT']);
		$NAMA_PENYAKIT = $this->db->escape($post['NAMA_PENYAKIT']);
		$KET_PENYAKIT = $this->db->escape($post['KET_PENYAKIT']);;

		$sql = $this->db->query("INSERT INTO penyakit (KODE_PENYAKIT,NAMA_PENYAKIT,KET_PENYAKIT) VALUES ($KODE_PENYAKIT, $NAMA_PENYAKIT, $KET_PENYAKIT)");
		if($sql)
			return true;
		return false;
		}

		public function get_default_penyakit($KODE_PENYAKIT){
			$sql = $this->db->query("select * from penyakit where KODE_PENYAKIT = ".intval($KODE_PENYAKIT));
			if($sql->num_rows() > 0)
				return $sql->row_array();
			return false;
		}

		public function update_penyakit($post, $KODE_PENYAKIT){

		$NAMA_PENYAKIT = $this->db->escape($post['NAMA_PENYAKIT']);
		$KET_PENYAKIT = $this->db->escape($post['KET_PENYAKIT']);

		$sql =  $this->db->query("UPDATE penyakit SET KODE_PENYAKIT=$KODE_PENYAKIT, NAMA_PENYAKIT=$NAMA_PENYAKIT, KET_PENYAKIT=$KET_PENYAKIT WHERE KODE_PENYAKIT = ".intval($KODE_PENYAKIT));
		return true;
		}

		public function hapus_penyakit($KODE_PENYAKIT){
			$sql = $this->db->query("DELETE FROM penyakit WHERE KODE_PENYAKIT =" .intval($KODE_PENYAKIT));
		}
		//---------------------gejala--------------------------------------------------------//
		public function data_gejala(){
			$data = $this->db->query("select * from gejala");
			return $data->result_array();
		}
		public function ambil_penyakit(){
		return $this->db->get('penyakit')->result();
		}

		public function ambil_gejala(){
		return $this->db->get('gejala')->result();
		}
		public function simpan_gejala($post){
		$KODE_GEJALA = $this->db->escape($post['KODE_GEJALA']);
		$NAMA_GEJALA = $this->db->escape($post['NAMA_GEJALA']);
		$KET_GEJALA = $this->db->escape($post['KET_GEJALA']);;

		$sql = $this->db->query("INSERT INTO gejala VALUES ($KODE_GEJALA, $NAMA_GEJALA, $KET_GEJALA)");
		if($sql)
			return true;
		return false;
		}

		public function get_default_gejala($KODE_GEJALA){
			$sql = $this->db->query("select * from gejala where KODE_GEJALA = ".intval($KODE_GEJALA));
			if($sql->num_rows() > 0)
				return $sql->row_array();
			return false;
		}

		public function update_gejala($post, $KODE_GEJALA){
		$NAMA_GEJALA = $this->db->escape($post['NAMA_GEJALA']);
		$KET_GEJALA = $this->db->escape($post['KET_GEJALA']);

		$sql =  $this->db->query("UPDATE gejala SET NAMA_GEJALA=$NAMA_GEJALA, KET_GEJALA=$KET_GEJALA WHERE KODE_GEJALA = ".intval($KODE_GEJALA));
		return true;
		}

		public function hapus_gejala($KODE_GEJALA){
			$sql = $this->db->query("DELETE FROM gejala WHERE KODE_GEJALA =" .intval($KODE_GEJALA));
		}
		//--------------------diagnosis------------------------------------//
		public function data_diagnosis(){
			$data = $this->db->query("select * from diagnosis");
			return $data->result_array();
		}
		public function ambil_kucing(){
		return $this->db->get('kucing')->result();
		}
		public function simpan_diagnosis($post){
			// $KODE_DIAGNOSIS = $this->db->escape($post['KODE_DIAGNOSIS']);
			$KODE_KUCING = $this->db->escape($post['KODE_KUCING']);
			// $KODE_PENYAKIT = $this->db->escape($post['KODE_PENYAKIT']);
			$TGL_DIAGNOSIS = $this->db->escape($post['TGL_DIAGNOSIS']);;

			// $sql = $this->db->query("INSERT INTO diagnosis VALUES ($KODE_DIAGNOSIS,$KODE_KUCING, $KODE_PENYAKIT, $TGL_DIAGNOSIS)");
			$sql = $this->db->query("INSERT INTO diagnosis (KODE_KUCING, TGL_DIAGNOSIS) VALUES ($KODE_KUCING, $TGL_DIAGNOSIS)");
			if($sql)
				return $this->db->insert_id();
			return false;
		}

		public function insert_diagnosis($data)
		{
			$saved = $this->db->insert('diagnosis', $data);
			if ($this->db->affected_rows()) {
				return $this->db->insert_id();
			} else {
				return 0;
			}
		}

		public function get_default_diagnosis($KODE_DIAGNOSIS){
			$sql = $this->db->query("select * from diagnosis where KODE_DIAGNOSIS = ".intval($KODE_DIAGNOSIS));
			if($sql->num_rows() > 0)
				return $sql->row_array();
			return false;
		}

		public function update_diagnosis($post, $KODE_DIAGNOSIS){
		$KODE_KUCING = $this->db->escape($post['KODE_KUCING']);
		$KODE_PENYAKIT = $this->db->escape($post['KODE_PENYAKIT']);
		$TGL_DIAGNOSIS = $this->db->escape($post['TGL_DIAGNOSIS']);

		$sql =  $this->db->query("UPDATE diagnosis SET KODE_KUCING=$KODE_KUCING ,KODE_PENYAKIT = $KODE_PENYAKIT, TGL_DIAGNOSIS=$TGL_DIAGNOSIS WHERE KODE_DIAGNOSIS = ".intval($KODE_DIAGNOSIS));
		return true;
		}

		public function hapus_diagnosis($KODE_DIAGNOSIS){
			$sql = $this->db->query("DELETE FROM diagnosis WHERE KODE_DIAGNOSIS =" .intval($KODE_DIAGNOSIS));
		}
		//--------------------solusi------------------------------------//
		public function data_solusi(){
			$data = $this->db->query("select * from solusi");
			return $data->result_array();
		}

		public function simpan_solusi($post){
		$KODE_SOLUSI = $this->db->escape($post['KODE_SOLUSI']);
		$KODE_PENYAKIT = $this->db->escape($post['KODE_PENYAKIT']);
		$JENIS_SOLUSI = $this->db->escape($post['JENIS_SOLUSI']);
		$KET_SOLUSI = $this->db->escape($post['KET_SOLUSI']);;

		$sql = $this->db->query("INSERT INTO solusi VALUES ($KODE_SOLUSI,$KODE_PENYAKIT, $JENIS_SOLUSI, $KET_SOLUSI)");
		if($sql)
			return true;
		return false;
		}

		public function get_default_solusi($KODE_SOLUSI){
			$sql = $this->db->query("select * from solusi where KODE_SOLUSI = ".intval($KODE_SOLUSI));
			if($sql->num_rows() > 0)
				return $sql->row_array();
			return false;
		}

		public function update_solusi($post, $KODE_SOLUSI){
		$KODE_PENYAKIT = $this->db->escape($post['KODE_PENYAKIT']);
		$JENIS_SOLUSI = $this->db->escape($post['JENIS_SOLUSI']);
		$KET_SOLUSI = $this->db->escape($post['KET_SOLUSI']);

		$sql =  $this->db->query("UPDATE solusi SET KODE_PENYAKIT=$KODE_PENYAKIT ,JENIS_SOLUSI = $JENIS_SOLUSI, KET_SOLUSI=$KET_SOLUSI WHERE KODE_SOLUSI = ".intval($KODE_SOLUSI));
		return true;
		}

		public function hapus_solusi($KODE_SOLUSI){
			$sql = $this->db->query("DELETE FROM solusi WHERE KODE_SOLUSI =" .intval($KODE_SOLUSI));
		}


}
?>