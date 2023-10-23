<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Pengaturan';
		$data['menu'] = $this->db->get('tb_user_role');
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/pengaturan/role/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add(){
		$data['title'] = 'Pengaturan';
		$this->form_validation->set_rules('role', 'Nama role', 'required|min_length[3]|max_length[25]');
		if($this->form_validation->run() == false){
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/pengaturan/role/add', $data);
			$this->load->view('admin/boundle_footer');
		}else{
			$dataIn = array('role' => ucwords($this->input->post('role')));
			$insert = $this->db->insert('tb_user_role', $dataIn);

			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data role berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/role');
		}
	}

	public function edit($id=0){
		$data['title'] = 'Pengaturan';

		$cek = $this->db->get_where('tb_user_role', array('role_id' => $id));
		if($cek->num_rows() > 0){
			$data['b'] = $cek->row();
			$this->form_validation->set_rules('role', 'Nama role', 'required|min_length[3]|max_length[25]');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/pengaturan/role/edit', $data);
				$this->load->view('admin/boundle_footer');
			}else{
				$dataIn = array('role' => ucwords($this->input->post('role')));
				$this->db->where('role_id', $this->input->post('id'));
				$this->db->update('tb_user_role', $dataIn);
				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data role berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/role');
			}

		}else{
			redirect('admin/role');
		}
	}

	public function delete($id){
		$this->db->where('role_id', $id);
		$this->db->delete('tb_user_role');
		redirect('admin/role');
	}

	public function role_akses($id=0){
		$data['title'] = 'Pengaturan';
		$data['role'] = $this->db->get_where('tb_user_role', array('role_id' => $id))->row();
		$data['menu'] = $this->db->get('tb_menu');
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/pengaturan/role/role_akses', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function ubah_role_akses(){
		$data = array(
				'role_id' => $this->input->post('roleid'),
				'menu_id' => $this->input->post('menuid')
			);
		$cek = $this->db->get_where('tb_user_access', $data);
		if($cek->num_rows() > 0){
			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, role akses berhasil diedit.<span class="close" data-dismiss="alert">&times;</span></div>');
			return $this->db->delete('tb_user_access', $data);
		}else{
			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, role akses berhasil diedit.<span class="close" data-dismiss="alert">&times;</span></div>');
			return $this->db->insert('tb_user_access', $data);
		}
	}
}