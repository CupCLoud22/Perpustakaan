<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpenerbit extends CI_Model {

	var $table = 'tb_penerbit';

	public function getPenerbit(){
		$this->db->order_by('id_penerbit', 'desc');
		return $this->db->get($this->table);
	}

	public function getDetailPenerbit($id){
		$this->db->where('id_penerbit', $id);
		return $this->db->get($this->table);
	}

	public function insertData($data){
		return $this->db->insert($this->table, $data);
	}

	public function updateData($id, $data){
		$this->db->where('id_penerbit', $id);
		return $this->db->update($this->table, $data);
	}

	public function deleteData($id){
		$this->db->where('id_penerbit', $id);
		return $this->db->delete($this->table);
	}

	public function generateId(){
		$c = $this->db->query("SELECT MAX(RIGHT(id_penerbit, 2)) AS id FROM tb_penerbit")->row_array();
		$d = ((int) $c['id']) + 1;
		return 'P'.sprintf("%02s", $d);
	}
}