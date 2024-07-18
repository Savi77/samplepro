<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	
	public function index()
	{
		if(isset($this->session->id))
		{
               // geofence Notification ---------------------------
               $this->load->model('Admin/Dashboard_model');
               $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
               //------------------------------------------------
                  
			$this->load->model('Admin/Notification_model');
      		$data['sidebar']=array('menu' =>"notification"); 
      		$data['customer_list']=$this->Notification_model->get_customer();
      		$data['emp_list']=$this->Notification_model->get_emp();
			$this->load->view('Admin/notification_view',$data);
		}
		else
		{
			redirect('admin/Dashboard');
		}
		
	}


	public function send_notification()
	{
		if(isset($this->session->id))
		{
			$this->load->model('Admin/Notification_model');
      		$selct_cust_emp=$this->input->post('selct_cust_emp');
      		if ($selct_cust_emp=='Customer')
      		{
      			$customer_id=$this->input->post('customer_id');
      			if (!empty($customer_id))
      			{
      				$customer_id1=$customer_id;
      			}
      			else
      			{
      				echo "2";
      			}
      		}
      		else if($selct_cust_emp=='Employee')
      		{
      			$emp_id=$this->input->post('emp_id');
      			if (!empty($emp_id))
      			{
      				$emp_id1=$emp_id;
      			}
      			else
      			{
      				echo "3";
      			}
      		}
      		
      		
      		$description=$this->input->post('description');
      		$this->Notification_model->send_notification($selct_cust_emp,$customer_id1,$emp_id1,$description);
		}
		else
		{
			redirect('admin/Dashboard');
		}
		
	}
}