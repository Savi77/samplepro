<?php

defined('BASEPATH') or exit('No direct script access allowed');

class GlobalFunctions extends CI_Controller
{

	public function AddActivity()
	{

		// Geofence Notification ---------------------------
		$this->load->model('Admin/Dashboard_model');
		$data['GeofenceNotification'] = $this->Dashboard_model->GeofenceNotification();
		//------------------------------------------------	
		$data['sidebar'] = array('menu' => "issue");
		$this->load->model('Admin/Customer_model');

		$data['customer_list'] = $this->Customer_model->customer_list();
		$data['product_list'] = $this->Customer_model->product_list();
		$data['employee_list'] = $this->Customer_model->employee_list();
		$data['schedule_visit_list'] = $this->Customer_model->schedule_visit_list();
		$data['issue_list_array'] = $this->Customer_model->get_pending_issue_list();

		// print_r($data['issue_list_array']);
		// exit;

		$this->load->view('Admin/includes/addactivity', $data);
	}
}
