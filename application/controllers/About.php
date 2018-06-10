<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class About extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        if (!$this->session->userdata('logged_in')) {
        	redirect('Login');
           	}
        //$this->load->helper('tools_helper');
        $this->load->model('about_model');
                
    }

	public function index()
    {   
        $data['row']=$this->about_model->get(array('about_id'=>1));
        $this->load->view('about',$data);
    }

    public function Update()
    {
        $id=$this->input->post('about_id');

        $data=array(
                'about_content'=>$this->input->post('about_content'),
                'about_content_en'=>$this->input->post('about_content_en'),
                'about_vision'=>$this->input->post('about_vision'),
                'about_vision_en'=>$this->input->post('about_vision_en'),
                'about_mission'=>$this->input->post('about_mission'),
                'about_mission_en'=>$this->input->post('about_mission_en'),
                'about_press'=>$this->input->post('about_press'),
               
                );
      
        $result=$this->about_model->update(array('about_id'=>$id),$data);

        if ($result) {
             $message=MessageSuccessText("Güncelleme başarılı!");
             $this->session->set_flashdata('error_message',$message);

             redirect('about');
          }else{
             $message=MessageUnsuccessText("Güncelleme başarısız!");
             $this->session->set_flashdata('error_message',$message);
           
             redirect('about');
          }
    }
}
