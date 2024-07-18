<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

//========================= Customer add/ edit/ delete ============================================ 

	public function index()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Schedule_model');
			$data['schedule_list']=$this->Schedule_model->Issue();
			$data['assign_issue']=$this->Schedule_model->assign_task();
			$data['customer_list']=$this->Schedule_model->customer_list();
			$this->load->view('Admin/schedule_list_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	 //------------------------------------------
	public function getstate()
	{
		$country_id=$this->input->post('country_id');
		$this->load->model('Admin/Customer_model');
		$this->Customer_model->getstate($country_id); 
	}

	public function Add_customer()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Customer_model');
			$formdata = $this->input->post();
			// print_r($formdata);
			$this->Customer_model->Add_customer($formdata);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function delete_customer()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Customer_model');
		   	$customerid = $this->input->post('customerid');
			$data=$this->Customer_model->delete_customer($customerid);
			if ($data) 
			{
				echo "1";
			}
			else
			{
				echo "0";
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function edit_customer()
	{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Customer_model');
		    $customerid = $this->input->post('customerid');
		    $data['edit_customerresult']=$this->Customer_model->edit_customer($customerid);

		    $data['type_list1']=$this->Customer_model->type_list();
			$data['location_list1']=$this->Customer_model->location_list();
			$data['business_list1']=$this->Customer_model->business_list();
			$data['group_list1']=$this->Customer_model->group_list();
			$data['country_list1']=$this->Customer_model->country_list();
			$data['selected_state_list']=$this->Customer_model->selected_state_list($customerid);
			$this->load->view('Admin/edit_customer_view',$data);
	}

	 public function update() 
      {
        	$this->load->model('Admin/Customer_model');
			$formdata = $this->input->post();
			// print_r($formdata);
			$this->Customer_model->update_customer($formdata);
      }


//=========================  / Customer add/ edit/ delete ============================================ 

	public function Issue()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$this->load->model('Admin/Customer_model');
			$data['customer_issue']=$this->Customer_model->Issue();
			$this->load->view('Admin/customer_issue_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}


	public function assign_task()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$query_id = $this->input->post('query_id');
			$data['query']=array('query_id'=>$query_id);
			$this->load->model('Admin/Customer_model');
			$data['assign_issue']=$this->Customer_model->assign_task();
			$this->load->view('Admin/assign_to_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function assign_to()
	{
		if(isset($_SESSION['id']))
		{
			$query_id = $this->input->post('query_id');
			$employee = $this->input->post('employee');
			$start_date = $this->input->post('start_date');
			$event_start_time = $this->input->post('event_start_time');
			$event_end_time = $this->input->post('event_end_time');
			// print_r($employee);
			if (empty($employee)) 
			{
				echo 0;
			}
			else
			{
				$this->load->model('Admin/Customer_model');
				$this->Customer_model->assign_to($query_id,$employee,$start_date,$event_start_time,$event_end_time);
			}
			
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function availability()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
	         
			$start_date = $this->input->post('start_date');
			$start_time = $this->input->post('start_time');
			$end_time = $this->input->post('end_time');
			// print_r($employee);
			$this->load->model('Admin/Customer_model');
			$data['available']=$this->Customer_model->availability($start_date,$start_time,$end_time);
			$this->load->view('Admin/employee_available_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

		public function change_status()
	{
		if(isset($_SESSION['id']))
		{
			$query_id = $this->input->post('query_id');
			$description = $this->input->post('description');
			$status_update = $this->input->post('status_update');
			$this->load->model('Admin/Customer_model');
			$this->Customer_model->change_status($query_id,$description,$status_update);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

}
