<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUs extends CI_Controller {

	
	public function index()
	{
		if(isset($this->session->id))
		{
			 // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
				
			$this->load->model('Admin/ContactUs_model');
			$data['Contact_details']=$this->ContactUs_model->Contact_details();
      		$data['sidebar']=array('menu' =>"contactus"); 
			$this->load->view('Admin/contactus_view',$data);
		}
		else
		{
			redirect('admin/Dashboard');
		}
		
	}

	

}
