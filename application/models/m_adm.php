<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_adm extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function tambah_barang($input_barang){
		
		$this->db->insert('barang',$input_barang);
	}

	function tampil_barang(){
		$this->db->select('*')->from('barang')->order_by('tanggal',"desc");
		$query = $this->db->get();
		return $query->result_array();	
	}

	function delete_barang($id){
		$this->db->where('id',$id);
		$this->db->delete('barang');
	}

	function image_barang($id){
		$this->db->select('gambar')->from('barang')->where('id',$id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function tampil_barang_edit($id){
		$this->db->select('*')->from('barang')->where('id',$id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function tampil_barang_view($id){
		$this->db->select('*')->from('barang')->where('id',$id)->order_by('nama_barang');
		$query = $this->db->get();
		return $query->first_row('array');	
	}

	function edit_barang($id,$edit_barang){
		$this->db->where('id', $id);
		$this->db->update('barang', $edit_barang); 
	}

	function tampil_pesanan(){
		$this->db->select('*')->from('pesanan')->order_by('tanggal','desc');
		$query = $this->db->get();
		return $query->result_array();	
	}

	function tampil_pesanan_detail($id){
		$this->db->select('*')->where('id_pesanan',$id)->from('pesanan_detail');
		$query = $this->db->get();
		return $query->result_array();	
	}

	function tampil_pemesan($id){
		$this->db->select('*')->from('pesanan')->where('id',$id)->order_by('tanggal','desc');
		$query = $this->db->get();
		return $query->result_array();	
	}

	function total_pesanan($id){
		$this->db->select('total,totalongkir')->from('pesanan')->where('id',$id);
		$query = $this->db->get();
		return $query->first_row('array');	
	}

	function delete_pesanan($id){
		$this->db->where('id_pesanan',$id);
		$this->db->delete('pesanan_detail');
		$this->db->where('id',$id);
		$this->db->delete('pesanan');
	}

	function edit_proses($id,$edit_proses){
		$this->db->where('id', $id);
		$this->db->update('pesanan', $edit_proses); 
	}

	function edit_proses_batal($id,$edit_proses){
		$this->db->where('id', $id);
		$this->db->update('pesanan', $edit_proses); 
	}

	function edit_request($id,$edit_proses){
		$this->db->where('id', $id);
		$this->db->update('request_barang', $edit_proses); 
	}

	function edit_request_batal($id,$edit_proses){
		$this->db->where('id', $id);
		$this->db->update('request_barang', $edit_proses); 
	}
	
	function login($username,$password){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get();
		return $query->first_row('array');	
	}
	
	function tampil_user(){
		$this->db->select('*')->from('user');
		$query = $this->db->get();
		return $query->first_row('array');	
	}
	
	function edit_user($id,$edit_user){
		$this->db->where('id', $id);
		$this->db->update('user', $edit_user); 
	}

	function tampil_komentar(){
		$this->db->select('*')->from('komentar')->order_by('tanggal','desc');
		$query = $this->db->get();
		return $query->result_array();	
	}

	function delete_komentar($id){
		$this->db->where('id',$id);
		$this->db->delete('komentar');
	}

	function delete_komen($id){
		$this->db->where('id_barang',$id);
		$this->db->delete('komentar');
	}

	function balas_komentar($id,$data_balas){
		$this->db->where('id', $id);
		$this->db->update('komentar', $data_balas); 
	}

	function data_barang($id){
		$this->db->select('id,kategori,nama_barang')->from('barang')->where('id',$id);
		$query = $this->db->get();
		return $query->first_row('array');	
	}

	function tampil_cara_pembelian(){
		$this->db->select('isi')->from('cara_pembelian');
		$query = $this->db->get();
		return $query->first_row('array');	
	}

	function edit_cara_pembelian($id,$data_isi){
		$this->db->where('id',$id);
		$this->db->update('cara_pembelian',$data_isi);
	}

	function tampil_request(){
		$this->db->select('*')->from('request_barang');
		$query = $this->db->get();
		return $query->result_array();	
	}

	function image_request($id){
		$this->db->select('gambar')->from('request_barang')->where('id',$id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function delete_request($id){
		$this->db->where('id',$id);
		$this->db->delete('request_barang');
	}

	function tampil_request_view($id){
		$this->db->select('*')->from('request_barang')->where('id',$id);
		$query = $this->db->get();
		return $query->first_row('array');	
	}

	function tampil_slider(){
		$this->db->select('*')->from('slider');
		$query = $this->db->get();
		return $query->result_array();	
	}

	function image_slider($id){
		$this->db->select('gambar')->from('slider')->where('id',$id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function edit_slider($id,$edit_slider){
		$this->db->where('id', $id);
		$this->db->update('slider', $edit_slider); 
	}

	function tambah_gambar($input_gambar){

		$this->db->insert('gambar',$input_gambar);
	}

	function tampil_gambar($id){
		$this->db->select('*')->from('gambar')->where('id_barang',$id);
		$query = $this->db->get();
		return $query->result_array();	
	}

	function image_gambar($id){
		$this->db->select('gambar')->from('gambar')->where('id',$id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function delete_gambar($id){
		$this->db->where('id',$id);
		$this->db->delete('gambar');
	}

	function image_resi($id){
		$this->db->select('*')->from('resi')->where('id_pesanan',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	function delete_resi($id){
		$this->db->where('id_pesanan',$id);
		$this->db->delete('resi');
	}

	function resi($id_pesanan){
		$this->db->select('*')->from('resi')->where('id_pesanan',$id_pesanan)->order_by('id','desc');
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function email_adm($id){
		$this->db->select('email')->from('pesanan')->where('id',$id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

}