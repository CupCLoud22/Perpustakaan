<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurnal extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->model(array('Mjurnal','Mprodi'));
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Pengolahan Data';
		
		$data['jurnal'] = $this->Mjurnal->getjurnal();
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/jurnal/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add(){
		$data['title'] = 'Pengolahan Data';
		$data['prodi'] = $this->Mprodi->getProdi();

		$this->form_validation->set_rules('prodi', 'Prodi', 'required');
		$this->form_validation->set_rules('jurnal', 'Nama Jurnal', 'trim|required|min_length[3]|max_length[150]');
		$this->form_validation->set_rules('url', 'URL', 'trim|required|min_length[1]|max_length[150]');
		if($this->form_validation->run() == false){
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/jurnal/add', $data);
			$this->load->view('admin/boundle_footer');
		}else{
			$dataIn = array('id_prodi' => $this->input->post('prodi'), 'nm_jurnal' => $this->input->post('jurnal'), 'url_jurnal' => $this->input->post('url'));

			$insert = $this->Mjurnal->insertData($dataIn);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data jurnal berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/jurnal');
		}
	}

	public function edit($id=0){
		$data['title'] = 'Data Jurnal';
		$data['prodi'] = $this->Mprodi->getProdi();

		$cek = $this->Mjurnal->getDetailjurnal($id);
		if($cek->num_rows() > 0){
			$data['s'] = $cek->row();
			$this->form_validation->set_rules('prodi', 'Prodi', 'required');
			$this->form_validation->set_rules('jurnal', 'Nama Jurnal', 'trim|required|min_length[3]|max_length[150]');
			$this->form_validation->set_rules('url', 'URL', 'trim|required|min_length[1]|max_length[150]');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/jurnal/edit', $data);
				$this->load->view('admin/boundle_footer');
			}else{
				$data = array('id_prodi' => $this->input->post('prodi'), 'nm_jurnal' => $this->input->post('jurnal'), 'url_jurnal' => $this->input->post('url'));
				
				$this->Mjurnal->updateData($this->input->post('id'), $data);
				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data jurnal berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/jurnal');
			}

		}else{
			redirect('admin/jurnal');
		}
	}

	public function delete($id=0){
		$this->Mjurnal->deleteData($id);
		redirect('admin/jurnal');
	}
}