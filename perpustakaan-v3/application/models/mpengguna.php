<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpengguna extends CI_Model {

	var $table = 'tb_admin';

	public function getPengguna(){
		$this->db->order_by('id_admin', 'desc');
		$this->db->join('tb_user_role', 'tb_user_role.role_id = tb_admin.role_id', 'left');
		return $this->db->get($this->table);
	}

	public function getDetailPengguna($id){
		$this->db->where('id_admin', $id);
		return $this->db->get($this->table);
	}

	public function insertData($data){
		return $this->db->insert($this->table, $data);
	}

	public function updateData($id, $data){
		$this->db->where('id_admin', $id);
		return $this->db->update($this->table, $data);
	}

	public function deleteData($id){
		$this->db->where('id_admin', $id);
		return $this->db->delete($this->table);
	}
}