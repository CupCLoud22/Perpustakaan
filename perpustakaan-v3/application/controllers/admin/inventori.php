<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventori extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Inventori Buku';
		$this->db->join('tb_buku', 'tb_buku.id_buku = tb_buku_masuk.id_buku', 'left');
		$data['bmasuk'] = $this->db->get('tb_buku_masuk');
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/inventori/buku-masuk/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add_bmasuk(){
		$data['title'] = 'Inventori Buku';
		$data['buku'] = $this->db->get('tb_buku');
		$this->form_validation->set_rules('buku', 'Buku', 'required');
		$this->form_validation->set_rules('asal', 'Asal Buku', 'required|min_length[3]');
		$this->form_validation->set_rules('jml', 'Jumlah Masuk', 'required|numeric');
		if($this->form_validation->run() == false){
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/inventori/buku-masuk/add', $data);
			$this->load->view('admin/boundle_footer');
		}else{
			$data = array('tgl_bmasuk' => date('Y-m-d'), 'id_buku' => $this->input->post('buku'), 'asal_bmasuk' => ucwords($this->input->post('asal')), 'jml_bmasuk' => $this->input->post('jml'), 'ket_bmasuk' => ucfirst($this->input->post('keterangan')));
			$this->db->insert('tb_buku_masuk', $data);

			$this->db->query("UPDATE tb_buku SET jumlah = jumlah + '".$this->input->post('jml')."' WHERE id_buku = '".$this->input->post('buku')."'");

			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data buku masuk berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/inventori');
		}
	}

	public function delete_bmasuk($id=0){
		$this->db->where('id_bmasuk', $id);
		$this->db->delete('tb_buku_masuk');
		redirect('admin/inventori');
	}

	public function buku_keluar(){
		$data['title'] = 'Inventori Buku';
		$this->db->join('tb_buku', 'tb_buku.id_buku = tb_buku_keluar.id_buku', 'left');
		$data['bkeluar'] = $this->db->get('tb_buku_keluar');
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/inventori/buku-keluar/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add_bkeluar(){
		$data['title'] = 'Inventori Buku';
		$data['buku'] = $this->db->get('tb_buku');
		$this->form_validation->set_rules('buku', 'Buku', 'required');
		$this->form_validation->set_rules('jml', 'Jumlah Masuk', 'required|numeric');
		if($this->form_validation->run() == false){
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/inventori/buku-keluar/add', $data);
			$this->load->view('admin/boundle_footer');
		}else{
			$data = array('tgl_bkeluar' => date('Y-m-d'), 'id_buku' => $this->input->post('buku'), 'jml_bkeluar' => $this->input->post('jml'), 'ket_bkeluar' => ucfirst($this->input->post('keterangan')));
			$this->db->insert('tb_buku_keluar', $data);

			$this->db->query("UPDATE tb_buku SET jumlah = jumlah - '".$this->input->post('jml')."' WHERE id_buku = '".$this->input->post('buku')."'");

			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data buku keluar berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/inventori/buku_keluar');
		}
	}
}