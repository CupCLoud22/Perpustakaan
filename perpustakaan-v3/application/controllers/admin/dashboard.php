<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('log_admin') != true){
			redirect('auth');
		}
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Dashboard';
		$data['anggota'] = $this->db->count_all('tb_anggota');
		$data['buku'] = $this->db->count_all('tb_buku');
		$data['pengunjung'] = $this->db->count_all('tb_buku_tamu');
		$data['peminjaman'] = $this->db->count_all('tb_peminjaman');
		$data['populer'] = $this->db->query("SELECT tb_detail_pinjam.id_buku, judul, pengarang, COUNT(tb_detail_pinjam.id_buku) AS ttlbuku FROM tb_detail_pinjam INNER JOIN tb_buku ON tb_buku.id_buku = tb_detail_pinjam.id_buku GROUP BY tb_detail_pinjam.id_buku ORDER BY ttlbuku DESC LIMIT 3");
		$this->load->view('admin/boundle_header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/boundle_footer');
	}

	public function get_pinjam_minggu(){
		$bln = date('m');
		if($this->input->post('bln')){
			$bln = $this->input->post('bln');
		}
		$date1 = date('Y-').$bln.'-1';
		$date2 = date('Y-').$bln.'-31';
		$query = $this->db->query("SELECT tgl_pinjam as bln, COUNT(id_peminjaman) as ttl FROM tb_peminjaman WHERE year(tgl_pinjam) = '".date('Y')."' AND tgl_pinjam BETWEEN '".$date1."' AND '".$date2."' GROUP BY tgl_pinjam");

		$begin = new DateTime( $date1 ); //or given date
		$end = new DateTime( $date2 );
		$end = $end->modify( '+1 day' ); 
		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($begin, $interval ,$end);

		$chartData =[]; 
		$data_arr = [];
		$array = [];
		// echo $query->num_rows();
		foreach ($query->result_array() as $k) {
		 	$data_arr['date'] = $k['bln'];
		 	$data_arr['qty'] = $k['ttl'];
		 	$array[] = $data_arr;
		 } 

		foreach($daterange as $date){
		    $dataKey = array_search($date->format("Y-m-d"), array_column($array, 'date'));
		    if ($dataKey !== false) { // if we have the data in given date
		        $chartData[$date->format("Y-m-d")] = $array[$dataKey]['qty'];
		    }else {
		        //if there is no record, create default values
		        $chartData[$date->format("Y-m-d")] = 0;
		    }
		}

		$data['tgl'] = array_keys($chartData);
		$data['nilai'] = array_values($chartData);
		echo json_encode($data);
	}

	public function get_pengunjung(){
		$bln = date('m');
		if($this->input->post('bln')){
			$bln = $this->input->post('bln');
		}
		$date1 = date('Y-').$bln.'-1';
		$date2 = date('Y-').$bln.'-31';
		$query = $this->db->query("SELECT date(tgl_tamu) as bln, COUNT(id_tamu) as ttl FROM tb_buku_tamu WHERE year(tgl_tamu) = '".date('Y')."' AND date(tgl_tamu) BETWEEN '".$date1."' AND '".$date2."' GROUP BY date(tgl_tamu)");
		
		$begin = new DateTime( $date1 ); //or given date
		$end = new DateTime( $date2 );
		$end = $end->modify( '+1 day' ); 
		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($begin, $interval ,$end);

		$chartData =[]; 
		$data_arr = [];
		$array = [];
		// echo $query->num_rows();
		foreach ($query->result_array() as $k) {
		 	$data_arr['date'] = $k['bln'];
		 	$data_arr['qty'] = $k['ttl'];
		 	$array[] = $data_arr;
		 } 

		foreach($daterange as $date){
		    $dataKey = array_search($date->format("Y-m-d"), array_column($array, 'date'));
		    if ($dataKey !== false) { // if we have the data in given date
		        $chartData[$date->format("Y-m-d")] = $array[$dataKey]['qty'];
		    }else {
		        //if there is no record, create default values
		        $chartData[$date->format("Y-m-d")] = 0;
		    }
		}

		$data['tgl'] = array_keys($chartData);
		$data['nilai'] = array_values($chartData);
		echo json_encode($data);
	}

	public function get_pinjam_terakhir(){
		$this->db->order_by('id_peminjaman', 'DESC');
		$this->db->limit(5);
		$this->db->join('tb_anggota', 'tb_anggota.id_anggota = tb_peminjaman.id_anggota', 'left');
		$pinjam = $this->db->get('tb_peminjaman');
		$html = '';
		if($pinjam->num_rows() > 0){
		foreach ($pinjam->result() as $p) {
			if($p->status == 'Menunggu Verifikasi'){
                      $label = 'label-warning';
                    }elseif($p->status == 'Pinjam'){
                      $label = 'label-danger';
                    }elseif($p->status == 'Kembali'){
                      $label = 'label-info';
                    }
			echo '<tr><td>'.$p->id_peminjaman.'</td><td>'.$p->tgl_pinjam.'</td><td>'.$p->nm_anggota.'</td><td>'.$p->tgl_kembali.'</td><td><label class="label '.$label.'">'.$p->status.'</label></td></tr>';
		}}else{
			echo '<tr><td colspan="5" class="text-danger">Saat ini belum ada transaksi peminjaman buku</td></tr>';
		}
	}
}