<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Profil';
		$cp = $this->db->get_where('tb_admin', array('id_admin' => $this->session->userdata('id')));
		if($cp->num_rows() > 0){
			$data['s'] = $cp->row();
			$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]|max_length[25]');
			$this->form_validation->set_rules('email', 'Email', 'required|min_length[6]|valid_email');
			$this->form_validation->set_rules('pass1', 'Password');
			$this->form_validation->set_rules('pass2', 'Konfirmasi Password', 'matches[pass1]');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/profil/view', $data);
				$this->load->view('admin/boundle_footer');
			}else{
				if($this->input->post('pass1') != '' && $this->input->post('pass2') != ''){
					$data_pass = array('password_admin' => password_hash($this->input->post('pass2'), PASSWORD_DEFAULT));
					$this->db->where('id_admin', $this->input->post('id'));
					$this->db->update('tb_admin', $data_pass);
				}
				$dataIn = array('nm_admin' => ucwords($this->input->post('nama')), 'email_admin' => $this->input->post('email'));
				$this->db->where('id_admin', $this->input->post('id'));
				$this->db->update('tb_admin', $dataIn);

				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, profil Anda berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/profil');
			}
		}else{
			redirect('admin/dashboard');
		}
	}
}