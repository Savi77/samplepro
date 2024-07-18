
<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class TimeZoneMaster extends CI_Controller 
{

	public function __construct() 
    {
       parent::__construct();
       $this->load->model('BuroAdmin/TimeZoneMaster_model');
    }

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	        $this->load->model('BuroAdmin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();

			$data['sidebar']=array('menu' =>"TimeZoneMaster");			
			$data['MasterArray']=$this->TimeZoneMaster_model->get_list();		
			$this->load->view('BuroAdmin/TimeZoneMasterView',$data);
		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}

	public function addDetails()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->TimeZoneMaster_model->addDetails($formdata);
		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}

	public function EditDetails()
	{
		if(isset($_SESSION['id']))
		{
			$privilege_id=$this->input->post('privilege_id');
			$data['EditArray']=$this->TimeZoneMaster_model->EditDetails($privilege_id);
			$this->load->view('BuroAdmin/EditTimeZoneView',$data);

		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}

	public function UpdateDetails()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->TimeZoneMaster_model->UpdateDetails($formdata);
		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}

	public function DeleteDetails()
	{
		if(isset($_SESSION['id']))
		{
			$privilege_id=$this->input->post('privilege_id');
			$this->TimeZoneMaster_model->DeleteDetails($privilege_id);

		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}



}