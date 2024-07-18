
<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class FeatureList extends CI_Controller 
{

	public function __construct() 
    {
       parent::__construct();
       $this->load->model('BuroAdmin/FeatureList_model');
    }

	public function index()
	{
		if(isset($_SESSION['id']))	
		{
	        $this->load->model('BuroAdmin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			$data['sidebar']=array('menu' =>"FeatureList");			
			$data['MasterArray']=$this->FeatureList_model->get_list();	
			$data['privilege_list']=$this->FeatureList_model->get_privilege_list();		
			$this->load->view('BuroAdmin/FeatureListView',$data);
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
			$this->FeatureList_model->AddDetails($formdata);
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
			$component_id=$this->input->post('component_id');
			$data['EditArray']=$this->FeatureList_model->EditDetails($component_id);
			$data['privilege_list']=$this->FeatureList_model->get_privilege_list();		
			$this->load->view('BuroAdmin/EditFeatureListView',$data);

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
			$this->FeatureList_model->UpdateDetails($formdata);
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
			$component_id=$this->input->post('component_id');
			$this->FeatureList_model->DeleteDetails($component_id);
		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}



}