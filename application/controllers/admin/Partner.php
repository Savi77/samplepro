<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller 
{

	
	public function index()
	{
		// echo "1";
		if(isset($_SESSION['id']))
		{

	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------			
			$data['sidebar']=array('menu' =>"partner1");
			$this->load->view('Admin/partner_view');
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function add_code()
	{
		// echo "1";
		if(isset($_SESSION['id']))
		{
			$formdata = $this->input->post();
			$this->load->model('Admin/Partner_model');
			$this->Partner_model->partner_code($formdata);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function code_list()
	{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
	         
			$formdata = $this->input->post('userid');
			$this->load->model('Admin/Partner_model');
			$data['code_list']=$this->Partner_model->code_list();
			$this->load->view('Admin/partner_code_view',$data);
	}
}