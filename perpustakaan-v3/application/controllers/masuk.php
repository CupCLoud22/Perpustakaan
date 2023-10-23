<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masuk extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Manggota');
		$this->load->library('form_validation');
	}

	public function index(){
		if($this->session->userdata('log_anggota') == true){
			redirect('area_anggota');
		}
		$data['wp'] = $this->db->get_where('tb_web_profil', array('wp_id' => 1))->row();

		$this->form_validation->set_rules('nim', 'ID/NIM', 'trim|required|min_length[6]|numeric');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[6]|max_length[150]');
		if($this->form_validation->run() == false){
			$this->load->view('template_header', $data);
			$this->load->view('masuk', $data);
			$this->load->view('template_footer');
		}else{
			$cek = $this->Manggota->getDetailAnggota($this->input->post('nim'))->row_array();
			if($cek){
				if(!password_verify($this->input->post('pass'), $cek['pass_anggota'])){
					$this->session->set_flashdata('alert', '<div class="alert alert-danger">Gagal, password Anda salah!<span class="close" data-dismiss="alert">&times;</span></div>');
					redirect('masuk');
				}else{
					$this->session->set_userdata(array('log_anggota' => true, 'id_anggota' => $cek['id_anggota']));
					redirect('area_anggota');
				}
			}else{
				$this->session->set_flashdata('alert', '<div class="alert alert-danger">Gagal, ID/NIM Anda belum terdaftar!<span class="close" data-dismiss="alert">&times;</span></div>');
				redirect('masuk');
			}
		}
	}

	public function keluar(){
		$this->session->sess_destroy();
		redirect('masuk');
	}
}