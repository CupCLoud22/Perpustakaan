<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Koleksi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Mkoleksi');
		$this->load->model('Mwp');
	}

	public function index(){
		$this->load->library('pagination');
		$perpage = 5;
		$page = (@$_GET['page'] == '')? 0 : (@$_GET['page'] * $perpage) - $perpage;

		$config['base_url'] = site_url('koleksi?key='.$_GET['key']);
		$config['per_page'] = $perpage;
		$config['total_rows'] = $this->Mkoleksi->getCountKoleksi();
		$config['use_page_numbers'] = true;
		$config['page_query_string'] = true;
		$config['query_string_segment'] = 'page';
		
		$this->pagination->initialize($config);
		
		$data['buku'] = $this->Mkoleksi->getAllKoleksi($perpage, $page);
		$data['wp'] = $this->Mwp->getWp()->row();

		$data['link'] = $this->pagination->create_links();
		$this->load->view('template_header', $data);
		$this->load->view('koleksi', $data);
		$this->load->view('template_footer');
	}

	public function detail($id=0){
		$data['wp'] = $this->Mwp->getWp()->row();
		$c = $this->Mkoleksi->getDetailKoleksi($id);
		if($c->num_rows() > 0){
			$data['b'] = $c->row();
			$this->load->view('template_header', $data);
			$this->load->view('detail_buku', $data);
			$this->load->view('template_footer');
		}else{
			redirect(base_url());
		}	
	}

	function download_ebook($filename){
		$this->load->helper('download');

		$file = base_url().'ebook/'.$filename;
		$data = file_get_contents($file);
		force_download($filename, $data);
	}
}