<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_home extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
//---------------------------------------------------------------------//
	function tampil_home($sampai,$dari){
		$this->db->where('publish','Y')->order_by('nama_barang')->limit($sampai, $dari);
		return $this->db->get('barang')->result_array();
	}
	function tampil_home_termurah($sampai,$dari){
		$this->db->where('publish','Y')->order_by('harga')->limit($sampai, $dari);
		return $this->db->get('barang')->result_array();
	}
	function tampil_home_terbaru($sampai,$dari){
		$this->db->where('publish','Y')->order_by('tanggal','desc')->limit($sampai, $dari);
		return $this->db->get('barang')->result_array();
	}
//---------------------------------------------------------------------//
	function tampil_fashion($sampai,$dari){
		$this->db->where('kategori','fashion')->where('publish','Y')->order_by('nama_barang')->limit($sampai, $dari);
		return $this->db->get('barang')->result_array();
	}
	function tampil_fashion_termurah($sampai,$dari){
		$this->db->where('kategori','fashion')->where('publish','Y')->order_by('harga')->limit($sampai, $dari);
		return $this->db->get('barang')->result_array();
	}
	function tampil_fashion_terbaru($sampai,$dari){
		$this->db->where('kategori','fashion')->where('publish','Y')->order_by('tanggal','desc')->limit($sampai, $dari);
		return $this->db->get('barang')->result_array();
	}
//---------------------------------------------------------------------//
	function tampil_kuliner($sampai,$dari){
		$this->db->where('kategori','kuliner')->where('publish','Y')->order_by('nama_barang')->limit($sampai, $dari);
		return $this->db->get('barang')->result_array();
	}
	function tampil_kuliner_termurah($sampai,$dari){
		$this->db->where('kategori','kuliner')->where('publish','Y')->order_by('harga')->limit($sampai, $dari);
		return $this->db->get('barang')->result_array();
	}
	function tampil_kuliner_terbaru($sampai,$dari){
		$this->db->where('kategori','kuliner')->where('publish','Y')->order_by('tanggal','desc')->limit($sampai, $dari);
		return $this->db->get('barang')->result_array();
	}
//---------------------------------------------------------------------//
	function tampil_jasa($sampai,$dari){
		$this->db->where('kategori','jasa')->where('publish','Y')->order_by('nama_barang')->limit($sampai, $dari);
		return $this->db->get('barang')->result_array();
	}
	function tampil_jasa_termurah($sampai,$dari){
		$this->db->where('kategori','jasa')->where('publish','Y')->order_by('harga')->limit($sampai, $dari);
		return $this->db->get('barang')->result_array();
	}
	function tampil_jasa_terbaru($sampai,$dari){
		$this->db->where('kategori','jasa')->where('publish','Y')->order_by('tanggal','desc')->limit($sampai, $dari);
		return $this->db->get('barang')->result_array();
	}
//---------------------------------------------------------------------//
	function tampil_detail($id){
		$this->db->select('*')->from('barang')->where('id',$id)->where('publish','Y')->order_by('nama_barang');
		$query = $this->db->get();
		return $query->first_row('array');	
	}

	function pesanan($data){
		$this->db->insert('pesanan',$data);
		$id = $this->db->insert_id();
		return $id;
	}

	function pesanan_detail($data_detail){
		$this->db->insert('pesanan_detail',$data_detail);
	}

	function tambah_komentar($input_komentar){
		$this->db->insert('komentar',$input_komentar);
	}

	function tampil_komentar($id){
		$this->db->select('*')->from('komentar')->where('id_barang',$id)->where('tampilkan','Y')->order_by('nama');
		$query = $this->db->get();
		return $query->result_array();	
	}

	function jumlah_komentar($id){
		$this->db->select('id_barang')->from('komentar')->where('id_barang',$id)->where('tampilkan','Y');
		$query = $this->db->get();
		return $query->num_rows();	
	}

	function tampil_cara_pembelian(){
		$this->db->select('isi')->from('cara_pembelian');
		$query = $this->db->get();
		return $query->first_row('array');	
	}

	function cek_pesanan($id,$email){
		$this->db->select('*')->from('pesanan')->where(array('id' => $id,'email' => $email))->order_by('tanggal','desc');
		$query = $this->db->get();
		return $query->result_array();	
	}

	function cek_pesanan_detail($id){
		$this->db->select('*')->where('id_pesanan',$id)->from('pesanan_detail');
		$query = $this->db->get();
		return $query->result_array();	
	}

	function cek_total_pesanan($id){
		$this->db->select('total,totalongkir,berat')->from('pesanan')->where('id',$id)->order_by('tanggal','desc');
		$query = $this->db->get();
		return $query->first_row('array');	
	}

	function baru_pesan($id_pesanan){
		$this->db->select('*')->from('pesanan')->where('id',$id_pesanan);
		$query = $this->db->get();
		return $query->first_row('array');	
	}

	function tambah_request($input_request){
		$this->db->insert('request_barang',$input_request);
	}

	function tambah_resi($input_resi){
		$this->db->insert('resi',$input_resi);
	}

	function resi($id_pesanan){
		$this->db->select('*')->from('resi')->where('id_pesanan',$id_pesanan)->order_by('id','desc');
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function tampil_slider(){
		$this->db->select('*')->from('slider');
		$query = $this->db->get();
		return $query->result_array();	
	}

	function tampil_gambar($id){
		$this->db->select('*')->from('gambar')->where('id_barang',$id);
		$query = $this->db->get();
		return $query->result_array();	
	}

	function tampil_status_request(){
		$this->db->select('*')->from('request_barang')->order_by('tanggal','desc');
		$query = $this->db->get();
		return $query->result_array();	
	}

	function email($email){
		$this->db->select('id')->from('pesanan')->where('email',$email);
		$query = $this->db->get();
		return $query->result_array();	
	}
}