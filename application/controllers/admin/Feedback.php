
<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller 
{	
	public function index()
	{
		if(isset($_SESSION['id']))
		{
	        // Geofence Notification ---------------------------
	        $this->load->model('Admin/Dashboard_model');
	        $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
			$this->load->model('Admin/Feedback_model');
			$data['product_data']=$this->Feedback_model->get_product_data();
			// print_r($data['product_data']);
			$data['sidebar']=array('menu' =>"Feedback"); 			
			$this->load->view('Admin/FeedbackView',$data);
		}
		else
		{
			redirect('admin/Login');
		}		
	}

	public function SubmitFeedback()
	{
		$formdata=$this->input->post();
		$this->load->model('Admin/Feedback_model');
		$this->Feedback_model->SubmitFeedback($formdata);
	}




}