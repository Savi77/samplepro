
<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class BuroCustomer extends CI_Controller 
{

	public function __construct() 
    {
       parent::__construct();
       $this->load->model('BuroAdmin/BuroCustomer_model');
    }

	public function SubscribedCustomer()
	{
		if(isset($_SESSION['id']))
		{
	        $this->load->model('BuroAdmin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			$data['sidebar']=array('menu' =>"SubscribedCustomer");			
			$data['MasterArray']=$this->BuroCustomer_model->SubscribedCustomer();	

			// print_r($data['MasterArray']);

			$this->load->view('BuroAdmin/SubscribedCustomerView',$data);
		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}

	public function TrialCustomer()
	{
		if(isset($_SESSION['id']))
		{
	        $this->load->model('BuroAdmin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();

			$data['sidebar']=array('menu' =>"TrialCustomer");			
			$data['MasterArray']=$this->BuroCustomer_model->TrialCustomer();	
			// print_r($data['MasterArray']);	
			$this->load->view('BuroAdmin/TrialCustomerView',$data);
		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}

	public function AllCustomer()
	{
		if(isset($_SESSION['id']))
		{
	        $this->load->model('BuroAdmin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();

			$data['sidebar']=array('menu' =>"AllCustomer");			
			$data['MasterArray']=$this->BuroCustomer_model->AllCustomer();	
			// print_r($data['MasterArray']);	
			$this->load->view('BuroAdmin/AllCustomerView',$data);
		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}
    
	public function UnverifiedCustomer()
	{
		if(isset($_SESSION['id']))
		{
	        $this->load->model('BuroAdmin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			$data['sidebar']=array('menu' =>"UnverifiedCustomer");	
			$data['MasterArray']=$this->BuroCustomer_model->UnverifiedCustomer();			
			$this->load->view('BuroAdmin/UnverifiedCustomerView',$data);
		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}

	public function edit_period()
	{
		if(isset($_SESSION['id']))
		{
			$org_id = $this->input->post('org_id');
			$data['edit_data']=$this->BuroCustomer_model->edit_period($org_id);
			// echo "<pre>";
			// print_r($data['edit_data']);
			// die;
			$this->load->view('Admin/EditTrialPeriodView',$data);
		}  
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function Updateenddate()
	{
		if(isset($_SESSION['id']))
		{
			$data = $this->input->post();
			$this->BuroCustomer_model->UpdateEndDate($data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	




}