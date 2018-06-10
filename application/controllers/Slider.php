<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slider extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        if (!$this->session->userdata('logged_in')) {
        	redirect('Login');
           	}
        //$this->load->helper('tools_helper');
        $this->load->model('slider_model');
                
    }

	public function index()
    {   
        $data['result']=$this->slider_model->get_all($where = array(), $order_by ='slider_order ASC', $select = '*', $limit=array());
    $this->load->view('slider',$data);
    }

    public function EditPage($id=Null)
   {
    $data['row']=$this->slider_model->get($where = array('slider_id'=>$id));
    $this->load->view('slider/edit',$data);
   } 

   public function AddPage()
   {
    $this->load->view('slider/add');
   } 

    public function Delete($id=Null)
    {
        
        $slider_tmb_path=$this->slider_model->images_tmb($where = array('slider_id'=>$id));
        if ($slider_tmb_path) {
              unlink($slider_tmb_path);
            }
        $result=$this->slider_model->delete($where = array('slider_id'=>$id));

        if ($result) {
             $message=MessageSuccessText("Silme işlemi başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('slider');
              }else{
                 $message=MessageUnsuccessText("Silme işlemi başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('slider');
            }

    }


    public function Update()
    {
        $id=$this->input->post('slider_id');

        $config['upload_path']         = FCPATH.'uploads/slider/';
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
            $image_record ='uploads/slider/'.$image_path.'';
            $image_tmb   ='uploads/slider/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='uploads/slider/'.$image_path.'';
            $config['new_image']='uploads/slider/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=1920;
            $config['height']=1280;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
           
            $slider_tmb_path=$this->slider_model->images_tmb($where = array('slider_id'=>$id));

            if ($slider_tmb_path) {
             
              unlink($slider_tmb_path);
            }
            unlink($image_record);
            $data=array(
                'slider_order'=>$this->input->post('slider_order'),
                'is_Active'=>$this->input->post('is_Active'),

                'slider_image'=>$image_tmb,

                 );
         
          $result=$this->slider_model->update(array('slider_id'=>$id),$data);

          if ($result) {
             $message=MessageSuccessText("Güncelleme başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('slider');
              }else{
                 $message=MessageUnsuccessText("Güncelleme başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('slider');
            }
        }else
        { //Resim yüklenemedi

          $data=array(
                'slider_order'=>$this->input->post('slider_order'),
                'is_Active'=>$this->input->post('is_Active'),
                );

         
        $result=$this->slider_model->update(array('slider_id'=>$id),$data);
          

          if ($result) {
             $message=MessageSuccessText("Güncelleme başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('slider');
              }else{
                 $message=MessageUnsuccessText("Güncelleme başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('slider');
              }
        }
    }

    

    public function Add()
    {
        
        $config['upload_path']         = FCPATH.'uploads/slider/';
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
            $image_record ='uploads/slider/'.$image_path.'';
            $image_tmb   ='uploads/slider/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='uploads/slider/'.$image_path.'';
            $config['new_image']='uploads/slider/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=1920;
            $config['height']=1280;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
           
            unlink($image_record);
            $data=array(
                'slider_order'=>$this->input->post('slider_order'),
                'is_Active'=>$this->input->post('is_Active'),

                'slider_image'=>$image_tmb,

                 );
         
          $result=$this->slider_model->add($data);

          if ($result) {
             $message=MessageSuccessText("Kayıt işlemi başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('slider');
              }else{
                 $message=MessageUnsuccessText("Kayıt işlemi başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('slider');
            }
        }
    }

  
        
    
}
