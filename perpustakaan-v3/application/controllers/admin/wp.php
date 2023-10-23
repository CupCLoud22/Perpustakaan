<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wp extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Pengaturan';
		$cp = $this->db->get_where('tb_web_profil', array('wp_id' => 1));
		if($cp->num_rows() > 0){
			$data['s'] = $cp->row();
			$this->form_validation->set_rules('judul', 'Judul', 'trim|reuired|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('nama', 'Nama Instansi', 'trim|reuired|min_length[3]|max_length[100]');
			$this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'trim|reuired|min_length[3]');
			$this->form_validation->set_rules('telp', 'Telp', 'trim|reuired|min_length[1]|max_length[30]');
			$this->form_validation->set_rules('hp', 'No Hp', 'trim|reuired|min_length[9]|max_length[13]|numeric');
			$this->form_validation->set_rules('email', 'Email', 'trim|reuired|min_length[3]|max_length[50]|valid_email');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/pengaturan/web-profil/view', $data);
				$this->load->view('admin/boundle_footer');
			}else{

				if($_FILES['fav']['error'] <> 4){
					$this->_uploadLogo('fav');
					$d = $this->upload->data();
					$gFav = $d['file_name'];
					unlink('./assets/dist/img/'.$data['s']->wp_favicon);
				}else{
					$gFav = $this->input->post('fav2');
				}

				if($_FILES['logo']['error'] <> 4){
					$this->_uploadLogo('logo');
					$d = $this->upload->data();
					$gLogo = $d['file_name'];
					unlink('./assets/dist/img/'.$data['s']->wp_logo);
				}else{
					$gLogo = $this->input->post('logo2');
				}


				$dataIn = array('wp_favicon' => $gFav, 'wp_logo' => $gLogo,
							'wp_judul' => ucwords($this->input->post('judul')),
							'wp_nama' => ucwords($this->input->post('nama')),
							'wp_alamat' => ucwords($this->input->post('alamat')),
							'wp_telp' => $this->input->post('telp'),
							'wp_hp' => $this->input->post('hp'),
							'wp_email' => $this->input->post('email'));
				$this->db->where('wp_id', $this->input->post('id'));
				$this->db->update('tb_web_profil', $dataIn);

				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, profil website Anda berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/wp');
			}
		}else{
			redirect('admin/dashboard');
		}
	}

	function _uploadLogo($param){
		$config['upload_path'] = './assets/dist/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($param)){
			$this->session->set_flashdata('alert', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$this->upload->display_errors().'</div>');
			redirect('admin/wp');
		}
	}
}