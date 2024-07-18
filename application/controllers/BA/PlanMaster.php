

<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class PlanMaster extends CI_Controller 
{

	public function __construct() 
    {
       parent::__construct();
       $this->load->model('BuroAdmin/Module_model');
    }

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	        $this->load->model('BuroAdmin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			$data['sidebar']=array('menu' =>"PlanMaster");			
			$data['MasterArray']=$this->Module_model->PlanMaster_list();	
			$data['module_list']=$this->Module_model->module_list();
			$this->load->view('BuroAdmin/PlanMasterView',$data);
		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}

	public function AddDetails()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->Module_model->AddDetailsPlanMaster($formdata);
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
			$plan_id=$this->input->post('plan_id');
			$data['EditArray']=$this->Module_model->EditDetailsPlanMaster($plan_id);
			$data['module_list']=$this->Module_model->module_list();
			$this->load->view('BuroAdmin/EditPlanView',$data);
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
			$this->Module_model->UpdateDetailsPlanMaster($formdata);
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
			$plan_id=$this->input->post('plan_id');
			$this->Module_model->DeleteDetailsPlanMaster($plan_id);
		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}








}







