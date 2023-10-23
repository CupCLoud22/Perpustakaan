<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mreqbuku extends CI_Model {

	var $table = 'tb_reqbuku';

	public function getreqbuku(){
		$this->db->order_by('id_reqbuku', 'desc');
		return $this->db->get($this->table);
	}

	public function getDetailreqbuku($id){
		$this->db->where('id_reqbuku', $id);
		return $this->db->get($this->table);
	}

	public function insertData($data){
		return $this->db->insert($this->table, $data);
	}

	public function updateData($id, $data){
		$this->db->where('id_reqbuku', $id);
		return $this->db->update($this->table, $data);
	}

	public function deleteData($id){
		$this->db->where('id_reqbuku', $id);
		return $this->db->delete($this->table);
	}

	
}