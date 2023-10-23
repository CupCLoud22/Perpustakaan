<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpengembalian extends CI_Model {

	var $table = 'tb_pengembalian';

	public function getPengembalian(){
		$this->db->order_by('id_pengembalian', 'desc');
		$this->db->join('tb_peminjaman', 'tb_peminjaman.id_peminjaman = tb_pengembalian.id_peminjaman', 'left');
		$this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_peminjaman.id_anggota', 'left');
		return $this->db->get($this->table);
	}

	public function getDetailPengembalian($id){
		$this->db->where('id_pengembalian', $id);
		return $this->db->get($this->table);
	}

	public function insertData($data){
		return $this->db->insert($this->table, $data);
	}

	public function deleteData($id){
		$this->db->where('id_pengembalian', $id);
		return $this->db->delete($this->table);
	}
}