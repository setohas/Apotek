<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('obat_model');
	}

	public function index()
	{
		$t_kadaluwarsa 	= $this->obat_model->total_kadaluwarsa();
		$t_habis 		= $this->obat_model->total_habis();
		$data = array(
				'title' 		=> 'Laporan Transaksi ',
				't_kadaluwarsa'	=> $t_kadaluwarsa,
				't_habis'		=> $t_habis,
				'content'		=> 'laporan/index');
			$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */