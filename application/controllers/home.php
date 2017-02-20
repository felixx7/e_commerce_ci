<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('m_home');
	}

	public function index(){

		if(!$this->session->userdata('opener')){
			redirect (base_url()."home/opener");
		}
		if($_POST){
			$pilihan = $_POST['pilihan'];
			$this->session->set_userdata('pencarian_home',$pilihan);
		}
		$pencarian = $this->session->userdata('pencarian_home');

		$jml = $this->db->where('publish','Y')->get('barang');

		$config['base_url'] = base_url().'home/index/';
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = 15;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $dari = $this->uri->segment('3');
		
		if($pencarian == 'termurah'){
			$data['barang'] = $this->m_home->tampil_home_termurah($config['per_page'],$dari);
		}
		elseif($pencarian == 'terbaru'){
			$data['barang'] = $this->m_home->tampil_home_terbaru($config['per_page'],$dari);
		}
		else{
			$data['barang'] = $this->m_home->tampil_home($config['per_page'],$dari);
		}	
			
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['slider'] = $this->m_home->tampil_slider();

		$this->load->view('temp/header');
		$this->load->view('home',$data);
		$this->load->view('temp/footer');
	}

	public function opener(){
		$this->session->set_userdata('opener','1');
		$this->load->view('opener');
	}

	public function fashion(){

		if($_POST){
			$pilihan = $_POST['pilihan'];
			$this->session->set_userdata('pencarian_fashion',$pilihan);
		}
		$pencarian = $this->session->userdata('pencarian_fashion');

		$this->db->where('kategori','fashion')->where('publish','Y');
		$jml = $this->db->get('barang');

		$config['base_url'] = base_url().'home/fashion/';
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = 15;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $dari = $this->uri->segment('3');
		
		if($pencarian == 'termurah'){
			$data['barang'] = $this->m_home->tampil_fashion_termurah($config['per_page'],$dari);
		}
		elseif($pencarian == 'terbaru'){
			$data['barang'] = $this->m_home->tampil_fashion_terbaru($config['per_page'],$dari);
		}
		else{
			$data['barang'] = $this->m_home->tampil_fashion($config['per_page'],$dari);
		}

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('temp/header');
		$this->load->view('fashion',$data);
		$this->load->view('temp/footer');
	}

	public function kuliner(){

		if($_POST){
			$pilihan = $_POST['pilihan'];
			$this->session->set_userdata('pencarian_kuliner',$pilihan);
		}
		$pencarian = $this->session->userdata('pencarian_kuliner');

		$this->db->where('kategori','kuliner')->where('publish','Y');
		$jml = $this->db->get('barang');
		
		$config['base_url'] = base_url().'home/kuliner/';
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = 15;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $dari = $this->uri->segment('3');

		if($pencarian == 'termurah'){
			$data['barang'] = $this->m_home->tampil_kuliner_termurah($config['per_page'],$dari);
		}
		elseif($pencarian == 'terbaru'){
			$data['barang'] = $this->m_home->tampil_kuliner_terbaru($config['per_page'],$dari);
		}
		else{
			$data['barang'] = $this->m_home->tampil_kuliner($config['per_page'],$dari);
		}

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('temp/header');
		$this->load->view('kuliner',$data);
		$this->load->view('temp/footer');
	}

	public function jasa(){

		if($_POST){
			$pilihan = $_POST['pilihan'];
			$this->session->set_userdata('pencarian_jasa',$pilihan);
		}
		$pencarian = $this->session->userdata('pencarian_jasa');

		$this->db->where('kategori','jasa')->where('publish','Y');
		$jml = $this->db->get('barang');
		
		$config['base_url'] = base_url().'home/jasa/';
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = 15;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $dari = $this->uri->segment('3');

		if($pencarian == 'termurah'){
			$data['barang'] = $this->m_home->tampil_jasa_termurah($config['per_page'],$dari);
		}
		elseif($pencarian == 'terbaru'){
			$data['barang'] = $this->m_home->tampil_jasa_terbaru($config['per_page'],$dari);
		}
		else{
			$data['barang'] = $this->m_home->tampil_jasa($config['per_page'],$dari);
		}

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('temp/header');
		$this->load->view('jasa',$data);
		$this->load->view('temp/footer');
	}

	public function detail($id){

		$data['barang'] = $this->m_home->tampil_detail($id);
		$data['gambar'] = $this->m_home->tampil_gambar($id);

		$this->load->view('temp/header');
		$this->load->view('detail',$data);
		$this->load->view('temp/footer');
	}

	public function keranjang(){

	    $data['cart'] = $this->cart->contents();
	    $data['total'] = $this->cart->total();

		$this->load->view('temp/header');
		$this->load->view('keranjang',$data);
		$this->load->view('temp/footer');
	}

	public function print_pesanan(){

		$this->load->view('print_pesanan');
	}

	/*public function checkout()
	{
		if ($this->cart->total() == 0){
			$this->session->set_flashdata('keranjang_kosong','1');
			redirect(base_url()."home/keranjang");
		}

		$data['cart'] = $this->cart->contents();
	    $data['total'] = $this->cart->total();

	    $vals = array(
		    'word'		 => rand(),
		    'img_path'	 => './images/captcha/',
		    'img_url'	 =>  base_url().'images/captcha/',
		    'font_path'	 => './path/to/fonts/texb.ttf',
		    'img_width'	 => '160',
		    'img_height' => 35,
		    'expiration' => 7200
		    );

		$cap = create_captcha($vals);
		
		$data['captcha'] = array (
				'image' => $cap['image'],
				'word'  => $cap['word']
			);

		$this->load->view('temp/header');
		$this->load->view('checkout',$data);
		$this->load->view('temp/footer');
	}*/

	public function checkout_save(){

		if($_POST){

			$data_pesanan = array( 
				'nama'   		=> $_POST['nama'],
				'email'  		=> $_POST['email'],
				'hp' 	 		=> $_POST['hp'],
				'tanggal'   	=> date("Y-m-d"),
				'provinsi' 		=> $_POST['prov'],
				'kabupaten'		=> $_POST['kota'],
				'kecamatan'		=> $_POST['kecamatan'],
				'desa'	    	=> $_POST['desa'],
				'alamat' 		=> $_POST['alamat'],
				'berat'  		=> $_POST['weight'],
				'service'  		=> $_POST['service'],
				'total'  		=> $_POST['subtotal'],
				'totalongkir'  	=> $_POST['totalongkir']
			);

			$id_pesanan = $this->m_home->pesanan($data_pesanan);
			
			$i = 0;
			foreach($_POST['nama_barang'] as $val){
				$data_detail = array(
					'id_pesanan' 	=> $id_pesanan,	
					'gambar' 		=> $_POST['gambar'][$i],
					'id_barang' 	=> $_POST['kode_barang'][$i],
					'nama_barang' 	=> $val,
					'qty' 			=> $_POST['qty'][$i],
					'berat' 		=> $_POST['berat2'][$i],
					'harga' 		=> $_POST['harga'][$i],
					'kategori' 		=> $_POST['kategori'][$i]
				);

			$this->m_home->pesanan_detail($data_detail);
			$i++;

			$this->session->set_flashdata("berhasil_pesan","1");
			}
		}

		/*$email = $_POST['email'];
		$x = 'Selamat <br/>Nama: '.$_POST['nama'].'<br/>ID Pesanan: '.$id_pesanan.'<br/>Email:'.$_POST['email'].'<br/>Tanggal:'.date("Y-m-d").'<br/>Total:'.$_POST['totalongkir'].'<br/>Berhasil Order';

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
		$mail->Subject = 'KONFIRMASI ORDER'; //subyek email
		$mail->AltBody = 'FAKOELTURE'; //alt body
		$mail->Body  = $x;
		$mail->Send();
		//echo 'Email berhasil dikirim';
		} catch (phpmailerException $e){
		echo $e;
		} catch (Exception $e) {
		echo $e;
		}*/

		$data_baru_pesan = $this->m_home->baru_pesan($id_pesanan);
		$this->session->set_userdata("baru_pesan",$data_baru_pesan);

		$this->cart->destroy();
		redirect(base_url()."home/keranjang");
	}

	public function cara_pembelian(){

		$this->load->view('temp/header');
		$this->load->view('cara_pembelian');
		$this->load->view('temp/footer');
	}

	public function add($id){

		$data = array(
		        'id'      	=> $id,
		        'qty'     	=> $_POST['qty'],
		        'price'   	=> $_POST['harga'],
		        'name'      => $_POST['nama_barang'],
		        'gambar'    => $_POST['gambar'],
		        'stok'		=> $_POST['stok'],
		        'berat'		=> $_POST['berat'],
		        'kategori'  => $_POST['kategori']
		    );

		$this->cart->insert($data);
		redirect(base_url()."home");
	}
		
	public function destroy(){

	    $this->cart->destroy();
	    redirect(base_url()."home/keranjang");
	}

	public function remove($rowid){

		$data = array(
		        'rowid'   => $rowid,
		        'qty'     => 0
		    );

	    $this->cart->update($data);
	    redirect(base_url()."home/keranjang");
	}

	public function update($rowid){

		if($_POST){
			
			$data = array(
			        'rowid'   => $rowid,
			        'qty'     => $_POST['qty']
			    );

			$this->cart->update($data);
		}

	    redirect(base_url()."home/keranjang");
	}

	public function komentar_tambah($id){

		$this->form_validation->set_rules('nama', 'nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('website', 'website', 'trim|required|xss_clean');
		$this->form_validation->set_rules('komentar', 'komentar', 'trim|required|xss_clean');

		if ($_POST) {
			$input_komentar = array(

					'id_barang' => $id,
					'nama' 		=> $_POST['nama'],
					'email' 	=> $_POST['email'],
					'website' 	=> $_POST['website'],
					'komentar' 	=> $_POST['komentar'],
					'tanggal'   => date("Y-m-d")
				);

			$this->m_home->tambah_komentar($input_komentar);
			redirect(base_url().'home/detail/'.$id);
		}
	}

	public function cek_pesanan(){

		if($_POST){
			$this->form_validation->set_rules('cek_pesanan', 'cek_pesanan', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');

			$cek_pesanan = $_POST['cek_pesanan'];
			$email = $_POST['email'];	
		}
		else{
			$cek_pesanan = '';
			$email = '';
		}

		$data['cek_pesanan'] = $this->m_home->cek_pesanan($cek_pesanan,$email);
		$data['detail_pesanan'] = $this->m_home->cek_pesanan_detail($cek_pesanan);
		$data['pesanan'] = $this->m_home->cek_pesanan($cek_pesanan,$email);
		$data['total'] = $this->m_home->cek_total_pesanan($cek_pesanan);
		$data['resi'] = $this->m_home->resi($cek_pesanan);

		$this->load->view('temp/header');
		$this->load->view('cek_pesanan',$data);
		$this->load->view('temp/footer');
	}

	public function request_barang(){

		$vals = array(
		    'word'		 => rand(),
		    'img_path'	 => './images/captcha_request/',
		    'img_url'	 =>  base_url().'images/captcha_request/',
		    'font_path'	 => './path/to/fonts/texb.ttf',
		    'img_width'	 => '160',
		    'img_height' => 35,
		    'expiration' => 7200
		    );

		$cap = create_captcha($vals);
		
		$data['captcha'] = array (
				'image' => $cap['image'],
				'word'  => $cap['word']
			);

		$this->load->view('temp/header');
		$this->load->view('request_barang',$data);
		$this->load->view('temp/footer');
	}

	public function request_barang_proses(){

		if($_POST['captcha'] != $_POST['captcha_confirm']){
			$this->session->set_flashdata("captcha_request","1");
			redirect (base_url()."home/request_barang");
		}

		$config['upload_path'] = './images/request/';
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
				$input_request = array(
					'nama' => $_POST['nama'],
					'email'	=> $_POST['email'],
					'kategori'	=> $_POST['kategori'],
					'gambar' => $file_name,
					'keterangan' => $_POST['keterangan'],
					'tanggal'   => date("Y-m-d")
				);

			$this->m_home->tambah_request($input_request);
			$this->session->set_flashdata('request_barang','1');
		}

		redirect(base_url().'home/request_barang');
	}

	public function status_request(){

		$data['status_request'] = $this->m_home->tampil_status_request();

		$this->load->view('temp/header');
		$this->load->view('status_request',$data);
		$this->load->view('temp/footer');
	}

	public function resi(){

		if ($_POST){
			$this->form_validation->set_rules('id_pesanan', 'id_pesanan', 'trim|required|xss_clean');

				$input_resi = array(
					'id_pesanan' => $_POST['id_pesanan'],
					'gambar' => $_POST['rekening']
				);

			$this->m_home->tambah_resi($input_resi);
			$this->session->set_flashdata('resi','1');
		}

		redirect(base_url().'home/cek_pesanan');
	}

	public function mailer(){
		$email = $_POST['email'];

		$a = $this->m_home->email($email);
		foreach ($a as $tampil){
			$b[] = 'Kode Pesanan Anda: '.$tampil['id'].'<br/>';
		}

		$x = implode($b);


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
		$mail->Subject = 'KODE PEMESANAN'; //subyek email
		$mail->AltBody = 'FAKOELTURE'; //alt body
		$mail->Body  = $x;
		$mail->Send();
		//echo 'Email berhasil dikirim';
		} catch (phpmailerException $e){
		echo $e;
		} catch (Exception $e) {
		echo $e;
		}

		if($mail->Send()){
			$this->session->set_flashdata('mailer','1');
			redirect(base_url().'home/cek_pesanan');
		}
		
	}

	/*public function get_city(){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: eed1aca7b804f744560cb1a59724e6d9"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}
	}

	public function get_province(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: eed1aca7b804f744560cb1a59724e6d9"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}
	}

	public function get_cost(){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: eed1aca7b804f744560cb1a59724e6d9"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  $data = json_decode($response, true);
		  echo "dari : ".$data['rajaongkir']['origin_details']['province']."<br/>";
		  echo "ke : ".$data['rajaongkir']['destination_details']['province']."<br/>";
		  echo "berat : ".$data['rajaongkir']['query']['weight']."<br/>";
		  echo "by : ".$data['rajaongkir']['results'][0]['name']."<br/>";
		}
	}*/

	public function check_out(){
		
		if ($this->cart->total() == 0){
			$this->session->set_flashdata('keranjang_kosong','1');
			redirect(base_url()."home/keranjang");
		}
		
		$data['cart'] = $this->cart->contents();
	    $data['total'] = $this->cart->total();

		$this->load->view('check_out',$data);
	}
}
