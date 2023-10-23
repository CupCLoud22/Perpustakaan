<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mkoleksi extends CI_Model {

	var $table = 'tb_buku';

	public function queryKoleksi(){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_buku.id_kategori', 'left');
		$this->db->order_by('id_buku', 'desc');
		if($_GET['key'] != ''){
			$this->db->like('judul', $_GET['key']);
		}
	}

	public function getAllKoleksi($perpage, $page){
		$this->queryKoleksi();
		$this->db->limit($perpage, $page);
		return $this->db->get();
	}

	public function getCountKoleksi(){
		$this->queryKoleksi();
		return $this->db->get()->num_rows();
	}

	public function getDetailKoleksi($id){
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_buku.id_kategori', 'left');
		$this->db->join('tb_penerbit', 'tb_penerbit.id_penerbit = tb_buku.id_penerbit', 'left');
		$this->db->join('tb_rak', 'tb_rak.id_rak = tb_buku.id_rak', 'left');
		return $this->db->get_where($this->table, array('id_buku' => $id));
	}
}