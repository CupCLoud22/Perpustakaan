<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->model(array('Mpengembalian', 'Mpeminjaman'));
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Data Transaksi';
	
		$data['pengembalian'] = $this->Mpengembalian->getPengembalian();
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/pengembalian/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add(){
		$data['title'] = 'Data Transaksi';
		
		$data['pinjam'] = $this->Mpeminjaman->getListByStatPinjam();
		$this->form_validation->set_rules('idpinjam', 'ID Peminjaman', 'required');
		if($this->form_validation->run() == false){
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/pengembalian/add', $data);
			$this->load->view('admin/boundle_footer');
		}else{
			$dataIn = array('id_peminjaman' => $this->input->post('idpinjam'), 'tgl_pengembalian' => date('Y-m-d'), 'denda' => $this->input->post('denda'), 'id_admin' => $this->session->userdata('id'));
			$this->Mpengembalian->insertData($dataIn);

			$this->Mpeminjaman->updateData($this->input->post('idpinjam'), array('status' => 'Kembali'));

			$bp = $this->Mpeminjaman->getListDetailPinjam($this->input->post('idpinjam'))->result_array();
			foreach ($bp as $k) {
				$this->db->query("UPDATE tb_buku SET jumlah = jumlah + '".$k['qty']."' WHERE id_buku = '".$k['id_buku']."' ");
			}

			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data pengembalian buku berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/pengembalian');
		}
	}

	public function delete($id=0){
		$this->Mpengembalian->deleteData($id);
		redirect('admin/pengembalian');
	}

	public function get_denda(){
		$d = $this->db->get_where('tb_set_pinjam', array('sp_id' => 1))->row();
		$p = $this->db->get_where('tb_peminjaman', array('id_peminjaman' => $this->input->post('id')))->row();
		$data['tglp'] = $p->tgl_pinjam;
		$data['tglk'] = $p->tgl_kembali;
		$tgl1 = new DateTime($p->tgl_kembali);
		$tgl2 = new DateTime(date('Y-m-d'));
		if($p->tgl_kembali < date('Y-m-d')){
			$selisih = $tgl2->diff($tgl1);
			$durasi = $selisih->days;
			$data['telat'] = $durasi;
			$data['denda'] = $durasi * $d->sp_denda;
		}else{
			$data['telat'] = 0;
			$data['denda'] = 0;
		}
		echo json_encode($data);
	}

	public function tampil_buku_pinjam(){
		$d = $this->Mpeminjaman->getListDetailPinjam($this->input->post('id'))->result();
		$no = 1;
		$ttl = 0;
		foreach ($d as $k) {
			$ttl += $k->qty;
			echo '<tr><td>'.$no.'</td><td>'.$k->id_buku.'</td><td>'.$k->judul.'</td><td>'.$k->isbn.'</td><td>'.$k->pengarang.'</td><td>'.$k->qty.'</td></tr>';
			$no++;
		}
		echo '<tr><td colspan="5"><b>Total buku yang dipinjam</b></td><td><b>'.$ttl.'</b></td></tr>';
	}
}