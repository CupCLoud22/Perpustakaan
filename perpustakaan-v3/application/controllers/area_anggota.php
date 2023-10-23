<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area_anggota extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_anggota') != true){
			$this->session->set_flashdata('alert', '<div class="alert alert-danger">Maaf, Anda harus masuk terlebih dahulu!<span class="close" data-dismiss="alert">&times;</span></div>');
			redirect('masuk');
		}
		$this->load->model(array('Manggota', 'Mpeminjaman', 'Mbuku'));
		$this->load->library('form_validation');
	}

	public function index(){
		$data['wp'] = $this->db->get_where('tb_web_profil', array('wp_id' => 1))->row();
		$data['p'] = $this->Manggota->getDetailAnggota($this->session->userdata('id_anggota'))->row();
		$this->load->view('template_header', $data);
		$this->load->view('area-anggota/home', $data);
		$this->load->view('template_footer');
	}

	public function profil(){
		$data['wp'] = $this->db->get_where('tb_web_profil', array('wp_id' => 1))->row();
		$data['p'] = $this->Manggota->getDetailAnggota($this->session->userdata('id_anggota'))->row();
		$data['prodi'] = $this->db->get('tb_prodi');

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('prodi', 'Prodi', 'required');
		$this->form_validation->set_rules('smt', 'Semester', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|max_length[50]|valid_email');
		$this->form_validation->set_rules('hp', 'No Hp', 'trim|required|min_length[9]|max_length[13]|numeric');
		$this->form_validation->set_rules('pass1', 'Password', 'trim|min_length[6]|max_length[150]');
		$this->form_validation->set_rules('pass2', 'Konfirmasi Password', 'trim|min_length[6]|max_length[150]|matches[pass1]');
		if($this->form_validation->run() == false){
			$this->load->view('template_header', $data);
			$this->load->view('area-anggota/profil', $data);
			$this->load->view('template_footer');
		}else{
			if($this->input->post('pass1') != '' && $this->input->post('pass2') != ''){
					$data_pass = array('pass_anggota' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT));
					$this->Manggota->updateData($this->input->post('nim'), $data_pass);
				}
			$dataUp = array('nm_anggota' => ucwords($this->input->post('nama')), 'jk_anggota' => $this->input->post('jk'), 'almt_anggota' => ucwords($this->input->post('alamat')), 'email_anggota' => $this->input->post('email'), 'hp_anggota' => $this->input->post('hp'), 'smt_anggota' => $this->input->post('smt'), 'id_prodi' => $this->input->post('prodi'));

			$update = $this->Manggota->updateData($this->input->post('nim'), $dataUp);
			$this->session->set_flashdata('alert', '<div class="alert alert-success">Profil Anda berhasil diubah!<span class="close" data-dismiss="alert">&times;</span></div>');
			redirect('area_anggota/profil');
		}
	}

	public function riwayat(){
		$data['wp'] = $this->db->get_where('tb_web_profil', array('wp_id' => 1))->row();
		$data['p'] = $this->Manggota->getDetailAnggota($this->session->userdata('id_anggota'))->row();
		$data['riwayat'] = $this->Mpeminjaman->getListByIdAnggota($this->session->userdata('id_anggota'));
		$this->load->view('template_header', $data);
		$this->load->view('area-anggota/riwayat', $data);
		$this->load->view('template_footer');
	}

	public function detailriwayat($id=0){
		$data['wp'] = $this->db->get_where('tb_web_profil', array('wp_id' => 1))->row();
		$data['p'] = $this->Manggota->getDetailAnggota($this->session->userdata('id_anggota'))->row();
		$cP = $this->Mpeminjaman->getDetailPeminjaman($id);
		if($cP->num_rows() > 0){
			$data['p'] = $cP->row();
			$data['l'] = $this->Mpeminjaman->getListDetailPinjam($id)->result();
			$this->load->view('template_header', $data);
			$this->load->view('area-anggota/detail_riwayat', $data);
			$this->load->view('template_footer');
		}else{
			redirect('area_anggota/riwayat');
		}
	}

	public function pinjambuku(){
		$data['wp'] = $this->db->get_where('tb_web_profil', array('wp_id' => 1))->row();
		$data['p'] = $this->Manggota->getDetailAnggota($this->session->userdata('id_anggota'))->row();
		$data['riwayat'] = $this->Mpeminjaman->getListByIdAnggota($this->session->userdata('id_anggota'));
		$data['buku'] = $this->Mbuku->getBuku();

		$this->load->view('template_header', $data);
		$this->load->view('area-anggota/pinjam_buku', $data);
		$this->load->view('template_footer');		
	}

	public function prosespinjam(){
		if($this->input->post('baris') != ''){
			$baris = count($this->input->post('baris'));
		}else{
			$baris = 0;
		}
		$sp = $this->Mpeminjaman->getSp()->row();
		$tglp = date('Y-m-d');
		$tglk = date('Y-m-d', strtotime('+'.$sp->maks_lama_pinjam.' days', strtotime(date('Y-m-d'))));
		$buku = $this->input->post('buku');
		$qty = $this->input->post('qty');
		if($baris > 0){
			$id = $this->Mpeminjaman->generateId();
			$dataIn = array('id_peminjaman' => $id, 'tgl_pinjam' => $tglp, 'tgl_kembali' => $tglk, 'id_anggota' => $this->session->userdata('id_anggota'), 'keterangan' => ucfirst($this->input->post('ket')), 'status' => 'Menunggu Verifikasi');

			$insert = $this->Mpeminjaman->insertData($dataIn);

				$detail = [];
				for ($i=0; $i < $baris; $i++) {
					$this->db->query("UPDATE tb_buku SET jumlah = jumlah - '".$qty[$i]."' WHERE id_buku = '".$buku[$i]."'");
					$detail = array('id_peminjaman' => $id,
										'id_buku' => $buku[$i],
										'qty' => $qty[$i]);
					$detailInput[] = $detail;
				}
				$this->db->insert_batch('tb_detail_pinjam', $detailInput);
				$this->session->set_flashdata('alert', '<div class="alert alert-success">Berhasil, silahkan datang ke petugas perpustakaan untuk diverifikasi!<span class="close" data-dismiss="alert">&times;</span></div>');
				redirect('area_anggota/riwayat');
		}else{
			$this->session->set_flashdata('alert', '<div class="alert alert-danger">Gagal, Anda belum memasukan buku satupun!<span class="close" data-dismiss="alert">&times;</span></div>');
			redirect('area_anggota/pinjambuku');
		}
		
	}

	function get_detail_buku($id=0){
		$d = $this->Mbuku->getDetailBuku($id)->row();
		echo json_encode($d);
	}

	public function perpanjang($id=0){
		$sp = $this->Mpeminjaman->getSp()->row();
		$ctgl = $this->Mpeminjaman->getDetailPeminjaman($id)->row();
		$tgl1 = $ctgl->tgl_kembali;
		$tgl2 = date('Y-m-d', strtotime('+'.$sp->maks_lama_pinjam.' days', strtotime($tgl1)));
		$this->Mpeminjaman->updateData($id, array('tgl_kembali' => $tgl2, 'perpanjang' => 1));
		$this->session->set_flashdata('alert', '<div class="alert alert-success">Selamat, perpanjang periode peminjaman buku berhasil dilakukan!<span class="close" data-dismiss="alert">&times;</span></div>');
		redirect('area_anggota/riwayat');
	}
}