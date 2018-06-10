<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        if (!$this->session->userdata('logged_in')) {
        	redirect('Login');
           	}
        //$this->load->helper('tools_helper');
        $this->load->model('settings_model');
                
    }
	public function index()
    {   
        $data['row']=$this->settings_model->get(array('settings_id'=>1));
        $this->load->view('settings',$data);
    }
    public function Update()
    {
        $id=$this->input->post('settings_id');
        
        $config['upload_path']         = FCPATH.'uploads/settings/';
        $config['allowed_types']       = 'gif|jpg|jpeg|png';
        $config['encrypt_name']        = FALSE;
        $config['max_size']            = 3000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);
        if ( $this->upload->do_upload('image'))
        {
            //Yeni resim oluştur
            $image = $this->upload->data();
            $image_path=$image['file_name'];
            $image_record ='uploads/settings/'.$image_path.'';
            $image_tmb   ='uploads/settings/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='uploads/settings/'.$image_path.'';
            $config['new_image']='uploads/settings/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=135;
            $config['height']=100;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
           
            $settings_tmb_path=$this->settings_model->images_tmb($where = array('settings_id'=>$id));

            if ($settings_tmb_path) {
             
              unlink($settings_tmb_path);
            }
            unlink($image_record);
            $data=array(
                'settings_title'=>$this->input->post('settings_title'),
                'settings_url'=>$this->input->post('settings_url'),
                'settings_description'=>$this->input->post('settings_description'),
                'settings_keywords'=>$this->input->post('settings_keywords'),
                'settings_author'=>$this->input->post('settings_author'),

                'settings_image'=>$image_tmb
                 );
         
          $result=$this->settings_model->update(array('settings_id'=>$id),$data);

          if ($result) {
             $message=MessageSuccessText("Güncelleme başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('settings');
              }else{
                 $message=MessageUnsuccessText("Güncelleme başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('settings');
            }
        }else
        { //Resim yüklenemedi

          $data=array(
            'settings_title'=>$this->input->post('settings_title'),
            'settings_url'=>$this->input->post('settings_url'),
            'settings_description'=>$this->input->post('settings_description'),
            'settings_keywords'=>$this->input->post('settings_keywords'),
            'settings_author'=>$this->input->post('settings_author'),
            );

         
        $result=$this->settings_model->update(array('settings_id'=>$id),$data);
          

          if ($result) {
             $message=MessageSuccessText("Güncelleme başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('settings');
              }else{
                 $message=MessageUnsuccessText("Güncelleme başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('settings');
              }
        }
    }
  
}
