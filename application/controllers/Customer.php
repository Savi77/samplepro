
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller
 {
 	
  	public function __construct() 
     {
       parent::__construct();
       $this->load->model('Customer_model');
     }

	public function index()
	{
		if(isset($this->session->user_id))
		{
		   $data['listarray']=$this->Customer_model->GetList();
		   $data['BillingPartylistarray']=$this->Customer_model->GetBillingPartyList();
		   $this->load->view('CustomerView',$data);
		}
		else
		{
		   redirect('Login');
		}
	} 


   public function InsertData()
	{   
      $inserarray=$this->input->post();
      $this->Customer_model->InsertData($inserarray);
	}

	public function DeleteData()
	{
	   $CustID=$_REQUEST['CustID'];
	   $this->Customer_model->DeleteData($CustID);
	}

	public function EditData()
	{
	   $CustID=$_REQUEST['CustID'];
	   $data['BillingPartylistarray']=$this->Customer_model->GetBillingPartyList();
	   $data['EditData']=$this->Customer_model->EditData($CustID);
	   $this->load->view('EditCustomerView',$data);
	}

	public function UpdateData()
	{
	   $CustID =$_REQUEST['CustID'];
	   $updatearray=$this->input->post();
       $this->Customer_model->UpdateData($updatearray,$CustID);
	}

//--------------------------------------------------------------------------
	public function FetchCustomerDetails()
	{
		$CustID=$_REQUEST['CustID'];
		$this->Customer_model->FetchCustomerDetails($CustID);
	}
	public function FetchVehicleDetails()
	{
		$VehicleID=$_REQUEST['VehicleID'];
		$this->Customer_model->FetchVehicleDetails($VehicleID);
	}

	public function UpdateRouteDetails()
	{
		$CustID=$_REQUEST['CustID'];
		$data['customer']=array('CustID'=>$CustID);
		$data['VehicleModelArray']=$this->Customer_model->VehicleModelArray();
		$data['UpdateRouteDetails']=$this->Customer_model->UpdateRouteDetails($CustID);
		$this->load->view('UpdateRouteDetailsView',$data);
	}	

	public function InsertRouteDetails()
	{
	   $updatearray=$this->input->post();
       $this->Customer_model->InsertRouteDetails($updatearray);
	}

	public function CustomerRouteDetails()
	{
		$CustID=$_REQUEST['CustID'];
		$data['UpdateRouteDetails']=$this->Customer_model->UpdateRouteDetails($CustID);
		$this->load->view('CustomerRouteDetails',$data);
	}	

	public function FetchFromToLocationCustomer()
	{
		$RouteID=$_REQUEST['RouteID'];
		$this->Customer_model->FetchFromToLocationCustomer($RouteID);
	}	



}
