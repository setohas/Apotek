<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {
//load model
	public function __construct()
	{
		parent::__construct();
		//proteksi halaman dengan librari my login
		$this->my_login->check_login();
		$this->load->model('obat_model');
		$this->load->model('pemasok_model');

		if($this->session->userdata('akses_level')=='Kepala Apoteker'){
			$this->my_login->check_login();
			$this->session->set_flashdata('warning', 'Anda tidak diijinkan mengakses halaman ini');
			redirect(base_url('login'), 'refresh');
		}
	}
	//data obat
	public function index()
	{
		$obat 	= $this->obat_model->listing();		
		$total 	= $this->obat_model->total();
		$pemasok= $this->pemasok_model->listing();
		$t_kadaluwarsa = $this->obat_model->total_kadaluwarsa();
		$t_habis = $this->obat_model->total_habis();

		//validasi input (tambah data obat)
		$valid = $this->form_validation;
		//check nama
		$valid->set_rules('nama_obat', 'Nama obat', 'required|is_unique[tabel_obat.nama_obat]',
			array(	'required'		=> '%s harus diisi',
					'is_unique' 	=> '%s sudah ada. Masukkan nama obat baru'));

		//jika sudah dicek dan error
		if($valid->run() === FALSE) {
			//end validasi

			$data = array(
				'title' 	=> 'Lihat Data Obat ('.$total->total.')',
				'obat' 		=> $obat,
				't_kadaluwarsa'	=> $t_kadaluwarsa,
				't_habis'	=> $t_habis,
				'pemasok'	=> $pemasok,
				'content' 	=> 'obat/index');
			$this->load->view('layout/wrapper', $data, FALSE);
		//jika validasi oke, masuk database
		}else{
			$inp =$this->input;
			$data = array( 	
				'nama_obat' 	=> $inp->post('nama_obat'),
				'stok' 			=> $inp->post('stok'),
				'penyimpanan' 	=> $inp->post('penyimpanan'),
				'bentuk' 		=> $inp->post('bentuk'),
				'kadaluwarsa' 	=> date('y-m-d',strtotime($inp->post('kadaluwarsa'))),
				'deskripsi' 	=> $inp->post('deskripsi'),
				'harga_beli' 	=> $inp->post('harga_beli'),
				'harga_jual' 	=> $inp->post('harga_jual'),
				'nama_pemasok' 	=> $inp->post('nama_pemasok'),
			);
		//proses oleh model
			$this->obat_model->tambah($data);
		//notif & redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('obat'),'refresh');
		}
	//end validasi, masuk database
	}

		//tambah data obat
	public function tambah()
	{
		// ambil data pemasok
		$pemasok = $this->pemasok_model->listing();

		$t_kadaluwarsa = $this->obat_model->total_kadaluwarsa();
		$t_habis = $this->obat_model->total_habis();

		//validasi input (tambah data obat)
		$valid = $this->form_validation;
		//check nama
		$valid->set_rules('nama_obat', 'Nama Obat', 'required|is_unique[tabel_obat.nama_obat]',
			array(	'required'		=> '%s harus diisi',
					'is_unique' 	=> '%s sudah ada. Masukkan nama obat baru'));

		//jika sudah dicek dan error
		if($valid->run() === FALSE) {
			//end validasi

			$data = array(	
				'title' 	=> 'Tambah Obat Baru',
				'pemasok'	=> $pemasok,
				't_kadaluwarsa'	=> $t_kadaluwarsa,
				't_habis'	=> $t_habis,
				'content'	=> 'obat/tambah_baru');
			$this->load->view('layout/wrapper', $data, FALSE);
		//jika validasi oke, masuk database
		}else{
			$inp =$this->input;
			$data = array( 	'nama_obat' 	=> $inp->post('nama_obat'),
				'stok' 			=> $inp->post('stok'),
				'penyimpanan' 	=> $inp->post('penyimpanan'),
				'bentuk' 		=> $inp->post('bentuk'),
				'kadaluwarsa' 	=> date('y-m-d',strtotime($inp->post('kadaluwarsa'))),
				'deskripsi' 	=> $inp->post('deskripsi'),
				'harga_beli' 	=> $inp->post('harga_beli'),
				'harga_jual' 	=> $inp->post('harga_jual'),
				'nama_pemasok' 	=> $inp->post('nama_pemasok'),
			);
		//proses oleh model
			$this->obat_model->tambah($data);
		//notif & redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('obat'),'refresh');
		}
	//end validasi
	}

	//edit data obat
	public function edit($id_obat)
	{
		//panggil data obat yang akan diedit
		$obat = $this->obat_model->detail($id_obat);
		$pemasok = $this->pemasok_model->listing();
		$t_kadaluwarsa = $this->obat_model->total_kadaluwarsa();
		$t_habis = $this->obat_model->total_habis();

		//validasi input
		$valid = $this->form_validation;
		//check nama
		$valid->set_rules('nama_obat', 'Nama Obat', 'required',
			array(	'required' 		=> '%s harus diisi'));

		//jika sudah dicek dan error
		if($valid->run()===FALSE) {
			//end validasi

			$data = array(	
				'title' 	=> 'Edit Data Obat: '.$obat->nama_obat,
				'obat' 		=> $obat,
				'pemasok'	=> $pemasok,
				't_kadaluwarsa'	=> $t_kadaluwarsa,
				't_habis'	=> $t_habis,
				'content' 	=> 'obat/edit');
			$this->load->view('layout/wrapper', $data, FALSE);
		//jika validasi oke, masuk database
		}else{
			$inp =$this->input;

			$data = array(
				'id_obat' 		=> $id_obat, 
				'nama_obat' 	=> $inp->post('nama_obat'),
				'stok' 			=> $inp->post('stok'),
				'penyimpanan' 	=> $inp->post('penyimpanan'),
				'bentuk' 		=> $inp->post('bentuk'),
				'kadaluwarsa' 	=> date('y-m-d',strtotime($inp->post('kadaluwarsa'))),
				'deskripsi' 	=> $inp->post('deskripsi'),
				'harga_beli' 	=> $inp->post('harga_beli'),
				'harga_jual' 	=> $inp->post('harga_jual'),
				'nama_pemasok' 		=> $inp->post('nama_pemasok'),
			);

		//proses oleh model
			$this->obat_model->edit($data);
		//notif & redirect
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('obat'),'refresh');
		}
	//end validasi
	}

	//detail obat
	public function detail($id_obat){
		$obat 			= $this->obat_model->detail($id_obat);
		$t_kadaluwarsa 	= $this->obat_model->total_kadaluwarsa();
		$t_habis 		= $this->obat_model->total_habis();
		$data 			= array(	
			'title' 	=> 'Detail Data Obat: '.$obat->nama_obat,
			'obat' 		=> $obat,
			't_kadaluwarsa'	=> $t_kadaluwarsa,
			't_habis'	=> $t_habis,
			'content' 	=> 'obat/detail');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//cetak
	public function cetak($id_obat){
		$obat = $this->obat_model->detail($id_obat);
		$data = array(	
			'title' => $obat->nama_obat,
			'obat' => $obat
		);
		$this->load->view('obat/cetak', $data, FALSE);
	}

	//hapus obat
	public function delete ($id_obat){
		$data = array('id_obat' => $id_obat);
		//proses hapus
		$this->obat_model->delete($data);
		//notif & redirect
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect (base_url('obat'),'refresh');
	}

	//obat kadaluwarsa
	public function kadaluwarsa(){
		$obat 			= $this->obat_model->kadaluwarsa();
		$h_obat 		= $this->obat_model->hampir_kadaluwarsa();
		$t_kadaluwarsa 	= $this->obat_model->total_kadaluwarsa();
		$t_habis 		= $this->obat_model->total_habis();
		$data 			= array(	
			'title' 	=> 'Daftar Obat Kadaluwarsa',
			'obat' 		=> $obat,
			'h_obat'	=> $h_obat,
			't_kadaluwarsa'	=> $t_kadaluwarsa,
			't_habis'	=> $t_habis,
			'content' 	=> 'obat/kadaluwarsa');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//stok obat habis
	public function habis(){
		$obat 			= $this->obat_model->habis();
		$h_obat 		= $this->obat_model->hampir_habis();
		$t_kadaluwarsa 	= $this->obat_model->total_kadaluwarsa();
		$t_habis 		= $this->obat_model->total_habis();
		$data 			= array(	
			'title' 	=> 'Data Obat Habis',
			'obat' 		=> $obat,
			'h_obat'	=> $h_obat,
			't_kadaluwarsa'	=> $t_kadaluwarsa,
			't_habis'	=> $t_habis,
			'content' 	=> 'obat/habis');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function getAjax($id_obat = null)
    {
        $obat = $this->obat_model->getAjax($id_obat);
        $obat = json_encode($obat);
        echo $obat;
    }
}

/* End of file Obat.php */
/* Location: ./application/controllers/Obat.php */