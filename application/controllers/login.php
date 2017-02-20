<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//nama class harus sama dengan nama file dan diawali dengan huruf besar
class Login extends CI_Controller {

    public function index(){
        
        if(!$this->session->userdata('login_admin')){
            $this->load->view('login');
        }
        else{
            redirect(base_url().'adm');
        }
    }

    public function logout() {

        $this->session->unset_userdata('login_admin');
        redirect('login','refresh');
    }   
}