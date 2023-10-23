<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
		$data['wp'] = $this->db->get_where('tb_web_profil', array('wp_id' => 1))->row();
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[6]|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[6]');
		if($this->form_validation->run() == false){
			$this->load->view('auth/view', $data);
		}else{
			$this->db->join('tb_user_role', 'tb_user_role.role_id = tb_admin.role_id', 'left');
			$cAdmin = $this->db->get_where('tb_admin', array('email_admin' => $this->input->post('email')))->row_array();
			if($cAdmin){
				if(!password_verify($this->input->post('pass'), $cAdmin['password_admin'])){
					$this->session->set_flashdata('alert', '<div class="alert alert-danger">Gagal, password Anda salah!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
					redirect('auth');
				}else{
					$sessData = array('log_admin' => true, 'role_id' => $cAdmin['role_id'], 'nm' => $cAdmin['nm_admin'], 'mail' => $cAdmin['email_admin'], 'tgl'=> $cAdmin['tgl_gabung'], 'id' => $cAdmin['id_admin'], 'level' => $cAdmin['role']);
					$this->session->set_userdata($sessData);
					redirect('admin/dashboard');
				}
			}else{
				$this->session->set_flashdata('alert', '<div class="alert alert-danger">Gagal, email Anda belum terdaftar!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('auth');
			}
		}
	}

	public function keluar(){
		$this->session->sess_destroy();
		redirect('auth');
	}
}