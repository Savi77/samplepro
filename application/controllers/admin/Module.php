

<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends CI_Controller 
{

	public function __construct() 
    {
       parent::__construct();
       $this->load->model('Admin/Module_model');
    }

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			$data['sidebar']=array('menu' =>"Module");			
			$data['MasterArray']=$this->Module_model->get_list();	
			$data['component_list']=$this->Module_model->component_list();		
			$this->load->view('Admin/ModuleView',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function AddDetails()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->Module_model->AddDetails($formdata);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function EditDetails()
	{
		if(isset($_SESSION['id']))
		{
			$module_id=$this->input->post('module_id');
			$data['EditArray']=$this->Module_model->EditDetails($module_id);
			$data['component_list']=$this->Module_model->component_list();
			$this->load->view('Admin/EditModuleView',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function UpdateDetails()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->Module_model->UpdateDetails($formdata);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function DeleteDetails()
	{
		if(isset($_SESSION['id']))
		{
			$module_id=$this->input->post('module_id');
			$this->Module_model->DeleteDetails($module_id);
		}
		else
		{
		   redirect('admin/Login');
		}
	}



}







