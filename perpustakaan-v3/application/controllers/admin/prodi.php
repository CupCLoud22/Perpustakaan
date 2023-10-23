<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prodi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->model(array('Mprodi', 'Manggota'));
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Pengolahan Data';
		$data['prodi'] = $this->Mprodi->getprodi();
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/prodi/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add(){
		$data['title'] = 'Pengolahan Data';
		$this->form_validation->set_rules('nama', 'prodi', 'required|min_length[3]|max_length[50]|is_unique[tb_prodi.nm_prodi]');
		if($this->form_validation->run() == false){
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/prodi/add', $data);
			$this->load->view('admin/boundle_footer');
		}else{
			
			$dataIn = array('nm_prodi' => ucwords($this->input->post('nama')));

			$insert = $this->Mprodi->insertData($dataIn);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data prodi berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/prodi');
		}
	}

	public function edit($id=0){
		$data['title'] = 'Pengolahan Data';

		$cek = $this->Mprodi->getDetailprodi($id);
		if($cek->num_rows() > 0){
			$data['s'] = $cek->row();
			$this->form_validation->set_rules('nama', 'prodi', 'required|min_length[3]|max_length[50]');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/prodi/edit', $data);
				$this->load->view('admin/boundle_footer');
			}else{
				$dataUp = array('nm_prodi' => ucwords($this->input->post('nama')));

				$this->Mprodi->updateData($this->input->post('id'), $dataUp);
				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data prodi berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/prodi');
			}

		}else{
			redirect('admin/prodi');
		}
	}

	public function delete($id=0){
		$cek_prodi = $this->Manggota->cekProdi($id);
		if($cek_prodi->num_rows() > 0){
			$this->session->set_flashdata('alert', '<div class="alert alert-danger"><b>Gagal</b>, data prodi ini tidak bisa dihapus karena telah digunakan di data anggota.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		}else{
			$this->Mprodi->deleteData($id);
		}
		redirect('admin/prodi');
	}
}