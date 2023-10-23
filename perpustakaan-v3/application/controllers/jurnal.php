<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurnal extends CI_Controller {

	public function index(){
		$data['wp'] = $this->db->get_where('tb_web_profil', array('wp_id' => 1))->row();
		$data['prodi'] = $this->db->get('tb_prodi');
		$this->load->view('template_header', $data);
		$this->load->view('jurnal', $data);
		$this->load->view('template_footer');
	}
}