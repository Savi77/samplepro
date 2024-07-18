<?php
	
error_reporting(0);	
defined('BASEPATH') OR exit('No direct script access allowed');

class LRData extends CI_Controller
 {

//-------------------------------------------------------------
  	public function __construct() 
     {
         parent::__construct();
         $this->load->model('LRData_model');
         $this->load->model('LROperation_model');
     }
//-------------------------------------------------------------
	public function index()
	{
		if(isset($this->session->user_id))
		{
		      $this->load->model('Dashboard_model');
		      $data['CompanyList']=$this->Dashboard_model->GetCompanyList();
			  $data['companylistarray']=$this->LRData_model->GetCompanyList();	
			  $data['driverlistarray']=$this->LRData_model->GetDriverList();
			  $data['customerlistarray']=$this->LRData_model->GetCustomerList();
			  $data['vehiclelistarray']=$this->LRData_model->GetVehicleList();
			  $data['debtorlistarray']=$this->LRData_model->GetDebtorList();
			  $data['Vendorlistarray']=$this->LRData_model->GetVendorlist();
			  $data['VehicleModelArray']=$this->LRData_model->GetVehicleModelList();	
			  $data['BillingPartylistarray']=$this->LRData_model->GetBillingPartyList();
			  $data['Specificationlistarray']=$this->LRData_model->Specificationlistarray();
			  $data['ExpenseHeadlistarray']=$this->LRData_model->ExpenseHeadlistarray();
			  $data['LRCompany']=$this->LRData_model->GetLRCompany(); //
			  $this->load->view('CreateLRView',$data);
    	}
		else
		{
		  redirect('Login');
		}
	} 
//-------------------------------------------------------------
	public function InsertData()
	{   
       $inserarray=$this->input->post();
       // print_r($inserarray);
       $this->LRData_model->InsertData($inserarray);
	}

	public function UpdateData()
	{   
       $inserarray=$this->input->post();
       // print_r($updateArray);
       $this->LROperation_model->UpdateData($inserarray);
	}


	public function CheckLRExist()
	{   
       $LRNo=$this->input->post('LRNo');
       // print_r($updateArray);
       $this->LROperation_model->CheckLRExist($LRNo);
	}

//-------------------------------------------------------------
	public function InsertTripshhetCost()
	{  
       $TripsheetNo=$_REQUEST['TripsheetNo'];
       $TripCost=$_REQUEST['TripCost'];
       $DriverID=$_REQUEST['DriverID'];
       $DriverMobile=$_REQUEST['DriverMobile'];
       $VendorID=$_REQUEST['VendorID'];
       $VehicleType=$_REQUEST['VehicleType'];
       $VehicleNoMaster=$_REQUEST['VehicleNoMaster'];
       $VehicleNoenter=$_REQUEST['VehicleNoenter'];
       $ModelID=$_REQUEST['ModelID'];
       $TripsheetFromLocation=$_REQUEST['TripsheetFromLocation'];
       $TripsheetToLocation=$_REQUEST['TripsheetToLocation'];
       $this->LRData_model->InsertTripsheetCost($TripsheetNo,$TripCost,$DriverID,$VendorID,$VehicleType,$VehicleNoMaster,$VehicleNoenter,$ModelID,$DriverMobile,$TripsheetFromLocation,$TripsheetToLocation);
	}

	public function AdditionalTripsheetCreate()
	{  
       $TripsheetNo=$_REQUEST['TripsheetNo'];
       $LRNo=$_REQUEST['LRNo'];
       $TripCost=$_REQUEST['TripCost'];
       $DriverID=$_REQUEST['DriverID'];
       $DriverMobile=$_REQUEST['DriverMobile'];
       $VendorID=$_REQUEST['VendorID'];
       $VehicleType=$_REQUEST['VehicleType'];
       $VehicleNoMaster=$_REQUEST['VehicleNoMaster'];
       $VehicleNoenter=$_REQUEST['VehicleNoenter'];
       $ModelID=$_REQUEST['ModelID'];
       $TripsheetFromLocation=$_REQUEST['TripsheetFromLocation'];
       $TripsheetToLocation=$_REQUEST['TripsheetToLocation'];
       $this->LRData_model->AdditionalTripsheetCreate($TripsheetNo,$LRNo,$TripCost,$DriverID,$VendorID,$VehicleType,$VehicleNoMaster,$VehicleNoenter,$ModelID,$DriverMobile,$TripsheetFromLocation,$TripsheetToLocation);
	}








//-------------------------------------------------------------
	public function TripsheetCostDetails()
	{   
       $TripsheetNo=$_REQUEST['TripsheetNo'];
       $this->LRData_model->TripsheetCostDetails($TripsheetNo);
	}
//-------------------------------------------------------------
	public function EncodeLR()
	{
      $LRNo = $_REQUEST['LRNo'];
      $redi_url='LRNo='.$LRNo;
      echo $url=base64_encode($redi_url);
	}

    public function EditLR()
	{   
		$data['companylistarray']=$this->LRData_model->GetCompanyList();	
		$data['driverlistarray']=$this->LRData_model->GetDriverList();
		$data['customerlistarray']=$this->LRData_model->GetCustomerList();
		$data['vehiclelistarray']=$this->LRData_model->GetVehicleList();
		$data['debtorlistarray']=$this->LRData_model->GetDebtorList();
		$data['Vendorlistarray']=$this->LRData_model->GetVendorlist();
		$data['VehicleModelArray']=$this->LRData_model->GetVehicleModelList();	
		$data['BillingPartylistarray']=$this->LRData_model->GetBillingPartyList();
		$params= $_SERVER['QUERY_STRING'];
		$string=base64_decode($params);
		$explode=explode("=", $string);
		$LRNo=$explode[1];
		$data['EditLRData']=$this->LROperation_model->EditLR($LRNo);
		//print_r($data['EditLRData']);

		$CustID=$data['EditLRData'][0]->CustID;
		$FromToLocation=$data['EditLRData'][0]->EditLRData;
		$data['RouteArray']=$this->LROperation_model->GetRouteArray($CustID);	

		$PartyID=$data['EditLRData'][0]->PartyID;
		$data['PartyCustomerArray']=$this->LRData_model->PartyCustomerArray($PartyID);	

		// print_r($data['RouteArray']);
		$this->load->view('EditLRView',$data);
	}

    public function GetVehicleNo()
	{   
       // $ModelID=$_REQUEST['ModelID'];
       $this->LRData_model->GetVehicleNo();
	}

    public function FetchBillingCustomer()
	{   
       $PartyID=$_REQUEST['PartyID'];
       $this->LRData_model->FetchBillingCustomer($PartyID);
	}

    public function GetLoadingCharges()
	{   
       $RouteID=$_REQUEST['RouteID'];
       $this->LRData_model->GetLoadingCharges($RouteID);
	}

    public function GetUnionCharges()
	{   
       $RouteID=$_REQUEST['RouteID'];
       $this->LRData_model->GetUnionCharges($RouteID);
	}

    public function GetDeliveryCharges()
	{   
       $RouteID=$_REQUEST['RouteID'];
       $this->LRData_model->GetDeliveryCharges($RouteID);
	}

    public function GetDetentionCharges()
	{   
       $RouteID=$_REQUEST['RouteID'];
       $this->LRData_model->GetDetentionCharges($RouteID);
	}




}
