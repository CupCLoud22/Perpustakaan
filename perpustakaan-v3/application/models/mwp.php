<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mwp extends CI_Model {

	var $table = 'tb_web_profil';

	public function getWp(){
		$this->db->limit(1);
		return $this->db->get($this->table);
	}
}