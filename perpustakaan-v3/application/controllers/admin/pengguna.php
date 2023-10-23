<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->model(array('Mpengguna','Mrole'));
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Data Pengguna';
		
		$data['pengguna'] = $this->Mpengguna->getPengguna();
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/pengguna/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add(){
		$data['title'] = 'Data Pengguna';
		$data['role'] = $this->Mrole->getRole();

		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]|max_length[25]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[7]|max_length[50]|valid_email|callback_rolekey_exists');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('pass1', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('pass2', 'Konfirmasi Passowrd', 'required|min_length[6]|matches[pass1]');
		if($this->form_validation->run() == false){
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/pengguna/add', $data);
			$this->load->view('admin/boundle_footer');
		}else{
			$dataIn = array('nm_admin' => ucwords($this->input->post('nama')), 'email_admin' => $this->input->post('email'), 'password_admin' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT), 'role_id' => $this->input->post('level'), 'status_admin' => 'Aktif', 'tgl_gabung' => date('Y-m-d'));

			$insert = $this->Mpengguna->insertData($dataIn);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data admin berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/pengguna');
		}
	}

	public function edit($id=0){
		$data['title'] = 'Data Pengguna';
		$data['role'] = $this->Mrole->getRole();

		$cek = $this->Mpengguna->getDetailPengguna($id);
		if($cek->num_rows() > 0){
			$data['s'] = $cek->row();
			$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]|max_length[25]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[7]|max_length[50]|valid_email|callback_rolekey_exists');
			$this->form_validation->set_rules('level', 'Level', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/pengguna/edit', $data);
				$this->load->view('admin/boundle_footer');
			}else{
				$data = array('nm_admin' => ucwords($this->input->post('nama')), 'email_admin' => $this->input->post('email'), 'role_id' => $this->input->post('level'), 'status_admin' => $this->input->post('status'));
				
				$this->Mpengguna->updateData($this->input->post('id'), $data);
				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data admin berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/pengguna');
			}

		}else{
			redirect('admin/pengguna');
		}
	}

	public function delete($id=0){
		$this->Mpengguna->deleteData($id);
		redirect('admin/pengguna');
	}
}