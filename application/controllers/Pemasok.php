<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasok extends CI_Controller {
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
	//data pemasok
	public function index()
	{
		$pemasok 		= $this->pemasok_model->listing();
		$total 			= $this->pemasok_model->total();
		$t_kadaluwarsa 	= $this->obat_model->total_kadaluwarsa();
		$t_habis 		= $this->obat_model->total_habis();

		//validasi input (tambah data pemasok)
		$valid = $this->form_validation;
		//check nama pemasok
		$valid->set_rules('nama_pemasok', 'Nama Pemasok', 'required|is_unique[tabel_pemasok.nama_pemasok]',
			array(	
				'required'		=> '%s harus diisi',
				'is_unique' 	=> '%s sudah ada. Masukkan Nama Pemasok baru'));

		//jika sudah dicek dan error
		if($valid->run() === FALSE) {
			//end validasi

			$data = array(
				'title' 		=> 'Data Pemasok ('.$total->total.')',
				'pemasok' 		=> $pemasok,
				't_kadaluwarsa'	=> $t_kadaluwarsa,
				't_habis'		=> $t_habis,
				'content' 		=> 'pemasok/index');
			$this->load->view('layout/wrapper', $data, FALSE);
		//jika validasi oke, masuk database
		}else{
			$inp =$this->input;
			$data = array( 	
				'nama_pemasok' 	=> $inp->post('nama_pemasok'),
				'alamat' 		=> $inp->post('alamat'),
				'telepon' 		=> $inp->post('telepon'),
			);
		//proses oleh model
			$this->pemasok_model->tambah($data);
		//notif & redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('pemasok'),'refresh');
		}
	//end validasi
	}

	//data tambah pemasok
	public function tambah()
	{		
		//validasi input (tambah data pemasok)
		$valid 			= $this->form_validation;
		$t_kadaluwarsa 	= $this->obat_model->total_kadaluwarsa();
		$t_habis 		= $this->obat_model->total_habis();
		//check nama pemasok
		$valid->set_rules('nama_pemasok', 'Nama Pemasok', 'required|is_unique[tabel_pemasok.nama_pemasok]',
			array(	
				'required'		=> '%s harus diisi',
				'is_unique' 	=> '%s sudah ada. Masukkan Nama Pemasok baru'));

		//jika sudah dicek dan error
		if($valid->run() === FALSE) {
			//end validasi

			$data = array(
				'title' 		=> 'Tambah Pemasok',
				't_kadaluwarsa'	=> $t_kadaluwarsa,
				't_habis'		=> $t_habis,
				'content' 		=> 'pemasok/tambah_baru');
			$this->load->view('layout/wrapper', $data, FALSE);
		//jika validasi oke, masuk database
		}else{
			$inp =$this->input;
			$data = array( 	'nama_pemasok' 	=> $inp->post('nama_pemasok'),
				'alamat' 		=> $inp->post('alamat'),
				'telepon' 		=> $inp->post('telepon'),
			);
		//proses oleh model
			$this->pemasok_model->tambah($data);
		//notif & redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('pemasok'),'refresh');
		}
	//end validasi
	}

	//edit data pemasok
	public function edit($id_pemasok)
	{
		$t_kadaluwarsa 	= $this->obat_model->total_kadaluwarsa();
		$t_habis 		= $this->obat_model->total_habis();
		//panggil data pemasok yang akan diedit
		$pemasok 		= $this->pemasok_model->detail($id_pemasok);

		//validasi input
		$valid 			= $this->form_validation;
		//check nama
		$valid->set_rules('nama_pemasok', 'Nama Pemasok', 'required',
			array(	'required' 		=> '%s harus diisi'));

		//jika sudah dicek dan error
		if($valid->run()===FALSE) {
			//end validasi

			$data = array(
				'title' 		=> 'Edit Data Pengguna: '.$pemasok->nama_pemasok,
				'pemasok' 		=> $pemasok,
				't_kadaluwarsa'	=> $t_kadaluwarsa,
				't_habis'		=> $t_habis,
				'content' 		=> 'pemasok/edit');
			$this->load->view('layout/wrapper', $data, FALSE);
		//jika validasi oke, masuk database
		}else{
			$inp =$this->input;
			$data = array(
				'id_pemasok' 	=> $id_pemasok, 
				'nama_pemasok' 	=> $inp->post('nama_pemasok'),
				'alamat' 		=> $inp->post('alamat'),
				'telepon' 		=> $inp->post('telepon'),
			);

		//proses oleh model
			$this->pemasok_model->edit($data);
		//notif & redirect
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('pemasok'),'refresh');
		}
	//end validasi
	}

	//hapus pemasok
	public function delete ($id_pemasok){
		$data = array('id_pemasok' => $id_pemasok);
		//proses hapus
		$this->pemasok_model->delete($data);
		//notif & redirect
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect (base_url('pemasok'),'refresh');
	}

}

/* End of file Pemasok.php */
/* Location: ./application/controllers/Pemasok.php */