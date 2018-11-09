<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_model {

	public function cek_user($data) {
			return $this->db->get_where('user', $data);
		}
}