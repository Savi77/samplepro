
<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Currency extends CI_Controller 
{
    
	public function __construct() 
    {
       parent::__construct();
       $this->load->model('BuroAdmin/Currency_model');
    }

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	        $this->load->model('BuroAdmin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();

			$data['sidebar']=array('menu' =>"Currency");			
			$data['MasterArray']=$this->Currency_model->get_list();		
			$this->load->view('BuroAdmin/CurrencyView',$data);
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
			$this->Currency_model->addDetails($formdata);
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
			$data['EditArray']=$this->Currency_model->EditDetails($privilege_id);
			$this->load->view('BuroAdmin/EditCurrencyeView',$data);

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
			$this->Currency_model->UpdateDetails($formdata);
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
			$this->Currency_model->DeleteDetails($privilege_id);

		}
		else
		{
		   redirect('BuroAdminLogin');
		}
	}



}