<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Buku extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('log_admin') != true) {
			redirect('auth');
		}
		$this->load->model(array('Mbuku', 'Mkategori', 'Mpenerbit', 'Mrak', 'Mpeminjaman'));
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Pengolahan Data';
		$data['buku'] = $this->Mbuku->getBuku();
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/buku/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add()
	{
		$data['title'] = 'Pengolahan Data';
		$data['kategori'] = $this->Mkategori->getKategori();
		$data['penerbit'] = $this->Mpenerbit->getPenerbit();
		$data['rak'] = $this->Mrak->getRak();

		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('judul', 'Judul', 'required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('isbn', 'ISBN', 'required|min_length[17]|max_length[40]');
		$this->form_validation->set_rules('pengarang', 'Pengarang', 'required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('hal', 'Halaman', 'required|min_length[1]|max_length[4]|numeric');
		$this->form_validation->set_rules('jml', 'Jumlah', 'required|min_length[1]|max_length[4]|numeric');
		$this->form_validation->set_rules('thn', 'Thn Terbit', 'required|min_length[4]|max_length[4]|numeric');
		$this->form_validation->set_rules('sinopsis', 'Sinopsis', 'required|min_length[3]');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('rak', 'Rak', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/buku/add', $data);
			$this->load->view('admin/boundle_footer');
		} else {
			$this->load->library('ciqrcode');
			$namabuku = '';
			$namaebook = '';
			if ($_FILES['gbuku']['error'] <> 4) {
				//upload file buku
				$this->_uploadBuku();
				$d = $this->bu->data();
				$namabuku = $d['file_name'];
			} else {
				$namabuku = '';
			}

			if ($_FILES['ebook']['error'] <> 4) {
				//upload file ebook
				$this->_uploadEbook();
				$e = $this->eb->data();
				$namaebook = $e['file_name'];
			} else {
				$namaebook = '';
			}

			$id = $this->Mbuku->generateId();
			$params['data'] = $id;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = FCPATH . 'qrcode/' . $id . '.png';

			$this->ciqrcode->generate($params);

			$dataIn = array(
				'id_buku' => $id, 'judul' => ucwords($this->input->post('judul')), 'isbn' => $this->input->post('isbn'),
				'pengarang' => ucwords($this->input->post('pengarang')), 'halaman' => $this->input->post('hal'),
				'jumlah' => $this->input->post('jml'), 'thn_terbit' => $this->input->post('thn'), 'sinopsis' => ucfirst($this->input->post('sinopsis')),
				'id_kategori' => $this->input->post('kategori'), 'id_penerbit' => $this->input->post('penerbit'), 'id_rak' => $this->input->post('rak'), 'gambar' => $namabuku, 'ebook' => $namaebook
			);
			$insert = $this->Mbuku->insertData($dataIn);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data buku berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/buku');
		}
	}

	function _uploadEbook()
	{
		$config['upload_path'] = './ebook/';
		$config['allowed_types'] = 'pdf';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config, 'eb');
		if (!$this->eb->do_upload('ebook')) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $this->eb->display_errors() . '</div>');
			redirect('admin/buku/add/');
		}
	}

	function _uploadBuku()
	{
		$config['upload_path'] = './buku/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config, 'bu');
		if (!$this->bu->do_upload('gbuku')) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $this->bu->display_errors() . '</div>');
			redirect('admin/buku/add/');
		}
	}

	public function edit($id = 0)
	{
		$data['title'] = 'Pengolahan Data';
		$data['kategori'] = $this->Mkategori->getKategori();
		$data['penerbit'] = $this->Mpenerbit->getPenerbit();
		$data['rak'] = $this->Mrak->getRak();

		$cek = $this->Mbuku->getDetailBuku($id);
		if ($cek->num_rows() > 0) {
			$data['b'] = $cek->row();
			$this->form_validation->set_rules('kategori', 'Kategori', 'required');
			$this->form_validation->set_rules('judul', 'Judul', 'required|min_length[3]|max_length[100]');
			$this->form_validation->set_rules('isbn', 'ISBN', 'required|min_length[17]|max_length[40]');
			$this->form_validation->set_rules('pengarang', 'Pengarang', 'required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('hal', 'Halaman', 'required|min_length[1]|max_length[4]|numeric');
			$this->form_validation->set_rules('jml', 'Jumlah', 'required|min_length[1]|max_length[4]|numeric');
			$this->form_validation->set_rules('thn', 'Thn Terbit', 'required|min_length[4]|max_length[4]|numeric');
			$this->form_validation->set_rules('sinopsis', 'Sinopsis', 'required|min_length[3]');
			$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
			$this->form_validation->set_rules('rak', 'Rak', 'required');
			if ($this->form_validation->run() == false) {
				$this->load->view('admin/boundle_header', $data);
				$this->load->view('admin/buku/edit', $data);
				$this->load->view('admin/boundle_footer');
			} else {
				$this->load->library('ciqrcode');
				$namabuku = '';
				$namaebook = '';
				if ($_FILES['gbuku']['error'] <> 4) {
					//upload file buku
					$this->_uploadBuku();
					$d = $this->bu->data();
					$namabuku = $d['file_name'];
					unlink('buku/' . $data['b']->gambar);
				} else {
					$namabuku = $this->input->post('gambar');
				}

				if ($_FILES['ebook']['error'] <> 4) {
					//upload file ebook
					$this->_uploadEbooke($id);
					$e = $this->eb->data();
					$namaebook = $e['file_name'];
					unlink('ebook/' . $data['b']->ebook);
				} else {
					$namaebook = $this->input->post('ebooksrc');;
				}

				$params['data'] = $this->input->post('id');
				$params['level'] = 'H';
				$params['size'] = 10;
				$params['savename'] = FCPATH . 'qrcode/' . $this->input->post('id') . '.png';

				$this->ciqrcode->generate($params);

				$dataUp = array(
					'judul' => ucwords($this->input->post('judul')), 'isbn' => $this->input->post('isbn'),
					'pengarang' => ucwords($this->input->post('pengarang')), 'halaman' => $this->input->post('hal'),
					'jumlah' => $this->input->post('jml'), 'thn_terbit' => $this->input->post('thn'), 'sinopsis' => ucfirst($this->input->post('sinopsis')),
					'id_kategori' => $this->input->post('kategori'), 'id_penerbit' => $this->input->post('penerbit'), 'id_rak' => $this->input->post('rak'), 'gambar' => $namabuku, 'ebook' => $namaebook
				);

				$this->Mbuku->updateData($this->input->post('id'), $dataUp);
				$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data buku berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
				redirect('admin/buku');
			}
		} else {
			redirect('admin/buku');
		}
	}

	function _uploadEbooke($id)
	{
		$config['upload_path'] = './ebook/';
		$config['allowed_types'] = 'pdf';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config, 'eb');
		if (!$this->eb->do_upload('ebook')) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $this->eb->display_errors() . '</div>');
			redirect('admin/buku/edit/' . $id);
		}
	}

	function _uploadBukue($id)
	{
		$config['upload_path'] = './buku/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config, 'bu');
		if (!$this->bu->do_upload('gbuku')) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $this->bu->display_errors() . '</div>');
			redirect('admin/buku/edit/' . $id);
		}
	}

	public function delete($id = 0)
	{
		$cek_buku = $this->Mpeminjaman->cekBuku($id);
		if ($cek_buku->num_rows() > 0) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger"><b>Gagal</b>, data buku ini tidak bisa dihapus karena buku ini pernah dipinjam.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		} else {
			$b = $this->Mbuku->getDetailBuku($id)->row_array();
			unlink('buku/' . $b['gambar']);
			unlink('ebook/' . $b['ebook']);
			$this->Mbuku->deleteData($id);
		}
		redirect('admin/buku');
	}

	function download_ebook($filename)
	{
		$this->load->helper('download');
		$file = base_url() . 'ebook/' . $filename;
		$data = file_get_contents($file);
		force_download($filename, $data);
	}

	function cetak_qrcode()
	{
		$this->load->library('ciqrcode');
		$data['bar'] = $this->Mbuku->getBuku();
		$this->load->view('admin/buku/cetak_barcode', $data);
	}
}
