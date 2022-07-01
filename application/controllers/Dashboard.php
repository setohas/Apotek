<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	//load model, library dll
	public function __construct()
	{
		parent::__construct();
		//panggil fungsi cek login
		$this->my_login->check_login();

		$this->load->model('obat_model');
		$this->load->model('pemasok_model');
		$this->load->model('penjualan_model');
		//$this->load->model('pembelian_model');
		$this->load->model('user_model');

		if($this->session->userdata('akses_level')=='Kepala Apoteker'){
			$this->my_login->check_login();
			$this->session->set_flashdata('warning', 'Anda tidak diijinkan mengakses halaman ini');
			redirect(base_url('login'), 'refresh');
		}
		
	}

	//Main Page Dashboard
	public function index()
	{
		// Data total per tabel
		$obat = $this->obat_model->total();
		$stok = $this->obat_model->stok_obat();
		$t_kadaluwarsa = $this->obat_model->total_kadaluwarsa();
		$th_kadaluwarsa = $this->obat_model->total_hampir_kadaluwarsa();
		$t_habis = $this->obat_model->total_habis();
		$th_habis = $this->obat_model->total_hampir_habis();
		$pemasok =$this->pemasok_model->total();
		$penjualan =$this->penjualan_model->total();
		//$pembelian =$this->pembelian_model->total();
		$user =$this->user_model->total();
		// End data tabel
		$data = array(	'title' 	=> 'Halaman Dashboard', 
			'obat'		=> $obat,
			'stok'		=> $stok,
			't_kadaluwarsa'	=> $t_kadaluwarsa,
			'th_kadaluwarsa'=> $th_kadaluwarsa,
			't_habis'	=> $t_habis,
			'th_habis'	=> $th_habis,
			'pemasok'	=> $pemasok,
			'penjualan'	=> $penjualan,
						//'pembelian'	=> $pembelian,
			'user'		=> $user,
			'content' => 'dashboard/index');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */