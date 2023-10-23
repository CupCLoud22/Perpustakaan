<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrole extends CI_Model {

	var $table = 'tb_user_role';

	public function getRole(){
		$this->db->order_by('role_id', 'desc');
		return $this->db->get($this->table);
	}
}