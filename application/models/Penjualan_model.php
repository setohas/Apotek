<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		 $this->load->database();
	}
	//ambil data penjualan untuk ditampilkan di dalam tabel
	public function listing(){
		$this->db->select(	'*');
		$this->db->from('tabel_penjualan');
        $this->db->order_by ('kode_penjualan', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//ambil detail data penjualan untuk diedit
	public function detail($kode_penjualan){
		$this->db->select(	'tabel_penjualan.*,
							 tabel_obat.nama_obat,
							 tabel_obat.harga_jual,
							 ');
		$this->db->from('tabel_penjualan');
		//join tabel
		$this->db->join('tabel_obat', 'tabel_obat.nama_obat = tabel_penjualan.nama_obat', 'left');
		//end join
		// where
		$this->db->where('kode_penjualan', $kode_penjualan);
		$this->db->order_by('kode_penjualan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//jumlah pengguna
	public function total(){
		$this->db->select('COUNT(*) AS total');
		$this->db->from('tabel_penjualan');
		$this->db->order_by('kode_penjualan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//fungsi hapus
	public function delete($data){
		$this->db->where('kode_penjualan', $data['kode_penjualan']);
		$this->db->delete('tabel_penjualan', $data);
	}

	//fungsi edit
	public function edit($data){
		$this->db->where('kode_penjualan', $data['kode_penjualan']);
		$this->db->update('tabel_penjualan', $data);
	}

	//fungsi tambah penjualan 
	public function tambah($data){
		$this->db->insert('tabel_penjualan', $data);
	}

	//fungsi tambah penjualan 
	public function tambah2($data2){
		$this->db->insert_batch('tabel_detail_penjualan', $data2);
	}	

}

/* End of file Penjualan.php */
/* Location: ./application/models/Penjualan.php */