<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index(){
		$data['wp'] = $this->db->get_where('tb_web_profil', array('wp_id' => 1))->row();
		$this->db->order_by('id_buku', 'desc');
		$data['buku'] = $this->db->get('tb_buku');
		$this->load->view('template_header', $data);
		$this->load->view('beranda', $data);
		$this->load->view('template_footer');
	}
}