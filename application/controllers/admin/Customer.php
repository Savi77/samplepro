<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller 
{
	public function index()
	{
		if(isset($_SESSION['id'])){
			//delete_status 0 = enable & 1 = disable
			// Geofence Notification ---------------------------------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //--------------------------------------------------------------------------
			$this->load->model('Admin/Customer_model');
			$data['sidebar']=array('menu' =>"cust");
			$data['array_customer'] = $this->Customer_model->manage_customer();
			//var_dump($data['array_customer']->result());
			//exit;
			$data['primary_customer'] = $this->Customer_model->primary_customer();
			$data['type_list']=$this->Customer_model->type_list();
			$data['schedule_list']=$this->Customer_model->schedule_list();
			$data['location_list']=$this->Customer_model->location_list();
			$data['business_list']=$this->Customer_model->business_list();
			$data['group_list']=$this->Customer_model->group_list();
			$data['country_list']=$this->Customer_model->country_list();
			$data['state_list']=$this->Customer_model->state_list();
			$data['credit_term']=$this->Customer_model->credit_term();
			$data['account_manager']=$this->Customer_model->account_manager();

			// print_r($data['array_customer']);
			// echo json_encode($data['array_customer']->result());		
			// $this->load->view('Admin/customer_view',$data);
			// User Permission Functionality ------------
			// module_id = 1, feature id = 5 for expense management , Privilegeids for expense management= 1,2,3,4
			$permission_array = array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>1);
			$data['user_permission']=$this->Dashboard_model->get_user_permission($permission_array);
			//------------------------------------------
			$data['type'] = 's_link';
			$data['page_name'] = 'Contact Management';

			// $this->load->view('Admin/customer_newui_view',$data);
			$this->load->view('Admin/new_customer_newui_view',$data);
			// $this->load->view('Admin/customer_newui_view2',$data);
			
		}else{
			redirect('admin/Login');
		}
	}

	public function add()
	{
		if(isset($_SESSION['id']))
		{
			//delete_status 0 = enable & 1 = disable
			// Geofence Notification ---------------------------------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //--------------------------------------------------------------------------
			$this->load->model('Admin/Customer_model');
			
			$data['array_customer'] = $this->Customer_model->manage_customer();
			$data['primary_customer'] = $this->Customer_model->primary_customer();
			$data['type_list']=$this->Customer_model->type_list();
			$data['schedule_list']=$this->Customer_model->schedule_list();
			$data['location_list']=$this->Customer_model->location_list();
			$data['business_list']=$this->Customer_model->business_list();
			$data['group_list']=$this->Customer_model->group_list();
			$data['country_list']=$this->Customer_model->country_list();
			$data['state_list']=$this->Customer_model->state_list();
			$data['credit_term']=$this->Customer_model->credit_term();
			$data['account_manager']=$this->Customer_model->account_manager();

			$permission_array = array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>1);
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Customer';
			$data['page_name_1'] = 'Contact Management';
			$data['page_name_2'] = 'Add Contact';
			$data['sidebar']=array('menu' =>"cust");
			$this->load->view('Admin/add_contact',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function Demo()
	{
		if (count($_REQUEST['updateFiled']) == 0) {
			$data = array(
				'count' => count($_REQUEST['updateFiled'])
			);
			echo json_encode($data);
		}else {
			$data = array(
				'count' => count($_REQUEST['updateFiled']),
				'customer_id' => implode(',',$_REQUEST['updateFiled'])
			);
			echo json_encode($data);
		}
	}

	public function updateFiledData()
	{
		$type = $this->input->post('UpdateFieldChange');
		$customer_id = explode(',',$this->input->post('custome_id')); 
		if ($type == 'account_manager') {
			$this->db->set('account_manager',implode(',',$this->input->post($type)));
			$this->db->where_in('customer_id',$customer_id);
			$this->db->update('tbl_customer');		
			echo 'Account Manager';
		}elseif ($type == 'location') {
			$this->db->set('location_id',$this->input->post($type));
			$this->db->where_in('customer_id',$customer_id);
			$this->db->update('tbl_customer');	
			echo 'Location';
		}elseif ($type == 'segment') {
			$this->db->set('business_id',implode(',',$this->input->post($type)));
			$this->db->where_in('customer_id',$customer_id);
			$this->db->update('tbl_customer');	
			echo 'Segment';
		}elseif ($type == 'group') {
			$this->db->set('group_id',$this->input->post($type));
			$this->db->where_in('customer_id',$customer_id);
			$this->db->update('tbl_customer');
			echo 'Group';
		}elseif ($type == 'credit_terms') {
			$this->db->set('credit_term',$this->input->post($type));
			$this->db->where_in('customer_id',$customer_id);
			$this->db->update('tbl_customer');
			echo 'Credit Terms';
		}elseif ($type == 'country') {
			$this->db->set('country',$this->input->post($type));
			$this->db->where_in('customer_id',$customer_id);
			$this->db->update('tbl_customer');
			echo 'Country';
		}elseif ($type == 'state') {
			$this->db->set('state',$this->input->post($type));
			$this->db->where_in('customer_id',$customer_id);
			$this->db->update('tbl_customer');
			echo 'State';
		}elseif ($type == 'city') {
			$this->db->set('city',$this->input->post($type));
			$this->db->where_in('customer_id',$customer_id);
			$this->db->update('tbl_customer');
			echo 'City';
		}elseif ($type == 'registration_type') {
			$this->db->set('registration_type',$this->input->post($type));
			$this->db->where_in('customer_id',$customer_id);
			$this->db->update('tbl_customer');
			echo 'Registration Type';
		}
		exit;
	}
	public function add_activity()
	{
		$this->load->model('Admin/Customer_model');
		$this->load->model('Admin/Reminder_model');
		$data['customer_id'] = $this->input->post('customerid');
		$data['customer_list'] = $this->Customer_model->customer_list();
		$data['employee_list']=$this->Customer_model->employee_list();
		$data['product_list']=$this->Customer_model->product_list();
		$data['schedule_visit_list']=$this->Customer_model->schedule_visit_list();
		$data['incomplete_issue_list']=$this->Customer_model->incomplete_issue();
		$data['getUserSysyemList'] = $this->Reminder_model->getUserSysyemList();
		$data['getTimeSlot'] = $this->Reminder_model->getTimeSlot();
		$data['getNotifyBy'] = $this->Reminder_model->getNotifyBy();
		$this->load->view('Admin/customer_add_activity_view',$data);
	}
	public function add_reminder()
	{
		$this->load->model('Admin/Reminder_model');
		$customer_id = $_REQUEST['customer_id'];
		$data['customerId'] = $customer_id;
		$data['getUserSysyemList'] = $this->Reminder_model->getUserSysyemList();
		$data['getTimeSlot'] = $this->Reminder_model->getTimeSlot();
		$data['getNotifyBy'] = $this->Reminder_model->getNotifyBy();
		$this->load->view('Admin/customer_add_reminder_view',$data);
	}
	public function addCustomerReminder()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Reminder_model');
			$data = $this->input->post();
			$this->Reminder_model->addCustomerReminder($data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function EmployeeAjaxData()
	{
		
	   	$this->load->model('Admin/Customer_model');	
		// User Permission Functionality ------------
		// module_id = 1, feature id = 5 for expense management , Privilegeids for expense management= 1,2,3,4
		$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>1);
		$activety_array = array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>3);
		$mail_array = array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>30);
	   	echo $this->Customer_model->AjaxData($permission_array,$activety_array,$mail_array);
	}

	public function index2()
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
			$data['credit_term']=$this->Customer_model->credit_term();
			$this->load->view('Admin/customer_view',$data);

		}
		else
		{
			redirect('admin/Login');
		}
	}


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

	public function edit_customer($customerid)
	{
		// geofence Notification ---------------------------
	    $this->load->model('Admin/Dashboard_model');
	    $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	    //------------------------------------------------		
		$this->load->model('Admin/Customer_model');
	    
	    $data['edit_customerresult']=$this->Customer_model->edit_customer($customerid);
	    $data['editprimary_customer']=$this->Customer_model->primary_customer();
	    $res = $data['edit_customerresult']->result();
		$get_businessid = $res[0]->business_id;
		if($get_businessid == '')
		{
			$data['selected_buss']= '';
		}
		else
		{
			$data['selected_buss']=$this->Customer_model->mult_buss_list($get_businessid);
		}
	    $data['type_list1']=$this->Customer_model->type_list();
		$data['location_list1']=$this->Customer_model->location_list();
		$data['business_list1']=$this->Customer_model->business_list();
		$data['group_list1']=$this->Customer_model->group_list();
		$data['country_list1']=$this->Customer_model->country_list();
		$data['selected_state_list']=$this->Customer_model->selected_state_list($customerid);
		$data['credit_term']=$this->Customer_model->credit_term();
		$data['account_manager']=$this->Customer_model->account_manager();
		$data['type'] = 'd_link';
		$data['page_name_link'] = 'admin/Customer';
		$data['page_name_1'] = 'Contact Management';
		$data['page_name_2'] = 'Edit Contact';
		$data['sidebar']=array('menu' =>"cust");
		$this->load->view('Admin/new_edit_customer_view',$data);
		// $this->load->view('Admin/edit_customer_view',$data);
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

	public function UploadScheduleDocument()
	{
		$query_id = $this->input->post('schedule_query_id');
		$this->load->model('Admin/Customer_model');
		$this->Customer_model->UploadScheduleDocument($query_id);
	}

	public function UploadSchedulePhoto()
	{
		$query_id = $this->input->post('schedule_query_id');
		$this->load->model('Admin/Customer_model');
		$this->Customer_model->UploadSchedulePhoto($query_id);
	}

	public function ImportContacts()
	{
		$this->load->model('Admin/Customer_model');
		$this->Customer_model->ImportContacts();
	}

	public function ExportContacts()
	{
		$this->load->model('Admin/Customer_model');
		$this->Customer_model->ExportContacts();
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
				$data['incomplete_issue_list']=$this->Customer_model->incomplete_issue();
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
				
				$data['customer_list']=$this->Customer_model->customer_list();
				$data['employee_list']=$this->Customer_model->employee_list();
				$data['product_list']=$this->Customer_model->product_list();

				$data['customer_issue']=$this->Customer_model->emp_issue();
				$data['schedule_visit_list']=$this->Customer_model->schedule_visit_list();
				$data['incomplete_issue_list']=$this->Customer_model->incomplete_issue();

				$this->load->view('Admin/employee_issue_list',$data);
				
				// $this->load->view('Admin/employee_issue_list',$data);
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
			$this->load->model('Admin/Reminder_model');
			$data['getUserSysyemList'] = $this->Reminder_model->getUserSysyemList();
			$data['getTimeSlot'] = $this->Reminder_model->getTimeSlot();
			$data['getNotifyBy'] = $this->Reminder_model->getNotifyBy();
			// // print_r($data['GetLeadDetails']);
			$this->load->view('Admin/NewAddActivityTaskView',$data);
			// $this->load->view('Admin/AddActivityTaskView',$data);
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
			$this->load->model('Admin/Reminder_model');
			$data['account_period_array']=$this->Dashboard_model->get_start_enddate_array();
			$getdate = $data['account_period_array'];
			
			$startdate = $getdate['start_date'];
			$enddate = $getdate['end_date'];
			$data['customer_issue']=$this->Customer_model->ScheduleReport($type,$startdate,$enddate);
			$data['customer_list']=$this->Customer_model->customer_list();
			$data['employee_list']=$this->Customer_model->employee_list();
			$data['product_list']=$this->Customer_model->product_list();
			$data['schedule_visit_list']=$this->Customer_model->schedule_visit_list();
			
			$data['getUserSysyemList'] = $this->Reminder_model->getUserSysyemList();
			$data['getTimeSlot'] = $this->Reminder_model->getTimeSlot();
			$data['getNotifyBy'] = $this->Reminder_model->getNotifyBy();

			$data['incomplete_issue'] = array(1);
			$data['type'] = 's_link';
			$data['page_name'] = 'Schedule Report';
			
			$this->load->view('Admin/NewScheduleReportView',$data);
			// $this->load->view('Admin/ScheduleReportView',$data);
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
			$data['schedule_type']=$this->Customer_model->fetch_schedule_type_id($query_id);
			$data['schedule_type_array']=$this->Customer_model->fetchschedule_type($query_id);
			$this->load->model('Admin/Reminder_model');
			$data['getUserSysyemList'] = $this->Reminder_model->getUserSysyemList();
			$data['getTimeSlot'] = $this->Reminder_model->getTimeSlot();
			$data['getNotifyBy'] = $this->Reminder_model->getNotifyBy();

			$this->load->view('Admin/new_assign_to_view',$data);
			// $this->load->view('Admin/assign_to_view',$data);
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
			$schedule_type_id = $this->input->post('schedule_type_id');
			$this->load->model('Admin/Customer_model');
			$this->Customer_model->assign_to($query_id,$employee,$schedule_date,$start_time,$end_time,$schedule_type_id);
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

	public function get_account_manger()
	{
		$id = $this->input->post('customerid');
		$this->load->model('Admin/Customer_model');
		$data['ManagerData'] = $this->Customer_model->get_account_manger($id);
		$this->load->view('Admin/ManagerData',$data);
	}

	public function document_details()
	{
		$id = $this->input->post('customerid');
		$this->load->model('Admin/Customer_model');
		$data['DocumentData'] = $this->Customer_model->document_details($id);
		$this->load->view('Admin/DocumentData',$data);	
	}

	public function add_schedule_overright()
	{
			
		$formdataGet = $this->input->post('formdata');
		// $my_array_data = json_decode($formdataGet, TRUE);
		// print_r($my_array_data);
		// die;
		if(isset($_SESSION['id']))
		{
			$formdata = json_decode($formdataGet, TRUE);
			// print_r($formdata);
			$this->load->model('Admin/Customer_model');
			$result = $this->Customer_model->add_schedule_overright($formdata);
			echo $result;
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

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
	public function update_status_schedule()
	{
		$this->load->model('Admin/Customer_model');
		$query_id = $this->input->post('query_id');
		$status_type = $this->input->post('status_type');
		$this->Customer_model->update_status_schedule($query_id,$status_type);
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
    	$data['doc_list']=$this->Customer_model->doc_list($ticket_no);
    	$data['bill_list']=$this->Customer_model->bill_list($ticket_no);
    	$data['target_list']=$this->Customer_model->target_bill_list($ticket_no);

    	// print_r($data['bill_list']);
    	
		// print_r($data['remark_list']);
		$result = $data['remark_list'];
		if ($result==0)
		{
			echo "0";
		}
		else
		{
			$this->load->view('Admin/new_employee_remark_view',$data);
			// $this->load->view('Admin/employee_remark_view',$data);
		}
			
	}

	public function remark_list_pending()
	{
		 // geofence Notification ---------------------------
	     $this->load->model('Admin/Dashboard_model');
	     $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	    //------------------------------------------------	
		$this->load->model('Admin/Customer_model');
	   	$ticket_no = $this->input->post('ticket_no');
		$data['remark_list']=$this->Customer_model->remark_list($ticket_no);
		$data['doc_list']=$this->Customer_model->doc_list($ticket_no);
		$data['bill_list']=$this->Customer_model->bill_list($ticket_no);
		$data['target_list']=$this->Customer_model->target_bill_list($ticket_no);

    		// print_r($data['bill_list']);
    		// User Permission Functionality ------------
		// module_id = 1, feature id = 3 for Product Management 
		$permission_array=array('user_id'=>$_SESSION['id'],'module_id'=>1,'feature_id'=>3);
		$data['user_permission']=$this->Dashboard_model->get_user_permission($permission_array);
		// print_r($data['remark_list']);
		$result = $data['remark_list'];
		if ($result==0)
		{
			echo "0";
		}
		else
		{
			$this->load->view('Admin/new_employee_remark_pending_view',$data);
			// $this->load->view('Admin/employee_remark_pending_view',$data);
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
		$this->load->view('Admin/employee_billing_view',$data);
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
				$this->load->view('Admin/new_reschedule_employee_view',$data);
				// $this->load->view('Admin/reschedule_employee_view',$data);
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

	public function update_price2()
	{
			$this->load->model('Admin/Customer_model');
		   	$achieve_id = $this->input->post('achieve_id');
		   	$billing_app_amount = $this->input->post('billing_app_amount');
			$this->Customer_model->update_price2($achieve_id,$billing_app_amount);	
	}






}
