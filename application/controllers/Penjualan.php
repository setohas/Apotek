<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public $array_obat = [];

	public function __construct()
	{
		parent::__construct();
		$this->load->model('obat_model');
		$this->load->model('penjualan_model');
		if($this->session->userdata('akses_level')=='Kepala Apoteker'){
			$this->my_login->check_login();
			$this->session->set_flashdata('warning', 'Anda tidak diijinkan mengakses halaman ini');
			redirect(base_url('login'), 'refresh');
		}
	}

	//ambil data penjualan
	public function index()
	{
		$penjualan 		= $this->penjualan_model->listing();
		$total 			= $this->penjualan_model->total();
		$obat			= $this->obat_model->listing();
		$t_kadaluwarsa 	= $this->obat_model->total_kadaluwarsa();
		$t_habis 		= $this->obat_model->total_habis();

		$data = array(
			'title' 	=> 'Data Penjualan Obat ('.$total->total.')',
			'penjualan'	=> $penjualan,
			'obat'		=> $obat,
			't_kadaluwarsa'	=> $t_kadaluwarsa,
			't_habis'	=> $t_habis,
			'content' 	=> 'penjualan/index');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//tambah penjualan
	public function tambah()
	{

		//ambil data obat
		$obat 			= $this->obat_model->obat_jual();
		$t_kadaluwarsa 	= $this->obat_model->total_kadaluwarsa();
		$t_habis 		= $this->obat_model->total_habis();
		//kode penjualan acak
		$karakter 		= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
		$kode_penjualan = substr(str_shuffle($karakter), 0, 20);

		// validasi
		$this->form_validation->set_rules('nama_pembeli','Nama Pembeli','required',
			array( 'required' => '%s belum dimasukkan' ));

		$this->form_validation->set_rules('tanggal_jual','Tanggal Transaksi','required',
			array( 'required' => '%s belum dimasukkan' ));

		$this->form_validation->set_rules('data_obat','Obat','required',
			array( 'required' => '%s belum dipilih' ));

		if($this->form_validation->run()===FALSE){
			// end validasi

			$data = array(	
				'title'				=> 'Tambah Penjualan Baru',
				'obat' 				=> $obat,
				't_kadaluwarsa'		=> $t_kadaluwarsa,
				't_habis'			=> $t_habis,
				'kode_penjualan'	=> $kode_penjualan,
				'content' 			=> 'penjualan/tambah');
			$this->load->view('layout/wrapper', $data, FALSE);
			
		}else{
			$inp 	=$this->input;
			$data 	= array( 	
				'kode_penjualan' 	=> $inp->post('kode_penjualan'),
				'nama_pembeli' 		=> $inp->post('nama_pembeli'),
				'tanggal_jual' 		=> date('y-m-d',strtotime($inp->post('tanggal_jual'))),
				'grandtotal' 		=> $inp->post('grandtotal'),
			);
			$this->penjualan_model->tambah($data);
			
			$data2= [];
			foreach($this->array_obat AS $key => $obat){
			$data2[$key] = [
				'kode_penjualan'	=> $inp->post('kode_penjualan'),
				'id_obat' 			=> $obat->id_obat,
				'banyak'			=> $obat->jumlah,
				'subtotal'			=> $obat->total,
			];
		}
		//proses oleh model
			$this->penjualan_model->tambah2($data2);
			
		//notif & redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('penjualan'),'refresh');
		}
	//end validasi, masuk database
	}

	// edit penjualan
	public function edit($kode_penjualan){
	// ambil data penjualan yang akan diedit
		$penjualan 	= $this->penjualan_model->detail($kode_penjualan);
		//ambil data obat
		$obat 		= $this->obat_model->listing();

		// validasi
		$this->form_validation->set_rules(
			'nama_obat','Obat','required',
			array( 'required' => '%s belum dipilih' ));

		if($this->form_validation->run()===FALSE){
			// end validasi		}

			$data = array(	
				'title'		=> 'Edit Penjualan Baru',
				'obat' 		=> $obat,
				'$Penjualan'=> $penjualan,
				'content' 	=> 'penjualan/edit');
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			$inp 	=$this->input;
			$data 	= array( 	
				'kode_penjualan'	=> $kode_penjualan,
				'kode_penjualan'=> $kode_penjualan,
				'nama_obat' 	=> $inp->post('nama_obat'),
				'harga_jual' 	=> $inp->post('harga_jual'),
				'banyak' 		=> $inp->post('banyak'),
				'subtotal' 		=> $inp->post('subtotal'),
				'tanggal_jual' 	=> date('y-m-d',strtotime($inp->post('tanggal_jual'))),
				'nama_pembeli' 	=> $inp->post('nama_pembeli'),
				'grandtotal' 	=> $inp->post('grandtotal'),
			);
		//proses oleh model
			$this->penjualan_model->edit($data);
		//notif & redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('penjualan'),'refresh');
		}
	//end validasi, masuk database
	}

	//hapus obat
	public function delete ($kode_penjualan){
		$data = array('kode_penjualan' => $kode_penjualan);
		//proses hapus
		$this->penjualan_model->delete($data);
		//notif & redirect
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect (base_url('penjualan'),'refresh');
	}
}

/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */