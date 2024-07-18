<?php 

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }
 
  public function index()
  {
    redirect('BuroAdminLogin');
  }

  public function view_dashboard() 
  {
     if(isset($this->session->id))
      {
          $this->load->model('BuroAdmin/Dashboard_model');
          $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
          $data['summaryarray']=$this->Dashboard_model->summary();
          $data['sidebar']=array('menu' =>"dashboard"); 
          $this->load->view('BuroAdmin/dashboardview',$data);
      }
      else
      {
        redirect('BuroAdminLogin');
      }
  }
 

}