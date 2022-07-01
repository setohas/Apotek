<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
//load model
	public function __construct()
	{
		parent::__construct();
		//proteksi halaman dengan librari my login
		$this->my_login->check_login();
		$this->load->model('user_model');
		$this->load->model('obat_model');

		if($this->session->userdata('akses_level')!='Kepala Apoteker'){
			$this->my_login->check_login();
			$this->session->set_flashdata('warning', 'Anda tidak diijinkan mengakses halaman ini');
			redirect(base_url('login'), 'refresh');
		}
	}
	//data user
	public function index()
	{
		$user = $this->user_model->listing();
		$total = $this->user_model->total();
		$t_kadaluwarsa = $this->obat_model->total_kadaluwarsa();
		$t_habis = $this->obat_model->total_habis();

		//validasi input (tambah data user)
		$valid = $this->form_validation;
		//check nama
		$valid->set_rules('nama_user', 'Nama Lengkap', 'required',
			array(	'required' 		=> '%s harus diisi'));
		//check email
		$valid->set_rules('email', 'Email', 'required|valid_email',
			array(	'required' 		=> '%s harus diisi',
					'valid_email' 	=> '%s tidak valid. Masukkan email yang benar'));
		//check username
		$valid->set_rules('username', 'Username', 'required|is_unique[tabel_pengguna.username]',
			array(	'required'		=> '%s harus diisi',
					'is_unique' 	=> '%s username sudah ada. Masukkan username baru'));
		//check password
		$valid->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]',
			array(	'required' 		=> '%s harus diisi',
					'min_length' 	=> '%s minimal 6 karakter',
					'max_length' 	=> '%s minimal 20 karakter',));

		//jika sudah dicek dan error
		if($valid->run() === FALSE) {
			//end validasi

			$data = array(
				'title' 		=> 'Data Pengguna ('.$total->total.')',
				'user' 			=> $user,
				't_kadaluwarsa'	=> $t_kadaluwarsa,
				't_habis'		=> $t_habis,
				'content' 		=> 'user/index');
			$this->load->view('layout/wrapper', $data, FALSE);
		//jika validasi oke, masuk database
		}else{
			$inp 	= $this->input;
			$data 	= array( 
				'nama_user' 	=> $inp->post('nama_user'),
				'email' 		=> $inp->post('email'),
				'username' 		=> $inp->post('username'),
				'password' 		=> SHA1($inp->post('password')),
				'akses_level' 	=> $inp->post('akses_level')
			);
		//proses oleh model
			$this->user_model->tambah($data);
		//notif & redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('user'),'refresh');
		}
	//end validasi
	}

	//data user
	public function tambah()
	{
		//validasi input (tambah data user)
		$valid 			= $this->form_validation;
		$t_kadaluwarsa 	= $this->obat_model->total_kadaluwarsa();
		$t_habis 		= $this->obat_model->total_habis();
		//check nama
		$valid->set_rules('nama_user', 'Nama Lengkap', 'required',
			array(	'required' 		=> '%s harus diisi'));
		//check email
		$valid->set_rules('email', 'Email', 'required|valid_email',
			array(	'required' 		=> '%s harus diisi',
					'valid_email' 	=> '%s tidak valid. Masukkan email yang benar'));
		//check username
		$valid->set_rules('username', 'Username', 'required|is_unique[tabel_pengguna.username]',
			array(	'required'		=> '%s harus diisi',
					'is_unique' 	=> '%s username sudah ada. Masukkan username baru'));
		//check password
		$valid->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]',
			array(	'required' 		=> '%s harus diisi',
					'min_length' 	=> '%s minimal 6 karakter',
					'max_length' 	=> '%s minimal 20 karakter',));

		//jika sudah dicek dan error
		if($valid->run() === FALSE) {
			//end validasi

			$data = array(
				'title' 		=> 'Tambah Pengguna Baru',
				't_kadaluwarsa'	=> $t_kadaluwarsa,
				't_habis'		=> $t_habis,
				'content' 		=> 'user/tambah_baru');
			$this->load->view('layout/wrapper', $data, FALSE);
		//jika validasi oke, masuk database
		}else{
			$inp =$this->input;
			$data = array( 
				'nama_user' 	=> $inp->post('nama_user'),
				'email' 		=> $inp->post('email'),
				'username' 		=> $inp->post('username'),
				'password' 		=> SHA1($inp->post('password')),
				'akses_level' 	=> $inp->post('akses_level')
			);
		//proses oleh model
			$this->user_model->tambah($data);
		//notif & redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('user'),'refresh');
		}
	//end validasi
	}

	//edit data user
	public function edit($id_user)
	{
		$t_kadaluwarsa = $this->obat_model->total_kadaluwarsa();
		$t_habis = $this->obat_model->total_habis();
		//panggil data user yang akan diedit
		$user = $this->user_model->detail($id_user);

		//validasi input
		$valid = $this->form_validation;
		//check nama
		$valid->set_rules('nama_user', 'Nama Lengkap', 'required',
			array(	'required' 		=> '%s harus diisi'));
		//check email
		$valid->set_rules('email', 'Email', 'required|valid_email',
			array(	'required' 		=> '%s harus diisi',
					'valid_email' 	=> '%s tidak valid. Masukkan email yang benar'));

		//jika sudah dicek dan error
		if($valid->run()===FALSE) {
			//end validasi

			$data = array(
				'title' 		=> 'Edit Data Pengguna: '.$user->nama_user,
				'user' 			=> $user,
				't_kadaluwarsa'	=> $t_kadaluwarsa,
				't_habis'		=> $t_habis,
				'content'		=> 'user/edit');
			$this->load->view('layout/wrapper', $data, FALSE);
		//jika validasi oke, masuk database
		}else{
			$inp =$this->input;
		//cek panjang passowrd, jika password lebih dari 6 karakter, password diganti
		//jika password lebih dari 20 karakter password tidak diganti
			if(strlen($inp->post('password')) >= 6 || strlen($inp->post('password')) <= 20) {
			//password diganti
				$data = array(
					'id_user' 		=> $id_user, 
					'nama_user' 	=> $inp->post('nama_user'),
					'email' 		=> $inp->post('email'),
					'username'		=> $inp->post('username'),
					'password' 		=> SHA1($inp->post('password')),
					'akses_level' 	=> $inp->post('akses_level')
				);

			}else{
			//kalau password kurang dari 6 karakter atau lebih dari 20 karakterpassword tidak diganti
				$data = array(
					'id_user' 		=> $id_user, 
					'nama_user' 	=> $inp->post('nama_user'),
					'email' 		=> $inp->post('email'),
					'akses_level' 	=> $inp->post('akses_level')
				);

			}		
		//proses oleh model
			$this->user_model->edit($data);
		//notif & redirect
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('user'),'refresh');
		}
	//end validasi
	}

	//hapus user
	public function delete ($id_user){
		$data = array('id_user' => $id_user);
		//proses hapus
		$this->user_model->delete($data);
		//notif & redirect
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect (base_url('user'),'refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */