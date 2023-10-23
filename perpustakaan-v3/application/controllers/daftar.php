<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Manggota');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['wp'] = $this->db->get_where('tb_web_profil', array('wp_id' => 1))->row();
		$data['prodi'] = $this->db->get('tb_prodi');

		$this->form_validation->set_rules('nim', 'ID/NIM', 'trim|required|min_length[6]|is_unique[tb_anggota.id_anggota]|numeric');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('prodi', 'Prodi', 'required');
		$this->form_validation->set_rules('smt', 'Semester', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|max_length[50]|valid_email');
		$this->form_validation->set_rules('hp', 'No Hp', 'trim|required|min_length[9]|max_length[13]|numeric');
		$this->form_validation->set_rules('pass1', 'Password', 'trim|required|min_length[6]|max_length[150]');
		$this->form_validation->set_rules('pass2', 'Konfirmasi Password', 'trim|required|min_length[6]|max_length[150]|matches[pass1]');
		if($this->form_validation->run() == false){
			$this->load->view('template_header', $data);
			$this->load->view('daftar', $data);
			$this->load->view('template_footer');
		}else{
			$this->load->library('ciqrcode');
			$params['data'] = $this->input->post('nim');
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = FCPATH.'qranggota/'.$this->input->post('nim').'.png';

			$this->ciqrcode->generate($params);
			$dataIn = array('id_anggota' => $this->input->post('nim'), 'nm_anggota' => ucwords($this->input->post('nama')), 'jk_anggota' => $this->input->post('jk'), 'almt_anggota' => ucwords($this->input->post('alamat')), 'email_anggota' => $this->input->post('email'), 'hp_anggota' => $this->input->post('hp'), 'smt_anggota' => $this->input->post('smt'), 'id_prodi' => $this->input->post('prodi'), 'pass_anggota' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT));

			$insert = $this->Manggota->insertData($dataIn);
			$this->session->set_flashdata('alert', '<div class="alert alert-success">Pendaftaran Berhasil, Silahkan Masuk!<span class="close" data-dismiss="alert">&times;</span></div>');
			redirect('masuk');
		}
		
	}
}