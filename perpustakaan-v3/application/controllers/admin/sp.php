<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sp extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Pengaturan Denda';
		$cp = $this->db->get_where('tb_set_pinjam', array('sp_id' => 1));
		if($cp->num_rows() > 0){
			$data['s'] = $cp->row();
			$this->form_validation->set_rules('lama', 'Maks. Lama Pinjam', 'reuired|min_length[1]|numeric');
			$this->form_validation->set_rules('banyak', 'Maks. Lama Pinjam', 'reuired|min_length[1]|numeric');
			$this->form_validation->set_rules('denda', 'Denda', 'reuired|numeric');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/pengaturan/peminjaman/view', $data);
				$this->load->view('admin/boundle_footer');
			}else{

				$dataIn = array('sp_tgl' => date('Y-m-d'),
							'maks_lama_pinjam' => $this->input->post('lama'),
							'maks_buku_pinjam' => $this->input->post('banyak'),
							'sp_denda' => $this->input->post('denda'));
				$this->db->where('sp_id', $this->input->post('id'));
				$this->db->update('tb_set_pinjam', $dataIn);

				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data peminjaman Anda berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/sp');
			}
		}else{
			redirect('admin/dashboard');
		}
	}
}