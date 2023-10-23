<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->model('Manggota');
		$this->load->model('Mpeminjaman');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Pengolahan Data';
		$data['anggota'] = $this->Manggota->getAnggota();
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/anggota/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add(){
		$data['title'] = 'Pengolahan Data';
		$this->form_validation->set_rules('id', 'ID Anggota', 'required|min_length[6]|max_length[25]|numeric|is_unique[tb_anggota.id_anggota]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]|max_length[25]');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[3]|max_length[100]');
		if($this->form_validation->run() == false){
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/anggota/add', $data);
			$this->load->view('admin/boundle_footer');
		}else{
			$dataIn = array('id_anggota' => $this->input->post('id'), 'nm_anggota' => ucwords($this->input->post('nama')), 'jk_anggota' => $this->input->post('jk'), 'almt_anggota' => ucwords($this->input->post('alamat')));
			$insert = $this->Manggota->insertData($dataIn);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data anggota berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/anggota');
		}
	}

	public function edit($id=0){
		$data['title'] = 'Pengolahan Data';
		$cek = $this->Manggota->getDetailAnggota($id);
		$data['prodi'] = $this->db->get('tb_prodi');
		if($cek->num_rows() > 0){
			$data['s'] = $cek->row();
			$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]|max_length[25]');
			$this->form_validation->set_rules('prodi', 'Prodi', 'required');
			$this->form_validation->set_rules('smt', 'Semester', 'required');
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[3]|max_length[100]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|max_length[50]|valid_email');
			$this->form_validation->set_rules('hp', 'No Hp', 'trim|required|min_length[9]|max_length[13]|numeric');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/anggota/edit', $data);
				$this->load->view('admin/boundle_footer');
			}else{
				$dataUp = array('nm_anggota' => ucwords($this->input->post('nama')), 'jk_anggota' => $this->input->post('jk'), 'almt_anggota' => ucwords($this->input->post('alamat')), 'email_anggota' => $this->input->post('email'), 'hp_anggota' => $this->input->post('hp'), 'smt_anggota' => $this->input->post('smt'), 'id_prodi' => $this->input->post('prodi'));
				$this->Manggota->updateData($this->input->post('id'), $dataUp);
				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data anggota berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/anggota');
			}

		}else{
			redirect('admin/anggota');
		}
	}

	public function delete($id=0){
		$cek_anggota = $this->Mpeminjaman->cekAnggota($id);
		if($cek_anggota->num_rows() > 0){
			$d = $cek_anggota->row();
			$this->session->set_flashdata('alert', '<div class="alert alert-danger"><b>Gagal</b>, data '.$d->nm_anggota.' tidak bisa dihapus karena pernah melakukan peminjaman buku.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		}else{
			$this->Manggota->deleteData($id);
		}
		redirect('admin/anggota');		
	}
}