<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->model('Mwp');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Laporan';
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/laporan/buku-masuk/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function c_bmasuk(){
		$data['title'] = 'Laporan';
		$data['wp'] = $this->Mwp->getWp()->row();
		if($_GET['tgl1'] != '' && $_GET['tgl2'] != ''){
			$this->db->where('tgl_bmasuk >= ', $_GET['tgl1']);
			$this->db->where('tgl_bmasuk <= ', $_GET['tgl2']);
		}
		$this->db->join('tb_buku', 'tb_buku.id_buku = tb_buku_masuk.id_buku', 'left');
		$data['pinjam'] = $this->db->get('tb_buku_masuk');
		$this->load->view('admin/laporan/buku-masuk/cetak', $data);
	}

	public function ex_bmasuk(){
		$data['title'] = 'Laporan';
		$data['wp'] = $this->Mwp->getWp()->row();
		if($_GET['tgl1'] != '' && $_GET['tgl2'] != ''){
			$this->db->where('tgl_bmasuk >= ', $_GET['tgl1']);
			$this->db->where('tgl_bmasuk <= ', $_GET['tgl2']);
		}
		$this->db->join('tb_buku', 'tb_buku.id_buku = tb_buku_masuk.id_buku', 'left');
		$data['pinjam'] = $this->db->get('tb_buku_masuk');
		$this->load->view('admin/laporan/buku-masuk/excel', $data);
	}

	public function buku_keluar(){
		$data['title'] = 'Laporan';
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/laporan/buku-keluar/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function c_bkeluar(){
		$data['title'] = 'Laporan';
		$data['wp'] = $this->Mwp->getWp()->row();
		if($_GET['tgl1'] != '' && $_GET['tgl2'] != ''){
			$this->db->where('tgl_bkeluar >= ', $_GET['tgl1']);
			$this->db->where('tgl_bkeluar <= ', $_GET['tgl2']);
		}
		$this->db->join('tb_buku', 'tb_buku.id_buku = tb_buku_keluar.id_buku', 'left');
		$data['bkeluar'] = $this->db->get('tb_buku_keluar');
		$this->load->view('admin/laporan/buku-keluar/cetak', $data);
	}

	public function ex_bkeluar(){
		$data['title'] = 'Laporan';
		$data['wp'] = $this->Mwp->getWp()->row();
		if($_GET['tgl1'] != '' && $_GET['tgl2'] != ''){
			$this->db->where('tgl_bkeluar >= ', $_GET['tgl1']);
			$this->db->where('tgl_bkeluar <= ', $_GET['tgl2']);
		}
		$this->db->join('tb_buku', 'tb_buku.id_buku = tb_buku_keluar.id_buku', 'left');
		$data['bkeluar'] = $this->db->get('tb_buku_keluar');
		$this->load->view('admin/laporan/buku-keluar/excel', $data);
	}

	public function peminjaman(){
		$data['title'] = 'Laporan';
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/laporan/peminjaman/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function c_peminjaman(){
		$data['title'] = 'Laporan';
		$data['wp'] = $this->Mwp->getWp()->row();
		if($_GET['tgl1'] != '' && $_GET['tgl2'] != ''){
			$this->db->where('tgl_pinjam >= ', $_GET['tgl1']);
			$this->db->where('tgl_pinjam <= ', $_GET['tgl2']);
		}
		$this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_peminjaman.id_anggota', 'left');
		$this->db->join('tb_prodi', 'tb_prodi.id_prodi = tb_anggota.id_prodi', 'left');
		$data['pinjam'] = $this->db->get('tb_peminjaman');
		$this->load->view('admin/laporan/peminjaman/cetak', $data);
	}

	public function ex_peminjaman(){
		$data['title'] = 'Laporan';
		$data['wp'] = $this->Mwp->getWp()->row();
		if($_GET['tgl1'] != '' && $_GET['tgl2'] != ''){
			$this->db->where('tgl_pinjam >= ', $_GET['tgl1']);
			$this->db->where('tgl_pinjam <= ', $_GET['tgl2']);
		}
		$this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_peminjaman.id_anggota', 'left');
		$this->db->join('tb_prodi', 'tb_prodi.id_prodi = tb_anggota.id_prodi', 'left');
		$data['pinjam'] = $this->db->get('tb_peminjaman');
		$this->load->view('admin/laporan/peminjaman/excel', $data);
	}

	public function pengembalian(){
		$data['title'] = 'Laporan';
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/laporan/pengembalian/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function c_pengembalian(){
		$data['title'] = 'Laporan';
		$data['wp'] = $this->Mwp->getWp()->row();
		if($_GET['tgl1'] != '' && $_GET['tgl2'] != ''){
			$this->db->where('tgl_pengembalian >= ', $_GET['tgl1']);
			$this->db->where('tgl_pengembalian <= ', $_GET['tgl2']);
		}
		$this->db->join('tb_peminjaman', 'tb_peminjaman.id_peminjaman = tb_pengembalian.id_peminjaman', 'left');
		$this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_peminjaman.id_anggota', 'left');
		$data['kembali'] = $this->db->get('tb_pengembalian');
		$this->load->view('admin/laporan/pengembalian/cetak', $data);
	}

	public function ex_pengembalian(){
		$data['title'] = 'Laporan';
		$data['wp'] = $this->Mwp->getWp()->row();
		if($_GET['tgl1'] != '' && $_GET['tgl2'] != ''){
			$this->db->where('tgl_pengembalian >= ', $_GET['tgl1']);
			$this->db->where('tgl_pengembalian <= ', $_GET['tgl2']);
		}
		$this->db->join('tb_peminjaman', 'tb_peminjaman.id_peminjaman = tb_pengembalian.id_peminjaman', 'left');
		$this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_peminjaman.id_anggota', 'left');
		$data['kembali'] = $this->db->get('tb_pengembalian');
		$this->load->view('admin/laporan/pengembalian/excel', $data);
	}

	public function pengunjung(){
		$data['title'] = 'Laporan';
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/laporan/pengunjung/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function c_pengunjung(){
		$data['title'] = 'Laporan';
		$data['wp'] = $this->Mwp->getWp()->row();
		if($_GET['tgl1'] != '' && $_GET['tgl2'] != ''){
			$this->db->where('date(tgl_tamu) >= ', $_GET['tgl1']);
			$this->db->where('date(tgl_tamu) <= ', $_GET['tgl2']);
		}
		$this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_buku_tamu.id_anggota', 'left');
		$this->db->join('tb_prodi', 'tb_prodi.id_prodi = tb_anggota.id_prodi', 'left');
		$data['tamu'] = $this->db->get('tb_buku_tamu');
		$this->load->view('admin/laporan/pengunjung/cetak', $data);
	}

	public function ex_pengunjung(){
		$data['title'] = 'Laporan';
		$data['wp'] = $this->Mwp->getWp()->row();
		if($_GET['tgl1'] != '' && $_GET['tgl2'] != ''){
			$this->db->where('date(tgl_tamu) >= ', $_GET['tgl1']);
			$this->db->where('date(tgl_tamu) <= ', $_GET['tgl2']);
		}
		$this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_buku_tamu.id_anggota', 'left');
		$this->db->join('tb_prodi', 'tb_prodi.id_prodi = tb_anggota.id_prodi', 'left');
		$data['tamu'] = $this->db->get('tb_buku_tamu');
		$this->load->view('admin/laporan/pengunjung/excel', $data);
	}
}