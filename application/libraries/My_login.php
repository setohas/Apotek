<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_login
{
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
		//load model user
		$this->CI->load->model('user_model');
	}

	//1. fungsi untuk login
	public function login($username,$password)
	{
		//check username dan password ke model
		$check = $this->CI->user_model->login($username,$password);
		//jika ada data yang di check, maka login berhasil
		if($check->akses_level=='Kepala Apoteker')
		{
			$id_user	= $check->id_user;
			$nama		= $check->nama_user;
			$akses_level= $check->akses_level;
			$email		= $check->email;
			//proses create session untuk login
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			$this->CI->session->set_userdata('email',$email);
			$this->CI->session->set_userdata('username',$username);
			//end proses create session untuk login
			//redirect ke halaman user
			$this->CI->session->set_flashdata('sukses', 'Anda berhasil login');
			redirect(base_url('user'));
		}elseif($check->akses_level=='Apoteker'){
			$id_user	= $check->id_user;
			$nama		= $check->nama_user;
			$akses_level= $check->akses_level;
			$email		= $check->email;
			//proses create session untuk login
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			$this->CI->session->set_userdata('email',$email);
			$this->CI->session->set_userdata('username',$username);
			//end proses create session untuk login
			//redirect ke halaman dashboard
			$this->CI->session->set_flashdata('sukses', 'Anda berhasil login');
			redirect(base_url('dashboard'));
		}
		else{
			//jika ga ada, maka suruh login lagi. login gagal
			$this->CI->session->set_flashdata('warning', 'Username atau Password salah');
			redirect(base_url('login'));
		}
	}

	// 2. fungsi check login: untuk mengecek status login
	public function check_login()
	{
		//check status login username, jika tidak ada atau kosong, maka direct ke login
		if($this->CI->session->userdata('username')== ""&&
			$this->CI->session->userdata('akses_level')== "")
		{
			//kalau username dan akses level kosong suruh login lagi
			$this->CI->session->set_flashdata('warning', 'anda belum login');
		redirect(base_url('login'));
		}
	}

	// 3. fungsi logout
	public function logout()
	{
		//proses unset session untuk login
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('akses_level');
		$this->CI->session->unset_userdata('email');
		$this->CI->session->unset_userdata('username');
		//end proses unset session untuk logout
		//redirect ke halaman login
		$this->CI->session->set_flashdata('sukses', 'anda berhasil logout');
		redirect(base_url('login'));
	}
}
?>