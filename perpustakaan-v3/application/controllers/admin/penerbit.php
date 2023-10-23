<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penerbit extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->model('Mpenerbit');
		$this->load->model('Mbuku');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Pengolahan Data';
		$data['penerbit'] = $this->Mpenerbit->getPenerbit();
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/penerbit/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add(){
		$data['title'] = 'Pengolahan Data';
		$this->form_validation->set_rules('nama', 'Penerbit', 'required|min_length[3]|max_length[50]');
		if($this->form_validation->run() == false){
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/penerbit/add', $data);
			$this->load->view('admin/boundle_footer');
		}else{
			$id = $this->Mpenerbit->generateId();
			$dataIn = array('id_penerbit' => $id, 'nm_penerbit' => ucwords($this->input->post('nama')));

			$insert = $this->Mpenerbit->insertData($dataIn);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data penerbit berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/penerbit');
		}
	}

	public function edit($id=0){
		$data['title'] = 'Pengolahan Data';

		$cek = $this->Mpenerbit->getDetailPenerbit($id);
		if($cek->num_rows() > 0){
			$data['s'] = $cek->row();
			$this->form_validation->set_rules('nama', 'Penerbit', 'required|min_length[3]|max_length[50]');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/penerbit/edit', $data);
				$this->load->view('admin/boundle_footer');
			}else{
				$dataUp = array('nm_penerbit' => ucwords($this->input->post('nama')));

				$this->Mpenerbit->updateData($this->input->post('id'), $dataUp);
				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data penerbit berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/penerbit');
			}

		}else{
			redirect('admin/penerbit');
		}
	}

	public function delete($id=0){
		$cek_penerbit = $this->Mbuku->cekPenerbit($id);
		if($cek_penerbit->num_rows() > 0){
			$this->session->set_flashdata('alert', '<div class="alert alert-danger"><b>Gagal</b>, data penerbit ini tidak bisa dihapus karena telah digunakan di data buku.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		}else{
			$this->Mpenerbit->deleteData($id);
		}
		redirect('admin/penerbit');
	}
}