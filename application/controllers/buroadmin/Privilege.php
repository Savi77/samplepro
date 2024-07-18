
<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Privilege extends CI_Controller 
{

	public function __construct() 
    {
       parent::__construct();
       $this->load->model('BuroAdmin/Privilege_model');
    }

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	        $this->load->model('BuroAdmin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();

			$data['sidebar']=array('menu' =>"Privilege");			
			$data['MasterArray']=$this->Privilege_model->get_list();		
			$this->load->view('BuroAdmin/PrivilegeView',$data);
		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}

	public function add_privilege()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->Privilege_model->add_privilege($formdata);
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
			$data['EditArray']=$this->Privilege_model->EditDetails($privilege_id);
			$this->load->view('BuroAdmin/EditPrivilegeView',$data);

		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}

	public function UpdatePrivelege()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			$this->Privilege_model->UpdatePrivelege($formdata);
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
			$this->Privilege_model->DeleteDetails($privilege_id);

		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}



}