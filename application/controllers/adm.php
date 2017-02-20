<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('m_adm');
		if(!$this->session->userdata('login_admin')){ redirect(base_url().'login'); }
	}

	public function index(){
		$data['slider'] = $this->m_adm->tampil_slider();

		$this->load->view('temp/adm_header');
		$this->load->view('adm/adm',$data);
		$this->load->view('temp/adm_footer');
	}

	public function barang(){
		$data['barang'] = $this->m_adm->tampil_barang();

		$this->load->view('temp/adm_header');
		$this->load->view('adm/barang',$data);
		$this->load->view('temp/adm_footer');
	}

	public function barang_tambah(){
		$this->load->view('temp/adm_header');
		$this->load->view('adm/barang_tambah');
		$this->load->view('temp/adm_footer');
	}

	public function barang_tambah_proses() {

		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000000000';
		$config['max_width']  = '10240000';
		$config['max_height']  = '7680000';

		$this->load->library('upload', $config);

		if ($_POST){
			if ( ! $this->upload->do_upload()){
				$file_name = '';
			}
			else{
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
			}
				$input_barang = array(
					'nama_barang' => $_POST['nama_barang'],
					'tanggal'	=> $_POST['tanggal'],
					'kategori'	=> $_POST['kategori'],
					'harga'	=> $_POST['harga'],
					'gambar' => $file_name,
					'stok' => $_POST['stok'],
					'berat' => $_POST['berat'],
					'ket' => $_POST['ket'],
					'publish' => $_POST['publish']
				);

				$config['image_library'] = 'gd2';
				$config['source_image']	= FCPATH . 'images/' . $file_name;
				$config['new_image']	= FCPATH . 'images/images_thumb/';
				$config['maintain_ratio'] = TRUE;
				$config['width']	= 300;
				$config['height']	= 300;

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$this->m_adm->tambah_barang($input_barang);
				$this->session->set_flashdata('barang_tambah','1');
			}

		redirect(base_url().'adm/barang');

	}

	public function barang_edit_proses($id) {

		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000000000';
		$config['max_width']  = '10240000';
		$config['max_height']  = '7680000';

		$this->load->library('upload', $config);

		if ($_POST){
			
			if(!empty($_POST['ket']) && !$this->upload->do_upload()){

				$edit_barang = array(
					'nama_barang' => $_POST['nama_barang'],
					'tanggal'	=> $_POST['tanggal'],
					'kategori'	=> $_POST['kategori'],
					'harga'	=> $_POST['harga'],
					'stok' => $_POST['stok'],
					'berat' => $_POST['berat'],
					'ket' => $_POST['ket'],
					'publish' => $_POST['publish']
				);
			}

			elseif(empty($_POST['ket']) && !$this->upload->do_upload()){

				$edit_barang = array(
					'nama_barang' => $_POST['nama_barang'],
					'tanggal'	=> $_POST['tanggal'],
					'kategori'	=> $_POST['kategori'],
					'harga'	=> $_POST['harga'],
					'stok' => $_POST['stok'],
					'berat' => $_POST['berat'],
					'ket' => '',
					'publish' => $_POST['publish']
				);
			}

			elseif(empty($_POST['ket'])){
				
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];

				$edit_barang = array(
					'nama_barang' => $_POST['nama_barang'],
					'tanggal'	=> $_POST['tanggal'],
					'kategori'	=> $_POST['kategori'],
					'harga'	=> $_POST['harga'],
					'gambar' => $file_name,
					'stok' => $_POST['stok'],
					'berat' => $_POST['berat'],
					'ket' => '',
					'publish' => $_POST['publish']
				);

				$file_old = $this->m_adm->image_barang($id);
				$file_old = $file_old['gambar'];
				unlink(FCPATH."images/" . $file_old);
				unlink(FCPATH."images/images_thumb/" . $file_old);
			}

			else{
				
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];

				$edit_barang = array(
					'nama_barang' => $_POST['nama_barang'],
					'tanggal'	=> $_POST['tanggal'],
					'kategori'	=> $_POST['kategori'],
					'harga'	=> $_POST['harga'],
					'gambar' => $file_name,
					'stok' => $_POST['stok'],
					'berat' => $_POST['berat'],
					'ket' => $_POST['ket'],
					'publish' => $_POST['publish']
				);

				$file_old = $this->m_adm->image_barang($id);
				$file_old = $file_old['gambar'];
				unlink(FCPATH."images/" . $file_old);
				unlink(FCPATH."images/images_thumb/" . $file_old);
			} 

			$config['image_library'] = 'gd2';
			$config['source_image']	= FCPATH . 'images/' . $file_name;
			$config['new_image']	= FCPATH . 'images/images_thumb/';
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 300;
			$config['height']	= 300;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$this->m_adm->edit_barang($id,$edit_barang);
		}

		$this->session->set_flashdata('barang_edit','1');
		redirect(base_url().'adm/barang');

	}

	public function barang_delete($id) {

		$image = $this->m_adm->image_barang($id);
		$file_name = $image['gambar'];
		unlink(FCPATH."images/" . $file_name);
		unlink(FCPATH."images/images_thumb/" . $file_name);

		$this->m_adm->delete_komen($id);
		$this->m_adm->delete_barang($id);
		$this->session->set_flashdata('barang_delete','1');
		redirect(base_url().'adm/barang');

	}

	public function barang_edit($id){

		$data['barang'] = $this->m_adm->tampil_barang_edit($id);

		$this->load->view('temp/adm_header');
		$this->load->view('adm/barang_edit',$data);
		$this->load->view('temp/adm_footer');
	}

	public function barang_view($id){

		$data['barang'] = $this->m_adm->tampil_barang_view($id);
		$data['gambar'] = $this->m_adm->tampil_gambar($id);

		$this->load->view('temp/adm_header');
		$this->load->view('adm/barang_view',$data);
		$this->load->view('temp/adm_footer');
	}

	public function pesanan(){

		$data['pesanan'] = $this->m_adm->tampil_pesanan();

		$this->load->view('temp/adm_header');
		$this->load->view('adm/pesanan',$data);
		$this->load->view('temp/adm_footer');
	}

	public function pesanan_detail($id){

		$data['pemesan'] = $this->m_adm->tampil_pemesan($id);
		$data['pesanan'] = $this->m_adm->tampil_pesanan_detail($id);
		$data['resi'] = $this->m_adm->resi($id);
		$data['total'] = $this->m_adm->total_pesanan($id);

		$this->load->view('temp/adm_header');
		$this->load->view('adm/pesanan_detail',$data);
		$this->load->view('temp/adm_footer');
	}

	public function pesanan_delete($id) {

		$image = $this->m_adm->image_resi($id);
		foreach ($image as $tampil){
			unlink(FCPATH."images/resi/" . $tampil['gambar']);	
		}
		
		$this->m_adm->delete_resi($id);

		$this->m_adm->delete_pesanan($id);
		$this->session->set_flashdata('pesanan_delete','1');
		$this->session->unset_userdata("baru_pesan");
		redirect(base_url().'adm/pesanan');
	}

	public function pesanan_proses($id) {

		$a = $this->m_adm->email_adm($id);
		$email = $a['email'];

		$x = 'Barang anda telah berhasil kami Order dengan : <br/><br/> No. Pemesanan: '.$id.' <br/> Email: '.$email.' <br/><br/> Terimakasih telah menggunaakan jasa kami <br/> salam FAKOELTURE';

		require_once APPPATH."third_party/class.phpmailer.php";
		$mail = new PHPMailer(true);
		$mail->IsSMTP();
		try {
		$mail->Host       = "localhost"; // isi dengan host sesuai keinginan Anda
		$mail->SMTPAuth   = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host       = "smtp.gmail.com";
		$mail->Port       = 465;
		$mail->Username   = 'hyouka811@gmail.com';  // isi dengan gmail anda
		$mail->Password   = '';       // isi dengan password gmail anda
		$mail->AddReplyTo('hyouka811@gmail.com', 'FAKOELTURE');      
		$mail->AddAddress($email); // isi alamat tujuan email, NB : khusus untuk mengirim dari gmail ke yahoo agak lama
		$mail->SetFrom('hyouka811@gmail.com', 'FAKOELTURE'); 
		$mail->Subject = 'KONFIRMASI ORDER BARANG'; //subyek email
		$mail->AltBody = 'FAKOELTURE'; //alt body
		$mail->Body  = $x;
		$mail->Send();
		//echo 'Email berhasil dikirim';
		
		} catch (phpmailerException $e){
		echo $e;
		} catch (Exception $e) {
		echo $e;
		}

		$data = array
			(
				'status' => 'Y'
			);

		$this->m_adm->edit_proses($id,$data);
		
		if($mail->Send()){
			redirect(base_url().'adm/pesanan');
		}
	}

	public function pesanan_proses_batal($id) {

		$data = array
			(
				'status' => 'N'
			);

		$this->m_adm->edit_proses_batal($id,$data);
		redirect(base_url().'adm/pesanan');
	}

	public function request_proses($id) {

		$data = array
			(
				'status' => 'Y'
			);

		$this->m_adm->edit_request($id,$data);
		redirect(base_url().'adm/request_barang');
	}

	public function request_proses_batal($id) {

		$data = array
			(
				'status' => 'N'
			);

		$this->m_adm->edit_request_batal($id,$data);
		redirect(base_url().'adm/request_barang');
	}

	public function komentar(){

		$data['komentar'] = $this->m_adm->tampil_komentar();

		$this->load->view('temp/adm_header');
		$this->load->view('adm/komentar',$data);
		$this->load->view('temp/adm_footer');
	}

	public function komentar_delete($id){

		$this->m_adm->delete_komentar($id);
		$this->session->set_flashdata('komentar_delete','1');
		redirect(base_url().'adm/komentar');
	}

	public function komentar_balas($id){

		if($_POST){
			if($_POST['tampilkan'] == 'Y'){
				$tampil = 'Y';
			}
			else {
				$tampil = 'N';
			}

			$data_balas = array(
				'dari' 			=> $_POST['dari'],
				'balas' 		=> $_POST['balas'],
				'tampilkan' 	=> $tampil,
				'tanggal_balas' => date("Y-m-d")
			);
		}
		$this->m_adm->balas_komentar($id,$data_balas);
		redirect(base_url().'adm/komentar');
	}

	public function user(){

		$data['user'] = $this->m_adm->tampil_user();

		$this->load->view('temp/adm_header');
		$this->load->view('adm/user',$data);
		$this->load->view('temp/adm_footer');
	}

	public function cara_pembelian($id){
		if ($_POST){

			if(!empty($_POST['isi'])){
				$data_isi = array(
					'isi' => $_POST['isi']
				);
			}
			else{
				$data_isi = array(
					'isi' => ''
				);
			} 
			$this->m_adm->edit_cara_pembelian($id,$data_isi);
		}
		redirect(base_url().'adm');
	}

	public function slider($id){
		
		$config['upload_path'] = './images/slider';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000000000';
		$config['max_width']  = '10240000';
		$config['max_height']  = '7680000';

		$this->load->library('upload', $config);

		if ($this->upload->do_upload()){

			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

			$edit_slider = array(
				'gambar' => $file_name
			);

			$file_old = $this->m_adm->image_slider($id);
			$file_old = $file_old['gambar'];
			unlink(FCPATH."images/slider" . $file_old);

			$this->m_adm->edit_slider($id,$edit_slider);
		}
		redirect(base_url().'adm');
	}

	public function request_barang(){

		$data['request'] = $this->m_adm->tampil_request();

		$this->load->view('temp/adm_header');
		$this->load->view('adm/request_barang',$data);
		$this->load->view('temp/adm_footer');
	}

	public function request_barang_delete($id){

		$image = $this->m_adm->image_request($id);
		$file_name = $image['gambar'];
		unlink(FCPATH."images/request/" . $file_name);

		$this->m_adm->delete_request($id);
		$this->session->set_flashdata('request_delete','1');
		redirect(base_url().'adm/request_barang');

	}

	public function request_barang_view($id){

		$data['tampil'] = $this->m_adm->tampil_request_view($id);

		$this->load->view('temp/adm_header');
		$this->load->view('adm/request_barang_view',$data);
		$this->load->view('temp/adm_footer');
	}

	public function gambar($id){

		$config['upload_path'] = './images/gambar/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000000000';
		$config['max_width']  = '10240000';
		$config['max_height']  = '7680000';

		$this->load->library('upload', $config);

		if ($this->upload->do_upload()){

			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

			$input_gambar = array(
				'id_barang' => $id,
				'gambar' => $file_name
			);

			$config['image_library'] = 'gd2';
			$config['source_image']	= FCPATH . 'images/gambar/' . $file_name;
			$config['new_image']	= FCPATH . 'images/gambar/images_thumb/';
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 300;
			$config['height']	= 300;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$this->m_adm->tambah_gambar($input_gambar);

			}

		redirect(base_url().'adm/barang_view/'.$id);

	}

	public function gambar_delete($id,$id_barang){

		$image = $this->m_adm->image_gambar($id);
		$file_name = $image['gambar'];
		unlink(FCPATH."images/gambar/" . $file_name);
		unlink(FCPATH."images/gambar/images_thumb/" . $file_name);

		$this->m_adm->delete_gambar($id);
		redirect(base_url().'adm/gambar/'.$id_barang);

	}

	public function user_update($id){

		if($_POST){
			$old_password = sha1($_POST['old_password']);
			$new_password = sha1($_POST['new_password']);
			$new_password_again = sha1($_POST['new_password_again']);

			if($_POST['password'] == $old_password){

				if($new_password == $new_password_again){

					$data = array
						(
							'password' => $new_password
						);

					$this->m_adm->edit_user($id,$data);

					redirect(base_url().'login/logout');
				}
				else{
					redirect(base_url().'adm/user?salah_masukan_password_baru');
				}
			}
			else{
				redirect(base_url().'adm/user?gagal=salah_masukan_password_lama');
			}

		}
		else {
			redirect(base_url().'adm/user?gagal=1');
		}

	}
}
