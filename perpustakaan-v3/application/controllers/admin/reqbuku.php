<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reqbuku extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->model(array('Mreqbuku'));
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Pengolahan Data';
		
		$data['reqbuku'] = $this->Mreqbuku->getreqbuku();
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/reqbuku/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add(){
		$data['title'] = 'Pengolahan Data';
		//$data['prodi'] = $this->Mprodi->getProdi();

		//$this->form_validation->set_rules('prodi', 'Prodi', 'required');
		//$this->form_validation->set_rules('jurnal', 'Nama Jurnal', 'trim|required|min_length[3]|max_length[150]');
		//$this->form_validation->set_rules('url', 'URL', 'trim|required|min_length[1]|max_length[150]');
		$this->form_validation->set_rules('judul', 'Judul Buku', 'trim|required|min_length[1]|max_length[150]');
		$this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required|min_length[1]|max_length[150]');
		$this->form_validation->set_rules('thn', 'Tahun Terbit', 'trim|required|min_length[1]|max_length[150]');
		$this->form_validation->set_rules('jumlah', 'Jumlah Buku', 'trim|required|min_length[1]|max_length[150]');
		if($this->form_validation->run() == false){
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/reqbuku/add', $data);
			$this->load->view('admin/boundle_footer');
		}else{
			//$dataIn = array('id_prodi' => $this->input->post('prodi'), 'nm_jurnal' => $this->input->post('jurnal'), 'url_jurnal' => $this->input->post('url'));
			$dataIn = array('id_reqbuku' => $this->input->post('no'), 'judul' => $this->input->post('judul'), 'pengarang' => $this->input->post('pengarang'), 'thn_terbit' => $this->input->post('thn'), 'jumlah' => $this->input->post('jumlah'));

			$insert = $this->Mreqbuku->insertData($dataIn);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data request buku berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/reqbuku');
		}
	}

	public function edit($id=0){
		$data['title'] = 'Data Request Buku';
		//$data['prodi'] = $this->Mprodi->getProdi();

		$cek = $this->Mreqbuku->getDetailreqbuku($id);
		if($cek->num_rows() > 0){
			$data['s'] = $cek->row();
			//$this->form_validation->set_rules('prodi', 'Prodi', 'required');
			//$this->form_validation->set_rules('jurnal', 'Nama Jurnal', 'trim|required|min_length[3]|max_length[150]');
			//$this->form_validation->set_rules('url', 'URL', 'trim|required|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('judul', 'Judul Buku', 'trim|required|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('thn', 'Tahun Terbit', 'trim|required|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('jumlah', 'Jumlah Buku', 'trim|required|min_length[1]|max_length[150]');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/reqbuku/edit', $data);
				$this->load->view('admin/boundle_footer');
			}else{
				//$data = array('id_prodi' => $this->input->post('prodi'), 'nm_jurnal' => $this->input->post('jurnal'), 'url_jurnal' => $this->input->post('url'));
				$data = array('id_reqbuku' => $this->input->post('no'), 'judul' => $this->input->post('judul'), 'pengarang' => $this->input->post('pengarang'), 'thn_terbit' => $this->input->post('thn'), 'jumlah' => $this->input->post('jumlah'));

				$this->Mreqbuku->updateData($this->input->post('id'), $data);
				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data request buku berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/reqbuku');
			}

		}else{
			redirect('admin/reqbuku');
		}
	}

	public function delete($id=0){
		$this->Mreqbuku->deleteData($id);
		redirect('admin/reqbuku');
	}
}