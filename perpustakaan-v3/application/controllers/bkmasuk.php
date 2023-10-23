<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bkmasuk extends CI_Controller {

	public function index(){
		$data['wp'] = $this->db->get_where('tb_web_profil', array('wp_id' => 1))->row();
		$this->load->view('template_header', $data);
		$this->load->view('bkmasuk', $data);
		$this->load->view('template_footer');
	}
}