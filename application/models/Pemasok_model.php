<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasok_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//ambil data pemasok untuk ditampilkan di dalam tabel
	public function listing(){
		$this->db->select('*');
		$this->db->from('tabel_pemasok');
		$this->db->order_by('id_pemasok', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//ambil detail data pemasok untuk diedit
	public function detail($id_pemasok){
		$this->db->select('*');
		$this->db->from('tabel_pemasok');
		$this->db->where('id_pemasok', $id_pemasok);
		$this->db->order_by('id_pemasok', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//jumlah pengguna
	public function total(){
		$this->db->select('COUNT(*) AS total');
		$this->db->from('tabel_pemasok');
		$this->db->order_by('id_pemasok', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//fungsi hapus
	public function delete($data){
		$this->db->where('id_pemasok', $data['id_pemasok']);
		$this->db->delete('tabel_pemasok', $data);
	}

	//fungsi edit
	public function edit($data){
		$this->db->where('id_pemasok', $data['id_pemasok']);
		$this->db->update('tabel_pemasok', $data);
	}

	//fungsi tambah pemasok 
	public function tambah($data){
		$this->db->insert('tabel_pemasok', $data);
	}
}

/* End of file Pemasok_model.php */
/* Location: ./application/models/Pemasok_model.php */