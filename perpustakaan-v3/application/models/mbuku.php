<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mbuku extends CI_Model {

	var $table = 'tb_buku';

	public function getBuku(){
		$this->db->order_by('id_buku', 'desc');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_buku.id_kategori', 'left');
		$this->db->join('tb_penerbit', 'tb_penerbit.id_penerbit = tb_buku.id_penerbit', 'left');
		$this->db->join('tb_rak', 'tb_rak.id_rak = tb_buku.id_rak', 'left');
		return $this->db->get($this->table);
	}

	public function getDetailBuku($id){
		$this->db->where('id_buku', $id);
		return $this->db->get($this->table);
	}

	public function insertData($data){
		return $this->db->insert($this->table, $data);
	}

	public function updateData($id, $data){
		$this->db->where('id_buku', $id);
		return $this->db->update($this->table, $data);
	}

	public function deleteData($id){
		$this->db->where('id_buku', $id);
		return $this->db->delete($this->table);
	}

	public function cekKategori($id){
		$this->db->where('id_kategori', $id);
		return $this->db->get($this->table);
	}

	public function cekPenerbit($id){
		$this->db->where('id_penerbit', $id);
		return $this->db->get($this->table);
	}

	public function cekRak($id){
		$this->db->where('id_rak', $id);
		return $this->db->get($this->table);
	}

	public function generateId(){
		$c = $this->db->query("SELECT MAX(RIGHT(id_buku, 4)) AS id FROM tb_buku")->row_array();
		$d = ((int) $c['id']) + 1;
		return 'B'.sprintf("%04s", $d);
	}
}