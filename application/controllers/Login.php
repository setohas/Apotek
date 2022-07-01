<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// halaman login administrator
	public function index()
	{
		//validasi input untuk login
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//check inputan login
		$this->form_validation->set_rules('username', 'Username', 'required',
			array(	'required' 		=> '%s harus diisi'));
		$this->form_validation->set_rules('password', 'Password', 'required',
			array(	'required' 		=> '%s harus diisi'));

		//proses ke library my_login
		if($this->form_validation->run()){
			$this->my_login->login($username, $password);
		}
		//end validasi untuk input login
		$data = array('title' => 'Halaman Login' );
		$this->load->view('login/index', $data, FALSE);
	}

	//fungsi logout
	public function logout()
	{
		//memanggil fungsi logout dari library My_login
		$this->my_login->logout();
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */