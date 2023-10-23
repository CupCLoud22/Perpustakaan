<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('log_admin') != true) {
			redirect('auth');
		}
		$this->load->model(array('Mpeminjaman', 'Manggota', 'Mbuku'));
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Data Transaksi';
		$data['buku'] = $this->Mpeminjaman->getPeminjaman();
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/peminjaman/view', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function add()
	{
		$data['title'] = 'Data Transaksi';
		$data['sp'] = $this->Mpeminjaman->getSp()->row();

		$data['buku'] = $this->Mbuku->getBuku();
		$data['anggota'] = $this->Manggota->getAnggota();

		$id = $this->Mpeminjaman->generateId();
		$data['id'] = $id;
		$this->form_validation->set_rules('id_anggota', 'anggota', 'required');
		$this->form_validation->set_rules('buku[]', 'Buku', 'required');
		$this->form_validation->set_rules('qty[]', 'Qty', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/peminjaman/add', $data);
			$this->load->view('admin/boundle_footer');
		} else {
			$buku = $this->input->post('buku');
			$qty = $this->input->post('qty');
			$dataIn = array('id_peminjaman' => $this->input->post('id'), 'tgl_pinjam' => $this->input->post('tglp'), 'tgl_kembali' => $this->input->post('tglk'), 'id_anggota' => $this->input->post('id_anggota'), 'keterangan' => ucfirst($this->input->post('keterangan')), 'status' => 'Pinjam');

			$insert = $this->Mpeminjaman->insertData($dataIn);

			$detail = [];
			for ($i = 0; $i < count($buku); $i++) {
				$this->db->query("UPDATE tb_buku SET jumlah = jumlah - '" . $qty[$i] . "' WHERE id_buku = '" . $buku[$i] . "'");
				$detail = array(
					'id_peminjaman' => $this->input->post('id'),
					'id_buku' => $buku[$i],
					'qty' => $qty[$i]
				);
				$detailInput[] = $detail;
			}
			$this->db->insert_batch('tb_detail_pinjam', $detailInput);
			$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, data peminjaman buku berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			redirect('admin/peminjaman');
		}
	}

	public function delete($id = 0)
	{
		$this->Mpeminjaman->deleteData($id);
		redirect('admin/peminjaman');
	}

	public function verifikasi($id = 0)
	{
		$this->Mpeminjaman->updateData($id, array('status' => 'Pinjam'));
		$this->session->set_flashdata('alert', '<div class="alert alert-success"><b>Selamat</b>, verfikasi peminjaman berhasil.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		redirect('admin/peminjaman');
	}

	public function get_data_buku()
	{
		$b = $this->Mbuku->getDetailBuku($this->input->post('id'));
		if ($b->num_rows() > 0) {
			$data['d'] = $b->row();
			$data['stat'] = true;
		} else {
			$data['stat'] = false;
		}
		echo json_encode($data);
	}

	public function detail($id = 0)
	{
		$data['title'] = 'Data Transaksi';

		$cP = $this->Mpeminjaman->getDetailPeminjaman($id);
		if ($cP->num_rows() > 0) {
			$data['p'] = $cP->row();

			$data['l'] = $this->Mpeminjaman->getListDetailPinjam($id)->result();
			$this->load->view('admin/boundle_header', $data);
			$this->load->view('admin/peminjaman/detail', $data);
			$this->load->view('admin/boundle_footer');
		} else {
			redirect('admin/peminjaman');
		}
	}
}
