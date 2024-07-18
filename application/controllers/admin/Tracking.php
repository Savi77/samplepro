<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller 
{
	public function index()
	{
		if(isset($_SESSION['id']))
		{
	       // Geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	       //------------------------------------------------
			$data['sidebar']=array('menu' =>"track");
			$this->load->model('Admin/Tracking_model');
			$data['employee_list']=$this->Tracking_model->employee_list();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Tracking/view_tracking';
			$data['page_name_1'] = 'Tracking';
			$data['page_name_2'] = 'Tracking Report';
			$data['sidebar']=array('menu' =>"Tracking");
			// $this->load->view('Admin/tracking_view',$data);
			$this->load->view('Admin/new_tracking_view',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}

	public function LiveTracking()
	{
		if(isset($_SESSION['id']))
		{
	       // Geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	       //------------------------------------------------
			
			$this->load->model('Admin/Tracking_model');
			$data['employee_list']=$this->Tracking_model->employee_list();
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Tracking/view_tracking';
			$data['page_name_1'] = 'Tracking';
			$data['page_name_2'] = 'Resource Live Tracking';
			$data['sidebar']=array('menu' =>"Tracking");
			// $this->load->view('Admin/LiveTrackingView',$data);
			$this->load->view('Admin/NewLiveTrackingView',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}


	public function LiveTrackingSchedule()
	{
		$formdata=$this->input->post();
		$this->load->model('Admin/Tracking_model');
		$this->Tracking_model->LiveTrackingSchedule($formdata);
	}

	public function Viewdata_admin()
	{
		$formdata=$this->input->post();
		$this->load->model('Admin/Tracking_model');
		$this->Tracking_model->Viewdata_admin($formdata);
	}

// ============================= Add location ============================================
	public function add_location()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$data['sidebar']=array('menu' =>"add_loc");
			$this->load->model('Admin/Tracking_model');
			$data['customer_list']=$this->Tracking_model->customer_list();
			$this->load->view('Admin/track_add_location',$data);
		}
		else
		{
			redirect('admin/Login');
		}
		
	}

	public function AddLocation()
	{
		$formdata=$this->input->post();
		// print_r($formdata);
		$this->load->model('Admin/Tracking_model');
		$this->Tracking_model->AddLocation($formdata);
	}
// ============================= / Add location ============================================
// ============================= view location ============================================
	public function ViewLocation()
	{   
	     // geofence Notification ---------------------------
	     $this->load->model('Admin/Dashboard_model');
	     $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	     //------------------------------------------------

		$data['sidebar']=array('menu' =>"view_loc");
	    $this->load->model('Admin/Tracking_model');
		$data['viewlocation']=$this->Tracking_model->viewlocation();
		$data['menu']=array('menu' =>"Employee_Tracking"); 
		$data['menu2']=array('menu' =>"viewlocation");
		$this->load->view('Admin/viewlocation',$data);
	}

	public function get_location_detail()
	{
		// $cust_id=$this->session->cust_id;
		$this->load->model('Admin/Tracking_model'); 
		$this->Tracking_model->get_location_detail();
	}

	public function DeleteLocation()
	{
		$del_id=$this->input->post('del_id');
		$this->load->model('Admin/Tracking_model');
		$this->Tracking_model->DeleteLocation($del_id);
	}

// ============ Visit and time spend report =============================
	public function Tracking_Report()
	{
		// geofence Notification ---------------------------
		$this->load->model('Admin/Dashboard_model');
		$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
		//------------------------------------------------
		
		$this->load->model('Admin/Tracking_model');

		$data['employee_list']=$this->Tracking_model->employee_list();
		$data['ClientReport']=$this->Tracking_model->FetchClientReport_default();

		$data['type'] = 'd_link';
		$data['page_name_link'] = 'admin/Tracking/view_tracking';
		$data['page_name_1'] = 'Tracking';
		$data['page_name_2'] = 'Client Visit Report';
		$data['sidebar']=array('menu' =>"Tracking");

		// $this->load->view('Admin/employee_visit_report',$data);
		$this->load->view('Admin/new_employee_visit_report',$data);
	}


	public function FetchClientReport()
	{
		$formdata=$this->input->post();
		$this->load->model('Admin/Tracking_model');
        $data['ClientReport']=$this->Tracking_model->FetchClientReport($formdata);
        $this->load->view('Admin/FetchClientReportView',$data);
	}

	public function daterange_report()
	{
	     // geofence Notification ---------------------------
	     $this->load->model('Admin/Dashboard_model');
	     $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	     //------------------------------------------------
		$formdata=$this->input->post();
		$this->load->model('Admin/Tracking_model');
		$data['Tracking_Report']=$this->Tracking_model->daterange_report($formdata);
		// print_r($data['Tracking_Report']);
		$this->load->view('Admin/datewise_employee_report',$data);		
	}

// ======== / Visit and time spend report ============================================

// =============================  Distance report ================================================

	public function employee_report()
	{
		if(isset($_SESSION['id']))
		{
			// geofence Notification ---------------------------
			$this->load->model('Admin/Dashboard_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			//------------------------------------------------
			$data['sidebar']=array('menu' =>"emp_report");
			$this->load->model('Admin/Tracking_model'); 
		    $data['employeelist']=$this->Tracking_model->employee_list();
			$data['date_report']=$this->Tracking_model->daterange_distance_default();


			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Tracking/view_tracking';
			$data['page_name_1'] = 'Tracking';
			$data['page_name_2'] = 'Distance Report';
			$data['sidebar']=array('menu' =>"Tracking");

			$this->load->view('Admin/new_distance_employee_report',$data);
		    // $this->load->view('Admin/distance_employee_report',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function daterange_distance()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$formdata=$this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/Tracking_model');
			$data['date_report']=$this->Tracking_model->daterange_distance($formdata);
			// print_r(expression);
			$this->load->view('Admin/employee_distance_report',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function client_visit_report()
	{
		if(isset($_SESSION['id']))
		{
			$formdata=$this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/Tracking_model');
			$data['date_report']=$this->Tracking_model->daterange_distance($formdata);
			// print_r(expression);
			$this->load->view('Admin/employee_distance_report',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
	}


	public function location_report()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------

			$data['sidebar']=array('menu' =>"loc_report");
			$this->load->model('Admin/Tracking_model'); 
		    $data['employeelist']=$this->Tracking_model->get_employee_list();
		    $this->load->view('Admin/location_report_view',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function daterange_location()
	{
		if(isset($_SESSION['id']))
		{
            // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$formdata=$this->input->post();
			// print_r($formdata);
			$this->load->model('Admin/Tracking_model');
			// $this->Tracking_model->daterange_location($formdata);
			$data['loc_report']=$this->Tracking_model->daterange_location($formdata);
			// print_r(expression);
			$this->load->view('Admin/employee_location_report',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
	}


	public function LiveEmployeeTracking()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Dashboard_model');
			$this->load->model('Admin/Tracking_model');
			$data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
			$data['sidebar']=array('menu' =>"LiveEmployeeTracking");
			$data['EmployeeList']=$this->Tracking_model->LiveLocation();
			// print_r($data['EmployeeList']);

			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/Tracking/view_tracking';
			$data['page_name_1'] = 'Tracking';
			$data['page_name_2'] = 'Resource Live Location';
			$data['sidebar']=array('menu' =>"Tracking");

			$this->load->view('Admin/NewLiveEmployeeTrackingView',$data);
			// $this->load->view('Admin/LiveEmployeeTrackingView',$data);
		}
		else
		{
		     redirect('admin/Login');
		}
	}


	public function LiveEmployeeTrackingData()
	{
		$this->load->model('Admin/Tracking_model');
		$this->Tracking_model->LiveEmployeeTrackingData();
	}


 // ============================= Shift ==========================
	
	public function MasterShift()
	{
		if(isset($_SESSION['id']))
		{
	        // geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			$data['sidebar']=array('menu' =>"shiftTiming");
			$this->load->model('Admin/Tracking_model');
			$data['MasterShiftArray']=$this->Tracking_model->get_shift_list();		
			
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/dashboard/UserManagement';
			$data['page_name_1'] = 'User Management';
			$data['page_name_2'] = 'Shift';
			$data['sidebar']=array('menu' =>"UserManagement");

			// $this->load->view('Admin/MasterShiftView',$data);
			$this->load->view('Admin/NewMasterShiftView',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function add_master_shift()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Tracking_model');
			$formdata=$this->input->post();
			
			$this->Tracking_model->add_master_shift($formdata);
		}
		else
		{
		   redirect('admin/Login');
		}
	}


	public function shift()
	{
		if(isset($_SESSION['id']))
		{
	         // geofence Notification ---------------------------
	         $this->load->model('Admin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	         //------------------------------------------------
			$data['sidebar']=array('menu' =>"shift");
			$this->load->model('Admin/Tracking_model');
			$this->load->model('Admin/User_model');
			$data['array_users']=$this->User_model->get_user_data();
			$data['shift_list']=$this->Tracking_model->get_shift_list();
			$data['emp_shift']=$this->Tracking_model->emp_shift();
			
			$data['type'] = 'd_link';
			$data['page_name_link'] = 'admin/dashboard/UserManagement';
			$data['page_name_1'] = 'User Management';
			$data['page_name_2'] = 'Assign Shift';
			$data['sidebar']=array('menu' =>"UserManagement");
			// $this->load->view('Admin/shift_creation_view',$data);
			$this->load->view('Admin/new_shift_creation_view',$data);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function add_shift()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Tracking_model');
			$formdata=$this->input->post();
			$this->Tracking_model->add_shift($formdata);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function confirm_shift()
	{
		if(isset($_SESSION['id']))
		{
		    // $user_id=$_REQUEST['user_id'];
			$user_id = $this->input->post('user_id');
			$this->load->model('Admin/Tracking_model');
			$data=$this->Tracking_model->confirm_shift($user_id);
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
	public function cancel_shift()
	{
		if(isset($_SESSION['id']))
		{
		    // $user_id=$_REQUEST['user_id'];
			$user_id = $this->input->post('user_id');
			$this->load->model('Admin/Tracking_model');
			$data=$this->Tracking_model->cancel_shift($user_id);
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
	public function edit_shift()
	{
	     // geofence Notification ---------------------------
	     $this->load->model('Admin/Dashboard_model');
	     $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	     //------------------------------------------------
		$this->load->model('Admin/Tracking_model');
		$shiftid=$this->input->post('shiftid');
		$data['employee_list']=$this->Tracking_model->get_employee_list();
		
		$data['shift_list']=$this->Tracking_model->get_shift_list();
		$data['edit_shift']=$this->Tracking_model->edit_shift($shiftid);	
		// print_r($data['edit_shift']);
		$this->load->view('Admin/edit_shift_view',$data);
	}

	public function edit_add_shift()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Tracking_model');
			$formdata=$this->input->post();

			$this->Tracking_model->edit_add_shift($formdata);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

    //-----------------------------------------------------

	public function delete_master_shift()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Tracking_model');
			$id=$this->input->post('id');
			$this->Tracking_model->delete_master_shift($id);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function edit_master_shift()
	{
		$this->load->model('Admin/Tracking_model');
		$id=$this->input->post('id');
		$data['edit_shift']=$this->Tracking_model->edit_master_shift($id);
		$this->load->view('Admin/edit_master_shift_view',$data);
	}

	public function update_master_shift()
	{
		if(isset($_SESSION['id']))
		{
			$this->load->model('Admin/Tracking_model');
			$formdata=$this->input->post();
			$this->Tracking_model->update_master_shift($formdata);
		}
		else
		{
		   redirect('admin/Login');
		}
	}

	public function view_tracking()
	{
		$data['type'] = 's_link';
		$data['page_name'] = 'Tracking';
		$data['sidebar']=array('menu' =>"Tracking"); 
		// $this->load->view('Admin/Tracking');
		$this->load->view('Admin/NewTracking',$data);
	}

}
