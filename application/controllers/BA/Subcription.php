<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcription extends CI_Controller 
{
	
	public function index()
	{
		if(isset($this->session->id))
		{
	         // Geofence Notification ---------------------------
	         $this->load->model('BuroAdmin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$this->load->model('BuroAdmin/Subcription_modal');
            $data['subcription_array']=$this->Subcription_modal->subcription();
            $data['get_data']=$this->Subcription_modal->get_data();
			$data['sidebar']=array('menu' =>"subcription"); 
			$this->load->view('BuroAdmin/subcription_view',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}
    public function Update_header()
	{
		if(isset($this->session->id))
		{
			$formdata =$this->input->post();
			$this->load->model('BuroAdmin/Subcription_modal');
			$this->Subcription_modal->Update_header($formdata);
  	    }
		else
		{
			redirect('BuroAdminLogin');
		}
	}
	public function Add_Subcription()
	{
		if(isset($this->session->id))
		{
			$this->load->model('BuroAdmin/Subcription_modal');
		    $subcriptionList=$this->input->post('subcriptionList');
            $description=$this->input->post('description');
            
			$data = $this->Subcription_modal->subcription_add($subcriptionList,$description);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}

}
