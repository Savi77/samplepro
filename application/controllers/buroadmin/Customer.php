<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller 
{
	public function index()
	{
		if(isset($_SESSION['id']))
		{
			// Geofence Notification ---------------------------------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //--------------------------------------------------------------------------
			$this->load->model('Admin/Customer_model');
			$data['sidebar']=array('menu' =>"cust");
			$data['array_customer']=$this->Customer_model->manage_customer();
			$data['primary_customer']=$this->Customer_model->primary_customer();
			$data['type_list']=$this->Customer_model->type_list();
			$data['schedule_list']=$this->Customer_model->schedule_list();
			$data['location_list']=$this->Customer_model->location_list();
			$data['business_list']=$this->Customer_model->business_list();
			$data['group_list']=$this->Customer_model->group_list();
			$data['country_list']=$this->Customer_model->country_list();
			$this->load->view('Admin/customer_view',$data);
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
	    $data['editprimary_customer']=$this->Customer_model->primary_customer();
	    $res = $data['edit_customerresult']->result();
		$get_businessid = $res[0]->business_id;
		$data['selected_buss']=$this->Customer_model->mult_buss_list($get_businessid);
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
		$this->Customer_model->update_customer($formdata);
      }

	 public function update_lead_customer() 
      {
    	$this->load->model('Admin/Customer_model');
		$formdata = $this->input->post();
		$this->Customer_model->update_lead_customer($formdata);
      }


	public function IssueAjaxData()
	{
		$this->load->model('Admin/Customer_model');
	   $this->Customer_model->IssueAjaxData();
	}

	public function RescheduleIssueAjaxData()
	{
		$this->load->model('Admin/Customer_model');
	   $this->Customer_model->RescheduleIssueAjaxData();
	}

	public function CompleteIssueAjaxData()
	{
		$this->load->model('Admin/Customer_model');
	   $this->Customer_model->CompleteIssueAjaxData();
	}

	public function Issue()
	{
		if(isset($_SESSION['id']))
		{
			if($this->session->user_type=='SA' OR $this->session->schedule_view=='1')
            {
				 // Geofence Notification ---------------------------
		         $this->load->model('Admin/Dashboard_model');
		         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
		        //------------------------------------------------	
            	$data['sidebar']=array('menu' =>"issue");
				$this->load->model('Admin/Customer_model');
				$data['customer_list']=$this->Customer_model->customer_list();
				$data['employee_list']=$this->Customer_model->employee_list();
				$data['product_list']=$this->Customer_model->product_list();
				$data['schedule_visit_list']=$this->Customer_model->schedule_visit_list();
				$this->load->view('Admin/customer_issue_view',$data);
			}
			else
			{
				// Geofence Notification ---------------------------
		        $this->load->model('Admin/Dashboard_model');
		        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
		        //------------------------------------------------
				$data['sidebar']=array('menu' =>"issue");
				$this->load->model('Admin/Customer_model');
				$data['customer_issue']=$this->Customer_model->emp_issue();
				$data['customer_list']=$this->Customer_model->customer_list();
				$data['employee_list']=$this->Customer_model->employee_list();
				$data['product_list']=$this->Customer_model->product_list();
				$data['schedule_visit_list']=$this->Customer_model->schedule_visit_list();
				$this->load->view('Admin/employee_issue_list',$data);
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}

	// Add Activity Task for lead and opportunity 
	public function AddActivityTask()
	{
		if(isset($_SESSION['id']))
		{
			$leadopp_id = $this->input->get('leadopp_id');
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
        	$data['sidebar']=array('menu' =>"issue");
			$this->load->model('Admin/Customer_model');
			
			$data['GetLeadDetails']=$this->Customer_model->GetLeadDetails($leadopp_id);
			$customer_id=$data['GetLeadDetails']->company_id;			
			$id=$data['GetLeadDetails']->assign_to;
			$product_id=$data['GetLeadDetails']->product_id;
			$data['customer_list']=$this->Customer_model->customer_list_task($customer_id);
			$data['employee_list']=$this->Customer_model->employee_list_task($id);
			$data['product_list']=$this->Customer_model->product_list_task($product_id);
			$data['schedule_visit_list']=$this->Customer_model->schedule_visit_list();
			// // print_r($data['GetLeadDetails']);
			$this->load->view('Admin/AddActivityTaskView',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}


	public function ScheduleReport()
	{
		if(isset($_SESSION['id']))
		{		
			 // Geofence Notification ---------------------------
		     $this->load->model('Admin/Dashboard_model');
		     $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
		    //------------------------------------------------	
			$type = $_REQUEST['Type'];
	    	$data['sidebar']=array('menu' =>$type);
			$this->load->model('Admin/Customer_model');
			$data['customer_issue']=$this->Customer_model->ScheduleReport($type);
			$data['customer_list']=$this->Customer_model->customer_list();
			$data['employee_list']=$this->Customer_model->employee_list();
			$data['product_list']=$this->Customer_model->product_list();
			$data['schedule_visit_list']=$this->Customer_model->schedule_visit_list();
			$this->load->view('Admin/ScheduleReportView',$data);
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

	public function assign_task1()
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
			$this->load->view('Admin/reschedule_assign_to_view',$data);
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
			$employee = $this->input->post('employee_id');
			$schedule_date = $this->input->post('schedule_date');
			$start_time = $this->input->post('start_time');
			$end_time = $this->input->post('end_time');
			$this->load->model('Admin/Customer_model');
			$this->Customer_model->assign_to($query_id,$employee,$schedule_date,$start_time,$end_time);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function reschedule_assign_to()
	{
		if(isset($_SESSION['id']))
		{
			$query_id = $this->input->post('query_id');
			$employee = $this->input->post('employee_id');
			$schedule_date = $this->input->post('schedule_date');
			$start_time = $this->input->post('start_time');
			$end_time = $this->input->post('end_time');
			$this->load->model('Admin/Customer_model');
			$this->Customer_model->reschedule_assign_to($query_id,$employee,$schedule_date,$start_time,$end_time);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function assign_to_override()
	{
		if(isset($_SESSION['id']))
		{
			$query_id = $this->input->post('query_id');
			$employee = $this->input->post('employee_id');
			$schedule_date = $this->input->post('schedule_date');
			$start_time = $this->input->post('start_time');
			$end_time = $this->input->post('end_time');
			$this->load->model('Admin/Customer_model');
			$this->Customer_model->assign_to_override($query_id,$employee,$schedule_date,$start_time,$end_time);
			
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function reschedule_assign_to_override()
	{
		if(isset($_SESSION['id']))
		{
			$query_id = $this->input->post('query_id');
			$employee = $this->input->post('employee_id');
			$schedule_date = $this->input->post('schedule_date');
			$start_time = $this->input->post('start_time');
			$end_time = $this->input->post('end_time');
			$this->load->model('Admin/Customer_model');
			$this->Customer_model->reschedule_assign_to_override($query_id,$employee,$schedule_date,$start_time,$end_time);
			
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
			$start_date = $this->input->post('start_date');
			$start_time = $this->input->post('start_time');
			$end_time = $this->input->post('end_time');
			$employee_id1 = $this->input->post('employee_id1');
			// print_r($employee);
			$this->load->model('Admin/Customer_model');
			$this->Customer_model->availability($start_date,$start_time,$end_time,$employee_id1);
			// $this->load->view('Admin/employee_available_view',$data);
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


	// =========================================== Schedule functions ========================================
	public function getassignedissue()
	{
		if(isset($_SESSION['id']))
		{
			 // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
				
			$schedule_date = $this->input->post('schedule_date');
            $employee_id = $this->input->post('employee_id');
       		$this->load->model('Admin/Customer_model');
			$data['issue_detail_list']=$this->Customer_model->getassignedissue($schedule_date,$employee_id);
			// print_r($data['issue_detail_list']);
			$this->load->view('Admin/employee_allocated_issue',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function add_schedule()
	{
		if(isset($_SESSION['id']))
		{
			$formdata = $this->input->post();
			$this->load->model('Admin/Customer_model');
			$this->Customer_model->add_schedule($formdata);
		}
		else
		{
			redirect('admin/Login');
		}
	}


	public function add_schedule_overright()
	{
		if(isset($_SESSION['id']))
		{
			$formdata = $this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/Customer_model');
			$this->Customer_model->add_schedule_overright($formdata);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}
	// ==========================================================================================================

	// =================================================== Priority ==================================================

	public function priority_normal()
	{
			$this->load->model('Admin/Customer_model');
		   	$query_id = $this->input->post('query_id');
			$this->Customer_model->priority_normal($query_id);
	}

	public function priority_low()
	{
			$this->load->model('Admin/Customer_model');
		   	$query_id = $this->input->post('query_id');
			$this->Customer_model->priority_low($query_id);
	}

	public function priority_high()
	{
			$this->load->model('Admin/Customer_model');
		   	$query_id = $this->input->post('query_id');
			$this->Customer_model->priority_high($query_id);
	}

	public function remark_list()
	{
			 // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
				

			$this->load->model('Admin/Customer_model');
		   	$ticket_no = $this->input->post('ticket_no');
			$data['remark_list']=$this->Customer_model->remark_list($ticket_no);
			// print_r($data['remark_list']);
			$result = $data['remark_list'];
			if ($result==0)
			{
				echo "0";
			}
			else
			{
				$this->load->view('Admin/employee_remark_view',$data);
			}
			
	}

	public function bill_list()
	{

			 // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
				

			$this->load->model('Admin/Customer_model');
		   	$ticket_no = $this->input->post('ticket_no');
		   	$data['remark_list']=$this->Customer_model->remark_list($ticket_no);
			$data['bill_list']=$this->Customer_model->bill_list($ticket_no);
			// print_r($data['bill_list']);
			// $result = $data['bill_list'];
			// if ($result==0)
			// {
			// 	echo "0";
			// }
			// else
			// {
				$this->load->view('Admin/employee_billing_view',$data);
			// }
			
	}

	public function reschedule_list()
	{
			 // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
				
		
			$this->load->model('Admin/Customer_model');
		   	$query_id = $this->input->post('query_id');
			$data['reschedule_list']=$this->Customer_model->reschedule_list($query_id);
			// print_r($data['reschedule_list']);
			$result = $data['reschedule_list'];
			$count = count($result);
			if ($count==0)
			{
				echo "0";
			}
			else
			{
				// echo "1";
				$this->load->view('Admin/reschedule_employee_view',$data);
			}
			
	}

	public function update_price()
	{
			$this->load->model('Admin/Customer_model');
		   	$achieve_id = $this->input->post('achieve_id');
		   	$adm_approved_price = $this->input->post('adm_approved_price');
		   	$targettype_id = $this->input->post('targettype_id');
			$this->Customer_model->update_price($achieve_id,$adm_approved_price,$targettype_id);	
	}

}
