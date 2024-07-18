
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GenerateBill extends CI_Controller
 {

  	public function __construct() 
     {
        parent::__construct();
        $this->load->model('GenerateBill_model');
     }

	public function index()
	{
		if(isset($this->session->user_id))
		{
		   $data['BillingDataArray']=$this->GenerateBill_model->GetBillingPartyList();
		   $data['LRDataArray']=$this->GenerateBill_model->GetLRList();
		   $data['TaxArray']=$this->GenerateBill_model->GetTaxArrayList();
		   $data['TaxArray']=$this->GenerateBill_model->GetTaxArrayList();
		   $this->load->view('GenerateBillView',$data);
		}
		else
		{
		   redirect('Login');
		}
	} 

  	public function GET_Invoice_Details()
	{
	   $LRNo=$this->input->post('LRNo');
	   $this->GenerateBill_model->GET_Invoice_Details($LRNo);
	}


  	public function SetInvoiceNO()
	{
	   $ProjectName=$this->input->post('ProjectName');
	   $this->GenerateBill_model->SetInvoiceNO($ProjectName);
	}


  	public function GET_Tax()
	{
	   $CGST=$this->input->post('CGST');
	   $this->GenerateBill_model->GET_Tax($CGST);
	}

  	public function GET_Tax2()
	{
	   $SGST=$this->input->post('SGST');
	   $this->GenerateBill_model->GET_Tax2($SGST);
	}
	

  	public function ViewInvoice()
	{
	   $this->GenerateBill_model->ViewInvoice2();
	}


  	public function DownloadInvoice()
	{
		$InvoiceNo=$this->input->get('InvoiceNo');
	   $this->GenerateBill_model->DownloadInvoice($InvoiceNo);
	}




  	public function GETProjectList()
	{
		$PartyID=$this->input->post('PartyID');		
	    $this->GenerateBill_model->GETProjectList($PartyID);
	}	

  	public function GETLRListOption()
	{
		$CustID=$this->input->post('CustID');		
	    $data['LRArray']=$this->GenerateBill_model->GETLRListOption($CustID);	    
	    $this->load->view('GETLRListOption',$data);
	}	

  	public function CancelInvoice()
	{
		$InvoiceNo=$this->input->post('InvoiceNo');		
	    $this->GenerateBill_model->CancelInvoice($InvoiceNo);	
	}
	
  	public function SendEmail()
	{
		$InvoiceNo=$this->input->post('InvoiceNo');		
	    $this->GenerateBill_model->SendEmail($InvoiceNo);	
	}
//--------------------------------------------------------------------------------------
	public function ViewData()
	{
		if(isset($this->session->user_id))
		{
			$data['listarray']=$this->GenerateBill_model->GetLRlistarray();
		   $this->load->view('ViewGenerateBillData',$data);
		}
		else
		{
		   redirect('Login');
		}
	} 

	public function AjaxData()
	{
	   $this->GenerateBill_model->AjaxData();
	}

//--------------------------------------------------------------------------------------

 



}