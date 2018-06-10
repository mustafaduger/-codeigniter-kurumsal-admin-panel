<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clients extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        if (!$this->session->userdata('logged_in')) {
        	redirect('Login');
           	}
        //$this->load->helper('tools_helper');
        $this->load->model('clients_model');
                
    }

	public function index()
    {   
        $data['result']=$this->clients_model->get_all($where = array(), $order_by ='clients_order ASC', $select = '*', $limit=array());
    $this->load->view('clients',$data);
    }

    public function EditPage($id=Null)
   {
    $data['row']=$this->clients_model->get($where = array('clients_id'=>$id));
    $this->load->view('clients/edit',$data);
   } 

   public function AddPage()
   {
    $this->load->view('clients/add');
   } 

    public function Delete($id=Null)
    {
        
        $clients_tmb_path=$this->clients_model->images_tmb($where = array('clients_id'=>$id));
        if ($clients_tmb_path) {
              unlink($clients_tmb_path);
            }
        $result=$this->clients_model->delete($where = array('clients_id'=>$id));

        if ($result) {
             $message=MessageSuccessText("Silme işlemi başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('clients');
              }else{
                 $message=MessageUnsuccessText("Silme işlemi başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('clients');
            }

    }


    public function Update()
    {
        $id=$this->input->post('clients_id');

        $config['upload_path']         = FCPATH.'uploads/clients/';
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
            $image_record ='uploads/clients/'.$image_path.'';
            $image_tmb   ='uploads/clients/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='uploads/clients/'.$image_path.'';
            $config['new_image']='uploads/clients/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=300;
            $config['height']=300;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
           
            $clients_tmb_path=$this->clients_model->images_tmb($where = array('clients_id'=>$id));

            if ($clients_tmb_path) {
             
              unlink($clients_tmb_path);
            }
            unlink($image_record);
            $data=array(
                'clients_url'=>$this->input->post('clients_url'),
                'clients_order'=>$this->input->post('clients_order'),
                'is_Active'=>$this->input->post('is_Active'),

                'clients_logo'=>$image_tmb,

                 );
         
          $result=$this->clients_model->update(array('clients_id'=>$id),$data);

          if ($result) {
             $message=MessageSuccessText("Güncelleme başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('clients');
              }else{
                 $message=MessageUnsuccessText("Güncelleme başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('clients');
            }
        }else
        { //Resim yüklenemedi

          $data=array(
               'clients_url'=>$this->input->post('clients_url'),
                'clients_order'=>$this->input->post('clients_order'),
                'is_Active'=>$this->input->post('is_Active'),
                 );

         
        $result=$this->clients_model->update(array('clients_id'=>$id),$data);
          

          if ($result) {
             $message=MessageSuccessText("Güncelleme başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('clients');
              }else{
                 $message=MessageUnsuccessText("Güncelleme başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('clients');
              }
        }
    }

    

    public function Add()
    {
        
        $config['upload_path']         = FCPATH.'uploads/clients/';
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
            $image_record ='uploads/clients/'.$image_path.'';
            $image_tmb   ='uploads/clients/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='uploads/clients/'.$image_path.'';
            $config['new_image']='uploads/clients/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
             $config['width']=300;
            $config['height']=300;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
           
            unlink($image_record);
            $data=array(
                'clients_url'=>$this->input->post('clients_url'),
                'clients_order'=>$this->input->post('clients_order'),
                'is_Active'=>$this->input->post('is_Active'),

                'clients_logo'=>$image_tmb,

                 );
         
          $result=$this->clients_model->add($data);

          if ($result) {
             $message=MessageSuccessText("Kayıt işlemi başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('clients');
              }else{
                 $message=MessageUnsuccessText("Kayıt işlemi başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('clients');
            }
        }
    }

  
        
    
}
