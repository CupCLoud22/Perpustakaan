<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrak extends CI_Model {

	var $table = 'tb_rak';

	public function getRak(){
		$this->db->order_by('id_rak', 'desc');
		return $this->db->get($this->table);
	}

	public function getDetailRak($id){
		$this->db->where('id_rak', $id);
		return $this->db->get($this->table);
	}

	public function insertData($data){
		return $this->db->insert($this->table, $data);
	}

	public function updateData($id, $data){
		$this->db->where('id_rak', $id);
		return $this->db->update($this->table, $data);
	}

	public function deleteData($id){
		$this->db->where('id_rak', $id);
		return $this->db->delete($this->table);
	}
}