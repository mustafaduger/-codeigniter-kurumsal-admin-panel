<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Portfolio extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        if (!$this->session->userdata('logged_in')) {
        	redirect('Login');
           	}
        //$this->load->helper('tools_helper');
        $this->load->model('portfolio_model');
                
    }

	public function index($portfolio_category=Null)
    {   
        $data['result']=$this->portfolio_model->get_all($where = array('portfolio_category'=>$portfolio_category), $order_by ='portfolio_order ASC', $select = '*', $limit=array());
    $this->load->view('portfolio',$data);
    }

    public function EditPage($id=Null)
   {
    $data['row']=$this->portfolio_model->get($where = array('portfolio_id'=>$id));
    $this->load->view('portfolio/edit',$data);
   } 

   public function AddPage()
   {
    //$data['portfolio_category']=$portfolio_category;
    $this->load->view('portfolio/add');
   } 

    public function Delete($id=Null)
    {
        $portfolio_category=$this->portfolio_model->get_Category($where = array('portfolio_id'=>$id));
        $portfolio_tmb_path=$this->portfolio_model->images_tmb($where = array('portfolio_id'=>$id));
        if ($portfolio_tmb_path) {
              unlink($portfolio_tmb_path);
            }
        $result=$this->portfolio_model->delete($where = array('portfolio_id'=>$id));

        if ($result) {
             $message=MessageSuccessText("Silme işlemi başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('portfolio/index/'.$portfolio_category);
              }else{
                 $message=MessageUnsuccessText("Silme işlemi başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('portfolio/index/'.$portfolio_category);
            }

    }


    public function Update()
    {
        $id=$this->input->post('portfolio_id');
        $portfolio_category=$this->input->post('portfolio_category');

        $config['upload_path']         = FCPATH.'uploads/portfolio/';
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
            $image_record ='uploads/portfolio/'.$image_path.'';
            $image_tmb   ='uploads/portfolio/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='uploads/portfolio/'.$image_path.'';
            $config['new_image']='uploads/portfolio/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=1200;
            $config['height']=900;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
           
            $portfolio_tmb_path=$this->portfolio_model->images_tmb($where = array('portfolio_id'=>$id));

            if ($portfolio_tmb_path) {
             
              unlink($portfolio_tmb_path);
            }
            unlink($image_record);
            $data=array(
                'portfolio_title'=>$this->input->post('portfolio_title'),
                'portfolio_seflink'=>seflink($this->input->post('portfolio_title')),
                'portfolio_title_en'=>$this->input->post('portfolio_title_en'),
                'portfolio_content'=>$this->input->post('portfolio_content'),
                'portfolio_content_en'=>$this->input->post('portfolio_content_en'),
                'portfolio_category'=>$this->input->post('portfolio_category'),
                'portfolio_order'=>$this->input->post('portfolio_order'),
                'is_Active'=>$this->input->post('is_Active'),

                'portfolio_image'=>$image_tmb,

                 );
         
          $result=$this->portfolio_model->update(array('portfolio_id'=>$id),$data);

          if ($result) {
             $message=MessageSuccessText("Güncelleme başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('portfolio/index/'.$portfolio_category);
              }else{
                 $message=MessageUnsuccessText("Güncelleme başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('portfolio/index/'.$portfolio_category);
            }
        }else
        { //Resim yüklenemedi

          $data=array(
               'portfolio_title'=>$this->input->post('portfolio_title'),
               'portfolio_seflink'=>seflink($this->input->post('portfolio_title')),
                'portfolio_title_en'=>$this->input->post('portfolio_title_en'),
                'portfolio_content'=>$this->input->post('portfolio_content'),
                'portfolio_content_en'=>$this->input->post('portfolio_content_en'),
                'portfolio_category'=>$this->input->post('portfolio_category'),
                'portfolio_order'=>$this->input->post('portfolio_order'),
                'is_Active'=>$this->input->post('is_Active'),
                 );

         
        $result=$this->portfolio_model->update(array('portfolio_id'=>$id),$data);
          

          if ($result) {
             $message=MessageSuccessText("Güncelleme başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('portfolio/index/'.$portfolio_category);
              }else{
                 $message=MessageUnsuccessText("Güncelleme başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('portfolio/index/'.$portfolio_category);
              }
        }
    }

    

    public function Add()
    {
        $portfolio_category=$this->input->post('portfolio_category');
        
        $config['upload_path']         = FCPATH.'uploads/portfolio/';
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
            $image_record ='uploads/portfolio/'.$image_path.'';
            $image_tmb   ='uploads/portfolio/tumb/'.$image_path.'';
            //$resimmini   ='assets/front/images/haber/mini/'.$image_path.'';         
            $config['image_library']='gd2';
            $config['source_image']='uploads/portfolio/'.$image_path.'';
            $config['new_image']='uploads/portfolio/tumb/'.$image_path.'';
            $config['create_thumb']=false;
            $config['maintain_ratio']=false;
            $config['quality']='60%';
            $config['width']=1200;
            $config['height']=900;

            $this->load->library('image_lib',$config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();
           
            unlink($image_record);
            $data=array(
                'portfolio_title'=>$this->input->post('portfolio_title'),
                'portfolio_seflink'=>seflink($this->input->post('portfolio_title')),
                'portfolio_title_en'=>$this->input->post('portfolio_title_en'),
                'portfolio_content'=>$this->input->post('portfolio_content'),
                'portfolio_content_en'=>$this->input->post('portfolio_content_en'),
                'portfolio_category'=>$this->input->post('portfolio_category'),
                'portfolio_order'=>$this->input->post('portfolio_order'),
                'is_Active'=>$this->input->post('is_Active'),

                'portfolio_image'=>$image_tmb,

                 );
         
          $result=$this->portfolio_model->add($data);

          if ($result) {
             $message=MessageSuccessText("Kayıt işlemi başarılı!");
                 $this->session->set_flashdata('error_message',$message);

                 redirect('portfolio/index/'.$portfolio_category);
              }else{
                 $message=MessageUnsuccessText("Kayıt işlemi başarısız!");
                 $this->session->set_flashdata('error_message',$message);
               
                 redirect('portfolio/index/'.$portfolio_category);
            }
        }
    }

  
        
    
}
