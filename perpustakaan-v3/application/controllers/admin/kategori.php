<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->model('Mkategori');
		$this->load->model('Mbuku');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Pengolahan Data';
		$data['kategori'] = $this->Mkategori->getKategori();
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/kategori/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add(){
		$data['title'] = 'Pengolahan Data';
		$this->form_validation->set_rules('nama', 'Kategori', 'required|min_length[3]|max_length[50]|is_unique[tb_kategori.nm_kategori]');
		if($this->form_validation->run() == false){
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/kategori/add', $data);
			$this->load->view('admin/boundle_footer');
		}else{
			
			$id = $this->Mkategori->generateId();
			$dataIn = array('id_kategori' => $id, 'nm_kategori' => ucwords($this->input->post('nama')));

			$insert = $this->Mkategori->insertData($dataIn);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data kategori berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/kategori');
		}
	}

	public function edit($id=0){
		$data['title'] = 'Pengolahan Data';

		$cek = $this->Mkategori->getDetailKategori($id);
		if($cek->num_rows() > 0){
			$data['s'] = $cek->row();
			$this->form_validation->set_rules('nama', 'Kategori', 'required|min_length[3]|max_length[50]');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/kategori/edit', $data);
				$this->load->view('admin/boundle_footer');
			}else{
				$dataUp = array('nm_kategori' => ucwords($this->input->post('nama')));

				$this->Mkategori->updateData($this->input->post('id'), $dataUp);
				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data kategori berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/kategori');
			}

		}else{
			redirect('admin/kategori');
		}
	}

	public function delete($id=0){
		$cek_kategori = $this->Mbuku->cekKategori($id);
		if($cek_kategori->num_rows() > 0){
			$this->session->set_flashdata('alert', '<div class="alert alert-danger"><b>Gagal</b>, data kategori ini tidak bisa dihapus karena telah digunakan di data buku.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		}else{
			$this->Mkategori->deleteData($id);
		}
		redirect('admin/kategori');
	}
}