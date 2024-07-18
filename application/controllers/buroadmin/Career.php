<?php 

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Career extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }
 //-------------------------------------------------------------------------------
 public function index()
  {
       if(isset($this->session->admin_id))
        {

            // geofence Notification ---------------------------
             $this->load->model('Admin/Dashboard_model');
             $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
            //------------------------------------------------

            $this->load->model('Admin/Userview');
            $data['career_array']=$this->Userview->viewcareer();

            //-------------------------------------------------------
              $this->load->model('Admin/Dashboard_model');
              $data['pending_userrewards']=$this->Dashboard_model->pending_userrewards(); //
           //----------------------------------------------------------
            $data['sidebar']=array('menu' =>"career"); 
            $this->load->view('Admin/career',$data);
        }
        else
        {
           redirect('admin/Dashboard');
        }
  }
  //--------------------------------------------------------------------------------
  public function insert()
       {
           $title=$this->input->post('title');
           $description=$this->input->post('inner_page_desc');
           //print_r($formdata);
          $this->load->model('Admin/Userview');
          $this->Userview->InsertCareer($title,$description);
       }
  //--------------------------------------------------------------------------------
  public function edit()
     {
         $editid=$_REQUEST['editid'];
         $this->load->model('Admin/Userview');
         $data['edit_career']=$this->Userview->edit_career($editid);

        // geofence Notification ---------------------------
         $this->load->model('Admin/Dashboard_model');
         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
        //------------------------------------------------
             
            $data['career_array']=$this->Userview->viewcareer();
            //-------------------------------------------------------
              $this->load->model('Admin/Dashboard_model');
              $data['pending_userrewards']=$this->Dashboard_model->pending_userrewards(); //
           //----------------------------------------------------------
            $data['sidebar']=array('menu' =>"career"); 
            // $this->load->view('admin/career',$data);
         // print_r($data['edit_career']->result());
         $this->load->view('Admin/edit_career',$data);
     }

//--------------------------------------------------------------------------------
    public function delete()
     {
         $deleteid=$this->input->post('deleteid');
         $this->load->model('Admin/Userview');
         $this->Userview->deleteCareer($deleteid);
     }
//--------------------------------------------------------------------------------
     public function update()
     {
         $editid=$this->input->post('editid');
         $title=$this->input->post('title');
         $description=$this->input->post('inner_page_desc');
         $this->load->model('Admin/Userview');
         $this->Userview->updateCareer($editid,$title,$description);
     }

}