<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mprodi extends CI_Model {

	var $table = 'tb_prodi';

	public function getprodi(){
		$this->db->order_by('id_prodi', 'desc');
		return $this->db->get($this->table);
	}

	public function getDetailprodi($id){
		$this->db->where('id_prodi', $id);
		return $this->db->get($this->table);
	}

	public function insertData($data){
		return $this->db->insert($this->table, $data);
	}

	public function updateData($id, $data){
		$this->db->where('id_prodi', $id);
		return $this->db->update($this->table, $data);
	}

	public function deleteData($id){
		$this->db->where('id_prodi', $id);
		return $this->db->delete($this->table);
	}
}