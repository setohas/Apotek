<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//ambil data obat untuk ditampilkan di dalam tabel
	public function listing(){
		$this->db->select('*');
		$this->db->from('tabel_obat');
		$this->db->order_by('id_obat', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//ambil detail data obat untuk diedit
	public function detail($id_obat){
		$this->db->select('*');
		$this->db->from('tabel_obat');
		$this->db->where('id_obat', $id_obat);
		$this->db->order_by('id_obat', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//ambil data obat kadaluwarsa
	public function kadaluwarsa(){
		$results = array();
		$query = $this->db->query('SELECT * FROM tabel_obat WHERE stok > 0 AND kadaluwarsa BETWEEN DATE_SUB(NOW(), INTERVAL 40 YEAR) AND NOW()');

		if($query->num_rows() > 0) {
		        $results = $query->result();
	    	}
	    	return $results;

		}

	//ambil data obat kadaluwarsa
	public function hampir_kadaluwarsa(){
		$results = array();
		$query = $this->db->query('SELECT * FROM tabel_obat WHERE stok > 0 AND kadaluwarsa BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 60 DAY)');

		if($query->num_rows() > 0) {
		        $results = $query->result();
	    	}
	    	return $results;

		}

		public function total_kadaluwarsa(){
			$query = $this->db->query('SELECT count(tabel_obat.kadaluwarsa) AS total FROM tabel_obat WHERE stok > 0 AND kadaluwarsa BETWEEN DATE_SUB(NOW(), INTERVAL 40 YEAR) AND NOW()');
			return $query->row();
		}

		public function total_hampir_kadaluwarsa(){
			$query = $this->db->query('SELECT count(tabel_obat.kadaluwarsa) AS total FROM tabel_obat WHERE stok > 0 AND kadaluwarsa BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 60 DAY)');
			return $query->row();
		}

	//ambil data obat habis
	public function habis(){
		$results = array();
		$this->db->select('*');
		$this->db->from('tabel_obat');
		$this->db->where('stok =', 0);
		$this->db->order_by('id_obat', 'desc');
		$query = $this->db->get();

			if($query->num_rows() > 0) {
	        $results = $query->result();
    	}
    	return $results;
	}

	public function total_habis(){
		$this->db->select('COUNT(tabel_obat.stok) AS total');
		$this->db->from('tabel_obat');
		$this->db->where('stok =', 0);
		$query = $this->db->get();
		return $query->row();
	}

	//stok obat kurang dari 8
	public function hampir_habis(){
		$results = array();
		$this->db->select('*');
		$this->db->from('tabel_obat');
		$this->db->where('stok >=', 1);
		$this->db->where('stok <', 10);
		$this->db->order_by('id_obat', 'desc');
		$query = $this->db->get();

			if($query->num_rows() > 0) {
	        $results = $query->result();
    	}
    	return $results;
	}

	public function total_hampir_habis(){
		$this->db->select('COUNT(tabel_obat.stok) AS total');
		$this->db->from('tabel_obat');
		$this->db->where('stok >=', 1);
		$this->db->where('stok <', 10);
		$this->db->order_by('id_obat', 'desc');
		$query = $this->db->get();
		return $query->row();
	}


	//fungsi login
	public function login($obatname, $password){
		$this->db->select('*');
		$this->db->from('tabel_obat');
		$this->db->where(array(	'obatname'=> $obatname,
								'password'=> sha1($password)
							));
		$this->db->order_by('id_obat', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//jumlah pengguna
	public function total(){
		$this->db->select('COUNT(*) AS total');
		$this->db->from('tabel_obat');
		$this->db->order_by('id_obat', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function stok_obat(){       
      $this->db->select('SUM(tabel_obat.stok) AS total');
		$this->db->from('tabel_obat');
		$this->db->order_by('id_obat', 'desc');
		$query = $this->db->get();
		return $query->row();
    }


	//fungsi hapus
	public function delete($data){
		$this->db->where('id_obat', $data['id_obat']);
		$this->db->delete('tabel_obat', $data);
	}

	//fungsi edit
	public function edit($data){
		$this->db->where('id_obat', $data['id_obat']);
		$this->db->update('tabel_obat', $data);
	}

	//fungsi tambah obat 
	public function tambah($data){
		$this->db->insert('tabel_obat', $data);
	}

	//ambil data obat untuk transaksi jual
	public function obat_jual(){
		$results = array();
		$query = $this->db->query('SELECT * FROM tabel_obat WHERE stok > 0 AND kadaluwarsa BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 60 YEAR)');

		if($query->num_rows() > 0) {
		        $results = $query->result();
	    	}
	    	return $results;

		}

	//fungsi Ajax
	public function getAjax($id_obat){
		$this->db->select('*');
		$this->db->from('tabel_obat');
		$this->db->where('id_obat', $id_obat);
		$this->db->order_by('id_obat', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file Obat_model.php */
/* Location: ./application/models/Obat_model.php */