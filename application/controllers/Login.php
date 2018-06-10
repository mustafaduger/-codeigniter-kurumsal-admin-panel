<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
                //$this->load->helper('url','form');
                //$this->load->library('form_validation');
                //$this->load->library('email');
  				      //$this->load->library('session');
    $this->load->model('login_model');

  }
  public function index()
  {
    $this->load->view('login');
  }


  public function login_pro()
  {
    //Login formu validation kontrolu
    $this->form_validation->set_rules('username', 'Kullanıcı Adı', 'required');
    $this->form_validation->set_rules('password', 'Parola', 'required|min_length[3]');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
		//$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_message('required', '%s alanını doldurmak zorundasınız!');
    $this->form_validation->set_message('min_length', '{field}nız en az {param} karakter olmalı');
    $this->form_validation->set_message('valid_email', 'Geçerli email adresi giriniz.');


    if ($this->form_validation->run() == FALSE)
    {


      $this->load->view('login');
    }
    else
    {

      $username=$this->input->post('username');
      $password=$this->input->post('password');

      $result=$this->login_model->admin_login($username,$password);

      if ($result) {

        $this->session->set_userdata('logged_in',true);
        redirect('admin');
      }else{
              	//$this->load->library('session');
       $this->session->set_flashdata('login_error', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                         Geçersiz Kullanıcı Adı ve/veya Parola');
       redirect('login');
     }
   }

 }

 public function logout()
 {
        //unset($this->session->userdata('loginpage'));
  $this->session->unset_userdata('logged_in');
  $this->session->sess_destroy();
  redirect('login');
  }
}
