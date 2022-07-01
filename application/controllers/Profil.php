<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('obat_model');
	}


	// update profil
	public function index()
	{
		$t_kadaluwarsa = $this->obat_model->total_kadaluwarsa();
		$t_habis = $this->obat_model->total_habis();


		//panggil data user yang akan diedit
		$id_user= $this->session->userdata('id_user');
		$user 	= $this->user_model->detail($id_user);

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
				'title' 		=> 'Edit Profil: '.$user->nama_user,
				'user' 			=> $user,
				't_kadaluwarsa'	=> $t_kadaluwarsa,
				't_habis'		=> $t_habis,
				'content'		=> 'profil/index');
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

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */