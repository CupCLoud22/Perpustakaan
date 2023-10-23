<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function index(){
		$data['wp'] = $this->db->get_where('tb_web_profil', array('wp_id' => 1))->row();
		$this->load->view('template_header', $data);
		$this->load->view('absensi', $data);
		$this->load->view('template_footer');
	}

	public function absen_pengunjung(){
		$cek = $this->db->get_where('tb_anggota', array('id_anggota' => $this->input->post('id')))->row_array();
		if($cek){
			$dataIn = array('id_anggota' => $cek['id_anggota']);
			$insert = $this->db->insert('tb_buku_tamu', $dataIn);
			if($insert){
				$data['stat'] = true;
				$data['nm'] = $cek['nm_anggota'];
			}
		}else{
			$data['stat'] = false;
		}
		echo json_encode($data);
	}
}