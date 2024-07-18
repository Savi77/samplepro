<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller
 {

	public function index()
	{
		if(isset($this->session->id))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('BuroAdmin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------			
			$this->load->model('BuroAdmin/Link_model');
			$data['get__linkdata']=$this->Link_model->get__linkdata();
			$data['get_data']=$this->Link_model->get_data();
			$data['sidebar']=array('menu' =>"playstorelink"); 
			$this->load->view('BuroAdmin/link_view',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}

	public function Update_link()
	{
		if(isset($this->session->id))
		{
			$formdata =$this->input->post();
			$this->load->model('BuroAdmin/Link_model');
			$this->Link_model->Update_link($formdata);
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
			$this->load->model('BuroAdmin/Link_model');
			$this->Link_model->Update_header($formdata);
  	    }
		else
		{
			redirect('BuroAdminLogin');
		}
	}

		public function profile_file()
		{
			if(isset($this->session->id))
			{
				$upload_file=$_FILES['upload_file']['name'];
				$formdata =$this->input->post();
				$this->load->model('BuroAdmin/Product_model');
				$this->Product_model->profile_file($upload_file,$formdata);
			}
			else
			{
				redirect('BuroAdminLogin');
			}
			
		}
	
}

