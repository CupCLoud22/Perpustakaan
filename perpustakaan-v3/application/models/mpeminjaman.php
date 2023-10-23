<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpeminjaman extends CI_Model {

	var $table = 'tb_peminjaman';
	var $table2 = 'tb_detail_pinjam';
	var $table3 = 'tb_set_pinjam';

	public function getPeminjaman(){
		$this->db->order_by('id_peminjaman', 'desc');
		$this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_peminjaman.id_anggota', 'left');
		return $this->db->get($this->table);
	}

	public function generateId(){
		$c = $this->db->query("SELECT MAX(RIGHT(id_peminjaman, 5)) AS id FROM tb_peminjaman")->row_array();
		$d = ((int) $c['id']) + 1;
		return 'P'.sprintf("%05s", $d);
	}

	public function insertData($data){
		return $this->db->insert($this->table, $data);
	}

	public function deleteData($id){
		$this->db->where('id_peminjaman', $id);
		return $this->db->delete($this->table);
	}

	public function getDetailPeminjaman($id){
		$this->db->where('id_peminjaman', $id);
		$this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_peminjaman.id_anggota', 'left');
		return $this->db->get($this->table);
	}

	public function getListDetailPinjam($id){
		$this->db->where('id_peminjaman', $id);
		$this->db->join('tb_buku', 'tb_buku.id_buku = tb_detail_pinjam.id_buku', 'left');
		return $this->db->get($this->table2);
	}

	public function getListByStatPinjam(){
		$this->db->where('status', 'Pinjam');
		$this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_peminjaman.id_anggota', 'left');
		return $this->db->get($this->table);
	}

	public function updateData($id, $data){
		$this->db->where('id_peminjaman', $id);
		return $this->db->update($this->table, $data);
	}

	public function cekAnggota($id){
		$this->db->where('tb_peminjaman.id_anggota', $id);
		$this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_peminjaman.id_anggota', 'left');
		return $this->db->get($this->table);
	}

	public function cekBuku($id){
		$this->db->where('id_buku', $id);
		return $this->db->get($this->table2);
	}

	public function getSp(){
		$this->db->limit(1);
		return $this->db->get($this->table3);
	}

	public function getListByIdAnggota($id){
		$this->db->where('tb_peminjaman.id_anggota', $id);
		$this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_peminjaman.id_anggota', 'left');
		return $this->db->get($this->table);
	}
}