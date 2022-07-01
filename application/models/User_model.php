<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//ambil data user untuk ditampilkan di dalam tabel
	public function listing(){
		$this->db->select('*');
		$this->db->from('tabel_pengguna');
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//ambil detail data user untuk diedit
	public function detail($id_user){
		$this->db->select('*');
		$this->db->from('tabel_pengguna');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//fungsi login
	public function login($username, $password){
		$this->db->select('*');
		$this->db->from('tabel_pengguna');
		$this->db->where(array(	'username'=> $username,
								'password'=> sha1($password)
							));
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//jumlah pengguna
	public function total(){
		$this->db->select('COUNT(*) AS total');
		$this->db->from('tabel_pengguna');
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//fungsi hapus
	public function delete($data){
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('tabel_pengguna', $data);
	}

	//fungsi edit
	public function edit($data){
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('tabel_pengguna', $data);
	}

	//fungsi tambah user 
	public function tambah($data){
		$this->db->insert('tabel_pengguna', $data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */