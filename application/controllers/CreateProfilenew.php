
<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateProfile extends CI_Controller 
{	
	public function index()
	{
		$session_email_id=$this->input->post('email_id');
		$_SESSION['session_email']=$this->input->post('email_id');
		$this->load->model('Home_model');
		$data['PlanArray']=$this->Home_model->GetPlanArray();
		$this->load->view('Subscription',$data);
	}	

	public function EmailAuthentication()
	{
		$this->load->view('EmailAuthenticationView');
	}

	public function Add_module()
	{
		$this->load->model('Home_model'); 
		$module_id=$this->input->post('module_id');
		$this->Home_model->GETPrice($module_id);		
	}

	public function RegisterNewCompany()
	{
		 $encode=$this->input->get('url');
		 $decode=base64_decode($encode);
		 // print_r($decode);
		 $explode=explode("|", $decode);
		 $plan_id=$explode[1];
		 $module_id=$explode[2];
		 $no_of_user=$explode[3];
		 $price=$explode[4];
		 $type=$explode[5];

		 if(empty($plan_id))
		 {
		 	redirect('CreateProfile');
		 }
		 else
		 {
			$data['PlanArray']=array('plan_id'=>$plan_id,'module_id'=>$module_id,'no_of_user'=>$no_of_user,'price'=>$price,'type'=>$type);
			$this->session->session_email;
			$this->load->model('Home_model');
			$data['CountryArray'] = $this->Home_model->country_list();
			$data['TimeZoneArray'] = $this->Home_model->TimeZone_list();
			$data['CurrencyArray'] = $this->Home_model->Currency_list();			
			$this->load->view('RegisterNewCompanyView',$data);		 	
		 }
	}

	public function Custom_plan()
	{
		$this->load->model('CompanyRegistrationModel');
		$data['ModulesArray']=$this->CompanyRegistrationModel->GetModules();
        $this->load->view('CustomPlanView',$data);
	}

	public function GetStates()
	{
		$this->load->model('Home_model');
		$country_id=$this->input->post('country_id');
		$this->Home_model->GetStates($country_id);
	}

	public function OrderPlaced()
	{
        $this->load->view('OrderPlacedView');
	}

	public function TrialRegistration()
	{
        $this->load->view('TrialRegistrationView');
	}

	public function InsertDataCompany()
	{
		$this->load->model('CompanyRegistrationModel');
		$formdata=$this->input->post();	
		$image=$_FILES['fileup']['name'];
		if($formdata['subscription_type']=='trial')
		{
		   $data_res=$this->CompanyRegistrationModel->InsertDataCompany($formdata,$image);
		   if($data_res==2)
		   {
		   	  $this->session->set_flashdata('err', 'Provided email id is already exist. Please enter another email id');
		   	  redirect('CreateProfile/RegisterNewCompany?url=fDV8MSwyLDMsNHw1fDB8dHJpYWw=');
		   }
		   else
		   {
		   	 redirect('CreateProfile/TrialRegistration');
		   }
			
		}
		else
		{	
			$this->CompanyRegistrationModel->InsertDataCompany($formdata,$image);
			$data_res=$this->CompanyRegistrationModel->InsertDataCompany($formdata,$image);
			if($data_res==2)
		   	{
				$this->session->set_flashdata('err', 'Provided email id is already exist. Please enter another email id');
		   	}
		   	else
		   	{	   	 
				include('assets/ccavenue/Crypto.php');
				$merchant_data='';
				// $working_key='B67B540AA408362DF12BC28822553690'; //Local
				// $access_code='AVFC89GL19AK66CFKA';  // Local

				$working_key='4A25F90F05E9E377375E97538124CD24'; // Server
				$access_code='AVMR88GK77BA87RMAB'; //Server


				foreach ($_POST as $key => $value)
				{
				  $merchant_data.=$key.'='.$value.'&';
				}
				$encrypted_data=encrypt($merchant_data,$working_key); 			
				echo '<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 				
					      <input type=hidden name=encRequest value='.$encrypted_data.'>
				          <input type=hidden name=access_code value='.$access_code.'>
					  </form>				
					<script language="javascript">document.redirect.submit();</script>';

			}

		}
	}	



	public function ResponseHandler()
	{
		include('assets/ccavenue/Crypto.php');		
		//$workingKey='B67B540AA408362DF12BC28822553690';		//Local
		$workingKey='4A25F90F05E9E377375E97538124CD24';		//Server
		
		$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
		$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
		$order_status="";
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);
		for($i = 0; $i < $dataSize; $i++) 
		{
			$information=explode('=',$decryptValues[$i]);
			if($i==3)	$order_status=$information[1];
		}

		if($order_status==="Success")
		{
			$order=explode('=',$decryptValues[0]);
			$tracking_id=explode('=',$decryptValues[1]);
			$bank_ref_no=explode('=',$decryptValues[2]);
			$payment_mode=explode('=',$decryptValues[5]);
			$currency=explode('=',$decryptValues[9]);
			$amount=explode('=',$decryptValues[10]);
			$billing_name=explode('=',$decryptValues[11]);
			$billing_address=explode('=',$decryptValues[12]);
			$billing_city=explode('=',$decryptValues[13]);
			$billing_state=explode('=',$decryptValues[14]);
			$billing_zip=explode('=',$decryptValues[15]);
			$billing_country=explode('=',$decryptValues[16]);
			$billing_tel=explode('=',$decryptValues[17]);
			$billing_email=explode('=',$decryptValues[18]);
			$trans_date=explode('=',$decryptValues[40]);

			$InsertArray = array(
				'org_id' =>$_SESSION['insert_org_id'], 
				'order_id' =>$order[1],  	                  
				'tracking_id' =>$tracking_id[1], 
				'bank_ref_no' =>$bank_ref_no[1],
				'order_status' =>$order_status, 
				'payment_mode' =>$payment_mode[1],  
				'currency' =>$currency[1], 
				'amount' =>$amount[1],  
				'billing_name' =>$billing_name[1], 
				'billing_address' =>$billing_address[1], 
				'billing_city' =>$billing_city[1], 
				'billing_state' =>$billing_state[1], 
				'billing_zip' =>$billing_zip[1], 
				'billing_country' =>$billing_country[1], 
				'billing_tel' =>$billing_tel[1], 
				'billing_email' =>$billing_tel[1],
				'trans_date' =>date("Y-m-d H:i:s" ,strtotime($trans_date[1])), 
				'created_date' =>date('Y-m-d H:i:s') 
			);
			$res=$this->db->Insert('tbl_organasation_transction_history',$InsertArray);
			if($res)
			{				
			   redirect('CreateProfile/OrderPlaced');
			}			 	
		}
		else if($order_status==="Aborted")
		{
			echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
		
		}
		else if($order_status==="Failure")
		{
			echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
		}
		else
		{
			echo "<br>Security Error. Illegal access detected";
		
		}

   }

	public function VerificationProcess()
	{
		$params= $_SERVER['QUERY_STRING'];
		$string=base64_decode($params);
		$explode=explode("&", $string);	
		$emailinfo=$explode[0];
		$passinfo=$explode[1];
		$explodeemail=explode("=", $emailinfo);	
		$emailid=$explodeemail[1];
		$explodepassword=explode("=", $passinfo);	
		$password=$explodepassword[1];
		$_SESSION['session_email']=$emailid;
		header( "refresh:1;url=index" );
	}














}	