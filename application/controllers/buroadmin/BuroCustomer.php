
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




}