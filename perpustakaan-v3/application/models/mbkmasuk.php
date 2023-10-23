<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mbkmasuk extends CI_Model {

	var $table = 'tb_bkmasuk';

	public function getbkmasuk(){
		$this->db->order_by('id_bkmasuk', 'desc');
		return $this->db->get($this->table);
	}

	public function getDetailbkmasuk($id){
		$this->db->where('id_bkmasuk', $id);
		return $this->db->get($this->table);
	}

	public function insertData($data){
		return $this->db->insert($this->table, $data);
	}

	public function updateData($id, $data){
		$this->db->where('id_bkmasuk', $id);
		return $this->db->update($this->table, $data);
	}

	public function deleteData($id){
		$this->db->where('id_bkmasuk', $id);
		return $this->db->delete($this->table);
	}
}