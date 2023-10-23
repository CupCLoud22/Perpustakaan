<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bkmasuk extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->model(array('Mbkmasuk'));
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Pengolahan Data';
		
		$data['bkmasuk'] = $this->Mbkmasuk->getbkmasuk();
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/bkmasuk/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add(){
		$data['title'] = 'Pengolahan Data';
		$this->form_validation->set_rules('judul', 'Judul Buku', 'trim|required|min_length[1]|max_length[150]');
		$this->form_validation->set_rules('supplier', 'Supplier', 'trim|required|min_length[1]|max_length[150]');
		$this->form_validation->set_rules('harga', 'Harga Buku', 'trim|required|min_length[1]|max_length[150]');
		$this->form_validation->set_rules('jumlah', 'Jumlah Buku', 'trim|required|min_length[1]|max_length[150]');
		if($this->form_validation->run() == false){
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/bkmasuk/add', $data);
			$this->load->view('admin/boundle_footer');
		}else{
			$dataIn = array('judul' => $this->input->post('judul'), 'supplier' => $this->input->post('supplier'), 'harga' => $this->input->post('harga'), 'jumlah' => $this->input->post('jumlah'));

			$insert = $this->Mbkmasuk->insertData($dataIn);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data request buku berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/bkmasuk');
		}
	}

	public function edit($id=0){
		$data['title'] = 'Data Buku Masuk';

		$cek = $this->Mbkmasuk->getDetailbkmasuk($id);
		if($cek->num_rows() > 0){
			$data['s'] = $cek->row();
			$this->form_validation->set_rules('judul', 'Judul Buku', 'trim|required|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('supplier', 'Supplier', 'trim|required|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('harga', 'Harga Buku', 'trim|required|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('jumlah', 'Jumlah Buku', 'trim|required|min_length[1]|max_length[150]');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/bkmasuk/edit', $data);
				$this->load->view('admin/boundle_footer');
			}else{
				$dataIn = array('judul' => $this->input->post('judul'), 'supplier' => $this->input->post('supplier'), 'harga' => $this->input->post('harga'), 'jumlah' => $this->input->post('jumlah'));

				$this->Mbkmasuk->updateData($this->input->post('id'), $data);
				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data request buku berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/bkmasuk');
			}

		}else{
			redirect('admin/bkmasuk');
		}
	}
/*
	public function edit($id=0){
		$data['title'] = 'Data Buku Masuk';

		$cek = $this->Mbkmasuk->getDetailbkmasuk($id);
		if($cek->num_rows() > 0){
			$data['s'] = $cek->row();
			$this->form_validation->set_rules('id_bkmasuk', 'Judul Buku', 'trim|required|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('judul', 'Judul Buku', 'trim|required|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('supplier', 'Supplier', 'trim|required|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('harga', 'Harga Buku', 'trim|required|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('jumlah', 'Jumlah Buku', 'trim|required|min_length[1]|max_length[150]');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/bkmasuk/edit', $data);
				$this->load->view('admin/boundle_footer');
			}else{
				$dataIn = array('id_bkmasuk' => $this->input->post('id_bkmasuk'),'judul' => $this->input->post('judul'), 'supplier' => $this->input->post('supplier'), 'harga' => $this->input->post('harga'), 'jumlah' => $this->input->post('jumlah'));

				$this->Mbkmasuk->updateData($this->input->post('id'), $data);
				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data request buku berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/bkmasuk');
			}

		}else{
			redirect('admin/bkmasuk');
		}
	}
*/
	public function delete($id=0){
		$this->Mbkmasuk->deleteData($id);
		redirect('admin/bkmasuk');
	}

	public function cl_bkmasuk(){
		$data['title'] = 'Buku Masuk';
		$data['bkmsk'] = $this->db->get('tb_bkmasuk');
		$this->load->view('admin/bkmasuk/cetak3', $data);
	}
}