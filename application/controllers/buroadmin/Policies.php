<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Policies extends CI_Controller {
	public function index()
	{
		if(isset($this->session->id))
		{
			$this->load->model('BuroAdmin/Policies_Model');
			$data['Privacy_Policy_Data']=$this->Policies_Model->PrivacyPolicyData();
			$data['sidebar']=array('menu' =>"Privacy_Policy"); 
			$this->load->view('BuroAdmin/privacy_policy_view',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}

	public function Terms_of_Service()
	{
		if(isset($this->session->id))
		{
			$this->load->model('BuroAdmin/Policies_Model');
			$data['Terms_of_Service_Data']=$this->Policies_Model->TermsofServiceData();
			$data['sidebar']=array('menu' =>"Terms_of_Service"); 
			$this->load->view('BuroAdmin/terms_of_service_view',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}
	public function Refund_Cancellation_Policy()
	{
		if(isset($this->session->id))
		{
			$this->load->model('BuroAdmin/Policies_Model');
			$data['Refund_Cancellation_Policy']=$this->Policies_Model->RefundCancellationPolicyData();
			$data['sidebar']=array('menu' =>"Refund_Cancellation_Policy"); 
			$this->load->view('BuroAdmin/refund_cancellation_view',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}
	public function Add_Policies()
	{
		$this->load->model('BuroAdmin/Policies_Model');
		$data = array(
			'policies_type' => $this->input->post('type'),
			'policies_section' => $this->input->post('description'),
			'date_created' => date('Y-m-d H:i:s')
		);
		$this->Policies_Model->Add_Policies($data);	
	}

	public function Update_Policies()
	{
		$this->load->model('BuroAdmin/Policies_Model');
		$data = array(
			'policies_type' => $this->input->post('policies_type'),
			'policies_section' => $this->input->post('description'),
			'date_created' => date('Y-m-d H:i:s')
		);
		$this->Policies_Model->Update_Policies($data,$this->input->post('policies_id'));	
	}
}

?>