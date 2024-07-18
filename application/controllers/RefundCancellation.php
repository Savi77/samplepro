<?php

error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class RefundCancellation extends CI_Controller 
{
	public function index()
	{	
		$this->load->model('Home_model');
		$data['service_feature_list'] = $this->Home_model->service_feature_list();
		$data['case_studies_list'] = $this->Home_model->case_studies_list();
		$data['Contact_details'] = $this->Home_model->Contact_Details_Data();
		$this->load->view('RefundCancellationView',$data);
	}

}