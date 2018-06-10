<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Service extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('logged_in')) {
      redirect('Login');
    }
    $this->load->model('service_model');

  }

  public function index()
  {   
    $data['result']=$this->service_model->get_all($where = array(), $order_by ='service_id ASC', $select = '*', $limit=array());
    $this->load->view('service',$data);
  }


  public function EditPage($id=Null)
   {
    $data['row']=$this->service_model->get($where = array('service_id'=>$id));
    $this->load->view('service/edit',$data);
   } 



  public function Update()
  {
    $id=$this->input->post('service_id');

    $data=array(
      'service_title'=>$this->input->post('service_title'),
      'service_title_en'=>$this->input->post('service_title_en'),
      'service_description'=>$this->input->post('service_description'),
      'service_description_en'=>$this->input->post('service_description_en'),
    );

    $result=$this->service_model->update(array('service_id'=>$id),$data);

    if ($result) {
        $message=MessageSuccessText("Güncelleme başarılı!");
        $this->session->set_flashdata('error_message',$message);

        redirect('service');
        }else{
        $message=MessageUnsuccessText("Güncelleme başarısız!");
        $this->session->set_flashdata('error_message',$message);
          
        redirect('service');
          }
  }
}
