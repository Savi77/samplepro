

<?php

error_reporting(0);

defined('BASEPATH') or exit('No direct script access allowed');

class ScheduleManagement extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Schedule_model');
	}

	public function index()
	{
		if (isset($_SESSION['id'])) {
			// Geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------	
			$data['sidebar'] = array('menu' => "issue");
			$this->load->model('Admin/Customer_model');
			$data['customer_list'] = $this->Customer_model->customer_list();
			$data['employee_list'] = $this->Customer_model->employee_list();
			$data['product_list'] = $this->Customer_model->product_list();
			$data['schedule_visit_list'] = $this->Customer_model->schedule_visit_list();
			$data['incomplete_issue_list'] = $this->Customer_model->incomplete_issue();
			$this->load->view('Admin/ScheduleManagementView', $data);
		} else {
			redirect('admin/Login');
		}
	}


	public function get_daterange_data()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/Customer_model');
			$formdata = $this->input->post();
			$data['complete_issue_list'] = $this->Customer_model->get_daterange_data($formdata);
			$this->load->view('Admin/new_daterange_schedule_data', $data);
			// $this->load->view('Admin/daterange_schedule_data', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function get_daterange_delete_data()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/Customer_model');
			$formdata = $this->input->post();		

			$data['complete_issue_list'] = $this->Customer_model->get_daterange_delete_data($formdata);
			$this->load->view('Admin/new_daterange_delete_data', $data);
			// $this->load->view('Admin/daterange_delete_data', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function ResheduleActivityData()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/Customer_model');
			$data['customer_list'] = $this->Customer_model->customer_list();
			$data['employee_list'] = $this->Customer_model->employee_list();

			$data['product_list'] = $this->Customer_model->product_list();
			$data['schedule_visit_list'] = $this->Customer_model->schedule_visit_list();
			$data['incomplete_issue_list'] = $this->Customer_model->incomplete_issue();

			// $data['cust_details'] = $this->Customer_model->cust_details($this->input->post('query_id'));
			
			
			$data['ResheduleActivityData'] = $this->Customer_model->ResheduleActivityData($this->input->post('query_id'));
			
			echo json_encode($data['ResheduleActivityData']);
			// $this->load->view('Admin/reshedule_activity_data_view',$data);
		} else {
			redirect('admin/Login');
		}
	}

	public function ResheduleActivitySubmit()
	{
		$this->load->model('Admin/Customer_model');

		$data = array(
			'edit_id' => $this->input->post('edit_id'),
			'ticket_no' => $this->input->post('ticket_no'),
			'schedule_type_id' => $this->input->post('schedule_type_id'),
			'schedule_date' => $this->input->post('schedule_date'),
			'schedule_start_time' => $this->input->post('schedule_start_time'),
			'schedule_end_time' => $this->input->post('schedule_end_time'),
			'query' => $this->input->post('query'),
			'assign_to' => $this->input->post('assign_to'),
			'addReminder' => $this->input->post('addReminder'),
			'recurring_set' => $this->input->post('recurring_set'),
			'user_id' => $this->input->post('user_id'),
			'reminder_before_time'=> $this->input->post('reminder_before_time'),
			'reminder_notify_by'=> $this->input->post('reminder_notify_by'),
			'reminder_note'=> $this->input->post('reminder_note'),
			'interval_type' => $this->input->post('interval_type'),
			'recurring_eod'=> $this->input->post('recurring_eod'),
		);
		
		$this->Customer_model->ResheduleActivitySubmit($data);
	}
	public function get_daterange_reschedule_data()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/Customer_model');
			$formdata = $this->input->post();
			$data['complete_issue_list'] = $this->Customer_model->get_daterange_reschedule_data($formdata);
			$this->load->view('Admin/daterange_reschedule_data', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function get_daterange_completed_data()
	{
		if (isset($_SESSION['id'])) {
			$this->load->model('Admin/Customer_model');
			$formdata = $this->input->post();
			$data['complete_issue_list'] = $this->Customer_model->get_daterange_completed_data($formdata);
			$this->load->view('Admin/daterange_completed_data', $data);
		} else {
			redirect('admin/Login');
		}
	}


	public function GridList()
	{
		if (isset($_SESSION['id'])) {
			// Geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------	
			
			$this->load->model('Admin/Customer_model');

			$data['customer_list'] = $this->Customer_model->customer_list();
			$data['product_list'] = $this->Customer_model->product_list();
			$data['employee_list'] = $this->Customer_model->employee_list();
			$data['schedule_visit_list'] = $this->Customer_model->schedule_visit_list();

			$data['incomplete_issue_list'] = $this->Customer_model->incomplete_issue();
			
			$data['issue_list_array'] = $this->Customer_model->get_pending_issue_list();
            
			// User Permission Functionality ------------
			// module_id = 1, feature id = 3 for Product Management 
			$permission_array = array('user_id' => $_SESSION['id'], 'module_id' => 1, 'feature_id' => 3);
			$data['user_permission'] = $this->Dashboard_model->get_user_permission($permission_array);
			
			$this->load->model('Admin/Reminder_model');
			$data['getUserSysyemList'] = $this->Reminder_model->getUserSysyemList();
			$data['getTimeSlot'] = $this->Reminder_model->getTimeSlot();
			$data['getNotifyBy'] = $this->Reminder_model->getNotifyBy();

			$data['type'] = 's_link';
			$data['page_name'] = 'Task';
			$data['sidebar'] = array('menu' => "issue");
			$this->load->view('Admin/NewScheduleManagementGridListView', $data);
			// $this->load->view('Admin/ScheduleManagementGridListView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function TrasnsferList()
	{
		if (isset($_SESSION['id'])) {
			// Geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------	
			
			$this->load->model('Admin/Customer_model');

			$data['customer_list'] = $this->Customer_model->customer_list();
			$data['product_list'] = $this->Customer_model->product_list();
			$data['employee_list'] = $this->Customer_model->employee_list();
			$data['schedule_visit_list'] = $this->Customer_model->schedule_visit_list();

			$data['incomplete_issue_list'] = $this->Customer_model->incomplete_issue();

			$data['issue_list_array'] = $this->Customer_model->get_pending_issue_list();
			$data['reschedule_issue_list'] = $this->Customer_model->get_reschedule_issue_list();
			$data['complete_issue_list'] = $this->Customer_model->get_complete_issue_list();

			$data['activity_issue_count'] = $this->Customer_model->get_activity_issue_count();
			$data['rechedule_issue_count'] = $this->Customer_model->get_rechedule_issue_count();
			$data['complete_issue_count'] = $this->Customer_model->get_complete_issue_count();

			// User Permission Functionality ------------
			// module_id = 1, feature id = 3 for Product Management 
			$permission_array = array('user_id' => $_SESSION['id'], 'module_id' => 1, 'feature_id' => 3);
			$data['user_permission'] = $this->Dashboard_model->get_user_permission($permission_array);
			// $data['type'] = 's_link';
			// $data['page_name'] = 'Trasnsfer List';

			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ScheduleManagement/GridList';
			$data['page_name_1'] = 'Task';
			$data['page_name_2'] = 'Trasnsferred Task List';
			$data['sidebar'] = array('menu' => "issue");
			$this->load->view('Admin/NewScheduleManagementTrasnsferListView', $data);
			// $this->load->view('Admin/ScheduleManagementTrasnsferListView', $data);
		} else {
			redirect('admin/Login');
		}
	}

	public function view_trash_activities()
	{
		if (isset($_SESSION['id'])) {
			// Geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------	
			
			$this->load->model('Admin/Customer_model');
			$data['customer_list'] = $this->Customer_model->customer_list();
			$data['employee_list'] = $this->Customer_model->employee_list();

			$data['issue_list_array'] = $this->Customer_model->get_deleted_list();

			$permission_array = array('user_id' => $_SESSION['id'], 'module_id' => 1, 'feature_id' => 3);
			$data['user_permission'] = $this->Dashboard_model->get_user_permission($permission_array);
			$data['incomplete_issue_list'] = array(1, 1);
			$data['type'] = 's_link';
			$data['page_name'] = 'View Trash Task';
			$data['sidebar'] = array('menu' => "view_trash_activities");
			$this->load->view('Admin/NewViewTrashActivitiesView', $data);
			// $this->load->view('Admin/ViewTrashActivitiesView', $data);
		} else {
			redirect('admin/Login');
		}
	}
	public function delete_activity()
	{
		$this->load->model('Admin/Customer_model');
		$this->Customer_model->delete_activity($this->input->post('query_id'));
		redirect('admin/ScheduleManagement/GridList');
	}

	public function delete_activity_new()
	{
		$this->load->model('Admin/Customer_model');
		$this->Customer_model->delete_activity($this->input->post('query_id'));
		$formdata = array(
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'status' => $this->input->post('status'),
			'employee_list' => $this->input->post('employee_list')
		);
		$this->get_daterange_data_after_delete($formdata);
		// redirect('admin/ScheduleManagement/GridList');
	}

	public function get_daterange_data_after_delete($formdata)
	{
		if (isset($_SESSION['id'])) 
		{
			$this->load->model('Admin/Customer_model');
			$data['complete_issue_list'] = $this->Customer_model->get_daterange_data($formdata);
			$this->load->view('Admin/new_daterange_schedule_data', $data);
		} 
		else 
		{
			redirect('admin/Login');
		}
	}

	public function restore_activity()
	{
		$this->load->model('Admin/Customer_model');
		$this->Customer_model->restore_activity($this->input->post('query_id'));
		$formdata = array(
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'status' => $this->input->post('status'),
		);
		$this->get_daterange_data_after_delete_trash($formdata);
	}
	public function permanent_delete_activity()
	{
		$this->load->model('Admin/Customer_model');
		$this->Customer_model->permanent_delete_activity($this->input->post('query_id'));
		$formdata = array(
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'status' => $this->input->post('status'),
		);
		$this->get_daterange_data_after_delete_trash($formdata);
	}
    public function get_daterange_data_after_delete_trash($formdata)
	{
		if (isset($_SESSION['id'])) 
		{
			$this->load->model('Admin/Customer_model');
			$data['complete_issue_list'] = $this->Customer_model->get_daterange_delete_data($formdata);
			$this->load->view('Admin/new_daterange_delete_data', $data);
		} 
		else 
		{
			redirect('admin/Login');
		}
	}

	public function Issue()
	{
		if (isset($_SESSION['id'])) {
			if ($this->session->user_type == 'SA' or $this->session->schedule_view == '1') {
				// Geofence Notification ---------------------------
				$this->load->model('Admin/Dashboard_model');
				$data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
				//------------------------------------------------	
				$data['sidebar'] = array('menu' => "issue");
				$this->load->model('Admin/Customer_model');
				$data['customer_list'] = $this->Customer_model->customer_list();
				$data['employee_list'] = $this->Customer_model->employee_list();
				$data['product_list'] = $this->Customer_model->product_list();
				$data['schedule_visit_list'] = $this->Customer_model->schedule_visit_list();
				$data['incomplete_issue_list'] = $this->Customer_model->incomplete_issue();
				$this->load->view('Admin/customer_issue_view', $data);
			} else {
				// Geofence Notification ---------------------------
				$this->load->model('Admin/Dashboard_model');
				$data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
				//------------------------------------------------
				$data['sidebar'] = array('menu' => "issue");
				$this->load->model('Admin/Customer_model');

				$data['customer_list'] = $this->Customer_model->customer_list();
				$data['employee_list'] = $this->Customer_model->employee_list();
				$data['product_list'] = $this->Customer_model->product_list();

				$data['customer_issue'] = $this->Customer_model->emp_issue();
				$data['schedule_visit_list'] = $this->Customer_model->schedule_visit_list();
				$data['incomplete_issue_list'] = $this->Customer_model->incomplete_issue();
				$this->load->view('Admin/employee_issue_list', $data);
			}
		} else {
			redirect('admin/Login');
		}
	}
	public function Task_view_page()
	{
		if (isset($_SESSION['id'])) 
		{
			$task_id = $_GET['task_id'];
			// Geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------	
			$this->load->model('Admin/Customer_model');
            $data['get_details'] = $this->Customer_model->Get_task_details($task_id);

			$ticket_no = $data['get_details']['ticket_no'];
			$data['remark_list']=$this->Customer_model->remark_list($ticket_no);
			$data['doc_list']=$this->Customer_model->doc_list($ticket_no);
			$data['bill_list']=$this->Customer_model->bill_list($ticket_no);
			$data['target_list']=$this->Customer_model->target_bill_list($ticket_no);

			// $data['view_details'] = $this->remark_details($data['get_details']['ticket_no']);
		
		
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ScheduleManagement/GridList';
			$data['page_name_1'] = 'Task';
			$data['page_name_2'] = 'View Task';
			$data['sidebar']=array('menu' =>"issue");
			$this->load->view('Admin/Task_viewpopup_page',$data);
		}
		else 
		{
			redirect('admin/Login');
		}

	}

	public function remark_details($ticket_no)
	{
		 // geofence Notification ---------------------------
	     $this->load->model('Admin/Dashboard_model');
	     $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	    //------------------------------------------------	
		$this->load->model('Admin/Customer_model');
	   	// $ticket_no = $this->input->post('ticket_no');
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
			// $this->load->view('Admin/new_employee_remark_pending_view',$data);
		}
			
	}


	public function Task_view_transfer_page()
	{
		if (isset($_SESSION['id'])) 
		{
			$task_id = $_GET['task_id'];
			
			// Geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------	
			$this->load->model('Admin/Customer_model');
            $data['get_details'] = $this->Customer_model->Get_task_details($task_id);
			$ticket_no = $data['get_details']['ticket_no'];
			$data['remark_list']=$this->Customer_model->remark_list($ticket_no);
			$data['doc_list']=$this->Customer_model->doc_list($ticket_no);
			$data['bill_list']=$this->Customer_model->bill_list($ticket_no);
			$data['target_list']=$this->Customer_model->target_bill_list($ticket_no);

			// $data['view_details'] = $this->remark_details($data['get_details']['ticket_no']);
		
		
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/ScheduleManagement/TrasnsferList';
			$data['page_name_1'] = 'Trasnsferred Task List';
			$data['page_name_2'] = 'View Trasnsferred Task';
			$data['sidebar']=array('menu' =>"issue");
			$this->load->view('Admin/Task_viewpopup_transfer_page',$data);
		}
		else 
		{
			redirect('admin/Login');
		}

	}

	public function remark_details_transfer_page($ticket_no)
	{
		 // geofence Notification ---------------------------
	     $this->load->model('Admin/Dashboard_model');
	     $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	    //------------------------------------------------	
		$this->load->model('Admin/Customer_model');
	   	// $ticket_no = $this->input->post('ticket_no');
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
			// $this->load->view('Admin/new_employee_remark_pending_view',$data);
		}
			
	}

	public function Task_view_dashboard_page()
	{
		if (isset($_SESSION['id'])) 
		{
			$task_id = $_GET['task_id'];
			
			// Geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------	
			$this->load->model('Admin/Customer_model');
            $data['get_details'] = $this->Customer_model->Get_task_details($task_id);
			$ticket_no = $data['get_details']['ticket_no'];
			$data['remark_list']=$this->Customer_model->remark_list($ticket_no);
			$data['doc_list']=$this->Customer_model->doc_list($ticket_no);
			$data['bill_list']=$this->Customer_model->bill_list($ticket_no);
			$data['target_list']=$this->Customer_model->target_bill_list($ticket_no);
		
			$data['type'] = 's_link';
			// $data['page_name_link'] = 'admin/Customer/ScheduleReport?Type=';
			// $data['page_name_1'] = 'Schedule Report';
			$data['page_name'] = 'View Task Details';
			$data['sidebar']=array('menu' =>"issue");
			$this->load->view('Admin/Task_viewpopup_dashboard_page',$data);
		}
		else 
		{
			redirect('admin/Login');
		}

	}

	public function remark_details_dashboard_page($ticket_no)
	{
		 // geofence Notification ---------------------------
	     $this->load->model('Admin/Dashboard_model');
	     $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	    //------------------------------------------------	
		$this->load->model('Admin/Customer_model');
	   	// $ticket_no = $this->input->post('ticket_no');
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
			// $this->load->view('Admin/new_employee_remark_pending_view',$data);
		}
			
	}

	public function edit_task()
	{
		if(isset($_SESSION['id']))
		{
	        // Geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
            $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			$this->load->model('Admin/Customer_model');
			$id = $_REQUEST['id'];
			$data['customer_list'] = $this->Customer_model->customer_list();
			$data['product_list'] = $this->Customer_model->product_list();
			$data['employee_list'] = $this->Customer_model->employee_list();
			$data['schedule_visit_list'] = $this->Customer_model->schedule_visit_list();
			$data['edit_detail']=$this->Customer_model->edit_task($id);

			$this->load->model('Admin/Reminder_model');
			$data['getUserSysyemList'] = $this->Reminder_model->getUserSysyemList();
			$data['getTimeSlot'] = $this->Reminder_model->getTimeSlot();
			$data['getNotifyBy'] = $this->Reminder_model->getNotifyBy();
		    
			$this->load->view('Admin/edit_task_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	public function Edit_Schedule_Task()
	{
		if(isset($_SESSION['id']))
		{
			
			$this->load->model('Admin/Customer_model');
			$data = $this->input->post();
			echo "<pre>";
			print_r($data);
			// $this->Customer_model->Edit_Schedule_Task($data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
}