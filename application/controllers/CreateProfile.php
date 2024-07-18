<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateProfile extends CI_Controller 
{	
	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }  

	public function index()
	{
	      $session_email_id=$this->input->post('email_id');
	    //   $_SESSION['session_email']=$this->input->post('email_id');
		  $_SESSION['session_email'] = $this->session->session_email;
		  $this->load->model('Home_model');
		  $data['PlanArray']=$this->Home_model->GetPlanArray();
		  $data['trialDays'] = $this->Home_model->TrialDays();
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
			$data['CountryArray']=$this->Home_model->country_list();
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
		$get_url = $formdata['url'];
		
		if($formdata['subscription_type']=='trial')
		{
			$result = $this->CompanyRegistrationModel->InsertDataCompany($formdata);

			if($result == 0)
			{
				$this->session->set_flashdata('err', 'Given Company Name is already exist');
				// $this->session->set_flashdata('error-company', 'Given Company Name is already exist');
				redirect($get_url);
			}
			else if($result == 2)
            {
				$this->session->set_flashdata('err', 'Given Email is already exist');
				// $this->session->set_flashdata('error', 'Given Email is already exist');
				redirect($get_url);
			}
			else
			{
				redirect('CreateProfile/TrialRegistration');
			}
			// redirect('CreateProfile/TrialRegistration');
		}
		else
		{	
			$this->CompanyRegistrationModel->InsertDataCompany($formdata);
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

             $insert_org_id=$_SESSION['insert_org_id'];

             if(!empty($insert_org_id))
             {
             	$org_id=$insert_org_id;
             }
             else
             {
             	// $org_id=$insert_org_id;
             	$this->db->order_by("subscription_id", "desc");
		        $this->db->limit(1);
		        $subscriptionresult=$this->db->get('tbl_plan_subscription')->row();
		        $org_id=$subscriptionresult->org_id;
             }


			 $InsertArray = array(
				'org_id' =>$org_id, 
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
		
		// $_SESSION['session_email']=$emailid;

	      $userData = array(
	                          'session_email'=>$emailid
	                        );
	      $this->session->set_userdata($userData);

		redirect('CreateProfile');
		// header( "refresh:1;url=index" );
	}

	public function Forgotpasswordview()
	{
		$data['str'] = $this->uri->segment(3);
		$this->load->view('forgotpasswordview',$data);
	}

	public function PasswordReset()
	{
		$str = $this->input->post('email');
		$password = $this->input->post('password');
		$cpassword = $this->input->post('cpassword');
		$email = base64_decode($str);
        
		// $this->form_validation->set_rules('password', 'Password', 'required');
        // $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[confirm_password]');      
		
		// // $email = substr($decode_email, 9);
        // if ($this->form_validation->run() == FALSE) 
		// {
		// 	echo "<script>alert('Confirm Password should be match with Password')</scrip>";
		// }
		// else
		// {
			$check = $this->db->select('*')->from('tbl_admin_login')->where('email',$email)->get()->row();
		
			if(!empty($check))
			{
				$this->db->set('password',$password);
				$this->db->where('email',$email);
				$result = $this->db->update('tbl_admin_login');
				redirect('SignIn');
			}
			else
			{
				echo "<script>alert('Something went wrong')</scrip>";
			}
		// }
		
	}

}	