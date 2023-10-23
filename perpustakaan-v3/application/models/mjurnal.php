<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mjurnal extends CI_Model {

	var $table = 'tb_jurnal';

	public function getJurnal(){
		$this->db->order_by('id_jurnal', 'desc');
		$this->db->join('tb_prodi', 'tb_prodi.id_prodi = tb_jurnal.id_prodi', 'left');
		return $this->db->get($this->table);
	}

	public function getDetailJurnal($id){
		$this->db->where('id_jurnal', $id);
		return $this->db->get($this->table);
	}

	public function insertData($data){
		return $this->db->insert($this->table, $data);
	}

	public function updateData($id, $data){
		$this->db->where('id_jurnal', $id);
		return $this->db->update($this->table, $data);
	}

	public function deleteData($id){
		$this->db->where('id_jurnal', $id);
		return $this->db->delete($this->table);
	}
}