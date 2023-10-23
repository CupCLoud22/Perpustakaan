<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mkategori extends CI_Model {

	var $table = 'tb_kategori';

	public function getKategori(){
		$this->db->order_by('id_kategori', 'desc');
		return $this->db->get($this->table);
	}

	public function getDetailKategori($id){
		$this->db->where('id_kategori', $id);
		return $this->db->get($this->table);
	}

	public function insertData($data){
		return $this->db->insert($this->table, $data);
	}

	public function updateData($id, $data){
		$this->db->where('id_kategori', $id);
		return $this->db->update($this->table, $data);
	}

	public function deleteData($id){
		$this->db->where('id_kategori', $id);
		return $this->db->delete($this->table);
	}

	public function generateId(){
		$c = $this->db->query("SELECT MAX(RIGHT(id_kategori, 2)) AS id FROM tb_kategori")->row_array();
		$d = ((int) $c['id']) + 1;
		return 'K'.sprintf("%02s", $d);
	}
}