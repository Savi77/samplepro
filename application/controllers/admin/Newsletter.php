<?php

error_reporting(0);

defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends CI_Controller 
 {

 public function index()
  {
       if(isset($this->session->admin_id))
        {
           // geofence Notification ---------------------------
           $this->load->model('Admin/Dashboard_model');
           $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
           //------------------------------------------------
            $this->load->model('admin/Dashboard_model');
            $data['pending_userrewards']=$this->Dashboard_model->pending_userrewards(); //
           //----------------------------------------------------------         
            // print_r($data['pending_userrewards']->result());

            $this->load->model('admin/Newsletter_model');
            $data['subscribed_user']=$this->Newsletter_model->fetch_subscribed_user();
            $data['register_user']=$this->Newsletter_model->fetch_register_user();

            $data['sidebar']=array('menu' =>"Newsletter"); 
            $this->load->view('admin/newsletter',$data);
        }
        else
        {
           redirect('admin/Dashboard');
        }
  }

//--------------------------------------------------------------------------

 public function sendmail()
  {
	    $content = $_REQUEST['content'];
	    $register = $_REQUEST['register'];
      $this->load->model('admin/Newsletter_model');
      $this->Newsletter_model->sendmail($content,$register);
  }

//--------------------------------------------------------------------------

   public function unsubscribe()
  {
      // echo "123";
      $QUERY_STRING=$_GET['u_email'];
      // echo $string=base64_decode($_get['u_email']);
      $this->load->model('admin/Newsletter_model');
      $data = $this->Newsletter_model->unsubscribe($QUERY_STRING);
       if ($data)
       {
          redirect('SignIn');
       }
       else
       {
          redirect('SignIn');
       }
  }

//--------------------------------------------------------------------------





}