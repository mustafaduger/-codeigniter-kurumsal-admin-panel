<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Partners extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        if (!$this->session->userdata('logged_in')) {
        	redirect('Login');
           	}
        //$this->load->helper('tools_helper');
        $this->load->model('partners_model');
                
    }

	public function index()
    {   
        $data['result']=$this->partners_model->get_all($where = array(), $order_by ='partners_order ASC', $select = '*', $limit=array());
    $this->load->view('partners',$data);
    }

    public function EditPage($id=Null)
   {
    $data['row']=$this->partners_model->get($where = array('partners_id'=>$id));
    $this->load->view('partners/edit',$data);
   } 

   public function AddPage()
   {
    $this->load->view('partners/add');
   } 

    public function Delete($id=Null)
    {
        
        $partners_tmb_path=$this->partners_model->images_tmb($where = array('partners_id'=>$id));
        if ($partners_tmb_path) {
              unlink($partners_tmb_path);
            }
        $result=$this->partners_model->delete($where = array('partners_id'=>$id));

        if ($result) {
             $message=MessageSuccessText("Silme işlemi başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('partners');
              }else{
                 $message=MessageUnsuccessText("Silme işlemi başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('partners');
            }

    }


    public function Update()
    {
        $id=$this->input->post('partners_id');

        $config['upload_path']         = FCPATH.'uploads/partners/';
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
            $image_record ='uploads/partners/'.$image_path.'';
            $image_tmb   ='uploads/partners/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='uploads/partners/'.$image_path.'';
            $config['new_image']='uploads/partners/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=400;
            $config['height']=300;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
           
            $partners_tmb_path=$this->partners_model->images_tmb($where = array('partners_id'=>$id));

            if ($partners_tmb_path) {
             
              unlink($partners_tmb_path);
            }
            unlink($image_record);
            $data=array(
                'partners_url'=>$this->input->post('partners_url'),
                'partners_order'=>$this->input->post('partners_order'),
                'is_Active'=>$this->input->post('is_Active'),

                'partners_logo'=>$image_tmb,

                 );
         
          $result=$this->partners_model->update(array('partners_id'=>$id),$data);

          if ($result) {
             $message=MessageSuccessText("Güncelleme başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('partners');
              }else{
                 $message=MessageUnsuccessText("Güncelleme başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('partners');
            }
        }else
        { //Resim yüklenemedi

          $data=array(
               'partners_url'=>$this->input->post('partners_url'),
                'partners_order'=>$this->input->post('partners_order'),
                'is_Active'=>$this->input->post('is_Active'),
                 );

         
        $result=$this->partners_model->update(array('partners_id'=>$id),$data);
          

          if ($result) {
             $message=MessageSuccessText("Güncelleme başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('partners');
              }else{
                 $message=MessageUnsuccessText("Güncelleme başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('partners');
              }
        }
    }

    

    public function Add()
    {
        
        $config['upload_path']         = FCPATH.'uploads/partners/';
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
            $image_record ='uploads/partners/'.$image_path.'';
            $image_tmb   ='uploads/partners/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='uploads/partners/'.$image_path.'';
            $config['new_image']='uploads/partners/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=400;
            $config['height']=300;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
           
            unlink($image_record);
            $data=array(
                'partners_url'=>$this->input->post('partners_url'),
                'partners_order'=>$this->input->post('partners_order'),
                'is_Active'=>$this->input->post('is_Active'),

                'partners_logo'=>$image_tmb,

                 );
         
          $result=$this->partners_model->add($data);

          if ($result) {
             $message=MessageSuccessText("Kayıt işlemi başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('partners');
              }else{
                 $message=MessageUnsuccessText("Kayıt işlemi başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('partners');
            }
        }
    }

  
        
    
}
