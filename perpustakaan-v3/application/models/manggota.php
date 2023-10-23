<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manggota extends CI_Model {

	var $table = 'tb_anggota';

	public function getAnggota(){
		$this->db->order_by('id_anggota', 'desc');
		$this->db->join('tb_prodi', 'tb_prodi.id_prodi = tb_anggota.id_prodi', 'left');
		return $this->db->get($this->table);
	}

	public function getDetailAnggota($id){
		$this->db->where('id_anggota', $id);
		return $this->db->get($this->table);
	}

	public function insertData($data){
		return $this->db->insert($this->table, $data);
	}

	public function updateData($id, $data){
		$this->db->where('id_anggota', $id);
		return $this->db->update($this->table, $data);
	}

	public function deleteData($id){
		$this->db->where('id_anggota', $id);
		return $this->db->delete($this->table);
	}

	public function cekProdi($id){
		$this->db->where('id_prodi', $id);
		return $this->db->get($this->table);
	}
}