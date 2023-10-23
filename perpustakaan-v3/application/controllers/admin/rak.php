<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rak extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->model('Mrak');
		$this->load->model('Mbuku');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Pengolahan Data';
		$data['rak'] = $this->Mrak->getRak();
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/rak/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add(){
		$data['title'] = 'Pengolahan Data';

		$this->form_validation->set_rules('nama', 'Nama Rak', 'required|min_length[3]|max_length[10]|is_unique[tb_rak.nm_rak]');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|min_length[3]|max_length[50]');
		if($this->form_validation->run() == false){
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/rak/add', $data);
			$this->load->view('admin/boundle_footer');
		}else{
			$dataIn = array('nm_rak' => ucwords($this->input->post('nama')), 'ket_rak' => ucwords($this->input->post('keterangan')));

			$insert = $this->Mrak->insertData($dataIn);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data rak berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/rak');
		}
	}

	public function edit($id=0){
		$data['title'] = 'Pengolahan Data';

		$cek = $this->Mrak->getDetailRak($id);
		if($cek->num_rows() > 0){
			$data['s'] = $cek->row();
			$this->form_validation->set_rules('nama', 'Nama Rak', 'required|min_length[3]|max_length[10]');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|min_length[3]|max_length[50]');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/rak/edit', $data);
				$this->load->view('admin/boundle_footer');
			}else{
				$data = array('nm_rak' => ucwords($this->input->post('nama')), 'ket_rak' => ucwords($this->input->post('keterangan')));
				
				$this->Mrak->updateData($this->input->post('id'), $data);
				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data rak berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/rak');
			}

		}else{
			redirect('admin/rak');
		}
	}

	public function delete($id=0){
		$cek_rak = $this->Mbuku->cekRak($id);
		if($cek_rak->num_rows() > 0){
			$this->session->set_flashdata('alert', '<div class="alert alert-danger"><b>Gagal</b>, data rak ini tidak bisa dihapus karena telah digunakan di data buku.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		}else{
			$this->Mrak->deleteData($id);
		}
		redirect('admin/rak');
	}
}