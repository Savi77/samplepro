
<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateUser extends CI_Controller 
{

	public function index()
	{
		$plan_id=$_REQUEST['plan_id'];
		$type=$_REQUEST['type'];

		if(empty($plan_id))
		 {
		 	redirect('CreateProfile');
		 }
		 else
		 {		 	
			$this->load->model('CompanyRegistrationModel');
			$data['plan_list']=$this->CompanyRegistrationModel->plan_list($plan_id);
			$this->load->view('CreateUserView',$data);
		 }
	}	

	public function CustomPlan()
	{
		$plan_id=$_REQUEST['plan_id'];
		$type=$_REQUEST['type'];
		$module_ids=$_REQUEST['module_ids'];
		 if(empty($plan_id))
		 {
		 	redirect('CreateProfile');
		 }
		 else
		 {		 	
			$this->load->model('CompanyRegistrationModel');
			$data['plan_list']=$this->CompanyRegistrationModel->Custom_plan_list($plan_id,$module_ids);
			// echo json_encode($data['plan_list']);
			$this->load->view('CreateUserCustomView',$data);
		 }
	}	


	public function PaidPlanContinue()
	{
		$plan_id=$_REQUEST['plan_id'];
		$type='Paid';
		$this->load->model('CompanyRegistrationModel');
		$PlanDetails=$this->CompanyRegistrationModel->plan_list($plan_id);
		$details=$PlanDetails[0];
        $module_ids=$details['module_id'];
    
    	 if(empty($plan_id))
		 {
		 	redirect('CreateProfile');
		 }
		 else
		 {		 	
			$this->load->model('CompanyRegistrationModel');
			$data['plan_list']=$this->CompanyRegistrationModel->Custom_plan_list($plan_id,$module_ids);
			// print_r($data['plan_list']);
			$this->load->view('CreateUserPaidView',$data);
		 }
	}


	public function EncodeURL()
	{
		$type=$_REQUEST['type'];
		$plan_id=$_REQUEST['plan_id'];
		$pricefinal=$_REQUEST['pricefinal'];
		$module_id=$_REQUEST['module_id'];
		$number_of_users=$_REQUEST['number_of_users'];
		$string="|$plan_id|$module_id|$number_of_users|$pricefinal|$type";
		$encode=base64_encode($string);
		redirect("CreateProfile/RegisterNewCompany?url=$encode");
	}	


	
}	