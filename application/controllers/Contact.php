<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        if (!$this->session->userdata('logged_in')) {
        	redirect('Login');
           	}
        $this->load->model('contact_model');
                
    }

	public function index()
    {   
        $data['row']=$this->contact_model->get(array('contact_id'=>1));
        $this->load->view('contact',$data);
    }

    public function Update()
    {
        $id=$this->input->post('contact_id');

        $data=array(
                'contact_address'=>$this->input->post('contact_address'),
                'contact_province'=>$this->input->post('contact_province'),
                'contact_district'=>$this->input->post('contact_district'),
                'contact_telephon'=>$this->input->post('contact_telephon'),
                'contact_fax'=>$this->input->post('contact_fax'),
                'contact_email'=>$this->input->post('contact_email'),
                'contact_latitude'=>$this->input->post('contact_latitude'),
                'contact_longitude'=>$this->input->post('contact_longitude'),
               
                );
      
        $result=$this->contact_model->update(array('contact_id'=>$id),$data);

        if ($result) {
             $message=MessageSuccessText("Güncelleme başarılı!");
             $this->session->set_flashdata('error_message',$message);
           
             redirect('contact');
         }else{
             $message=MessageUnsuccessText("Güncelleme başarısız!");
             $this->session->set_flashdata('error_message',$message);
           
             redirect('contact');
        }
    }
}
