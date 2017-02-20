<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_validation extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('m_adm');
    }

    public function index(){

        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');// disini terdapat callback : callback_check_database. digunakan untuk memanggil function check_database() dibawah.

        if($this->form_validation->run() == FALSE){

            redirect(base_url().'login?gagal=1','refresh');
        }
        else {
            
            redirect(base_url().'adm');
        }
    }

    function check_database(){

        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        $result = $this->m_adm->login($username,$password);

        if($result)
        {
            $sess_array = array(
                'id'            => $result['id'],
                'username'      => $result['username']
            );

            $this->session->set_userdata('login_admin', $sess_array);

            return TRUE;
        }
        else{
            
            return FALSE;
        }
    }
}
