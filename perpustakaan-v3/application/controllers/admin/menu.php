<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Pengaturan';
		$data['menu'] = $this->db->get('tb_menu');
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/pengaturan/menu/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add(){
		$data['title'] = 'Pengaturan';
		$data['menu'] = $this->db->get('tb_menu');
		$this->form_validation->set_rules('menu', 'Nama Menu', 'required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('url', 'URL', 'required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('icon', 'Icon', 'required|min_length[3]|max_length[50]');
		if($this->form_validation->run() == false){
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/pengaturan/menu/add', $data);
			$this->load->view('admin/boundle_footer');
		}else{
			$dataIn = array('menu_name' => ucwords($this->input->post('menu')), 'menu_url' => $this->input->post('url'),
					'menu_icon' =>$this->input->post('icon'));
			$insert = $this->db->insert('tb_menu', $dataIn);

			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data menu berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/menu');
		}
	}

	public function edit($id=0){
		$data['title'] = 'Pengaturan';

		$cek = $this->db->get_where('tb_menu', array('menu_id' => $id));
		if($cek->num_rows() > 0){
			$data['b'] = $cek->row();
			$this->form_validation->set_rules('menu', 'Nama Menu', 'required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('url', 'URL', 'required|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('icon', 'Icon', 'required|min_length[3]|max_length[50]');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/pengaturan/menu/edit', $data);
				$this->load->view('admin/boundle_footer');
			}else{
				$dataIn = array('menu_name' => ucwords($this->input->post('menu')), 'menu_url' => $this->input->post('url'),
					'menu_icon' =>$this->input->post('icon'));
				$this->db->where('menu_id', $this->input->post('id'));
				$this->db->update('tb_menu', $dataIn);
				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data menu berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/menu');
			}

		}else{
			redirect('admin/menu');
		}
	}

	public function delete($id){
		$this->db->where('menu_id', $id);
		$this->db->delete('tb_menu');
		redirect('admin/menu');
	}

	public function sub_menu($id=0){
		$data['title'] = 'Pengaturan';

		$cek = $this->db->get_where('tb_sub_menu', array('menu_id' => $id));
		// if($cek->num_rows() > 0){
			$data['sub'] = $cek;
			$this->form_validation->set_rules('menu', 'Nama Menu', 'required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('url', 'URL', 'required|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('icon', 'Icon', 'required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('numb', 'Sort', 'required');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/pengaturan/menu/sub_menu', $data);
				$this->load->view('admin/boundle_footer');
			}else{
				$dataIn = array('menu_id' => $id, 'sub_menu_name' => ucwords($this->input->post('menu')), 'sub_menu_url' => $this->input->post('url'), 'sub_menu_icon' =>$this->input->post('icon'), 'sub_menu_numb' =>$this->input->post('numb'));
				$this->db->insert('tb_sub_menu', $dataIn);
				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data menu berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/menu/sub_menu/'.$id);
			}

		// }else{
		// 	redirect('admin/menu');
		// }
	}

	public function delete_sub($id, $menuid){
		$this->db->where('sub_menu_id', $id);
		$this->db->delete('tb_sub_menu');
		redirect('admin/menu/sub_menu/'.$menuid);
	}

	public function edit_sub($id=0,  $menuid=0){
		$data['title'] = 'Pengaturan';

		$cek = $this->db->get_where('tb_sub_menu', array('sub_menu_id' => $id));
		if($cek->num_rows() > 0){
			$data['b'] = $cek->row();
			$this->form_validation->set_rules('menu', 'Nama Menu', 'required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('url', 'URL', 'required|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('icon', 'Icon', 'required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('numb', 'Sort', 'required');
			if($this->form_validation->run() == false){
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/pengaturan/menu/edit_sub', $data);
				$this->load->view('admin/boundle_footer');
			}else{
				$dataIn = array('sub_menu_name' => ucwords($this->input->post('menu')), 'sub_menu_url' => $this->input->post('url'),
					'sub_menu_icon' =>$this->input->post('icon'), 'sub_menu_numb' =>$this->input->post('numb'));
				$this->db->where('sub_menu_id', $this->input->post('id'));
				$this->db->update('tb_sub_menu', $dataIn);
				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data menu berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/menu/sub_menu/'.$menuid);
			}

		}else{
			redirect('admin/menu');
		}
	}
}