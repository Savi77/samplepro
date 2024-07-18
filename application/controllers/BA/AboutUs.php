<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUs extends CI_Controller {

	public function index()
	{
		if(isset($this->session->id))
		{
			$this->load->model('BuroAdmin/AboutUs_model');
			$data['Contact_details'] = $this->AboutUs_model->Aboout_Details_Data();
      		$data['sidebar']=array('menu' =>"AboutUs"); 
			$this->load->view('BuroAdmin/aboutus_detail_view',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}
	public function add()
	{
		$this->load->model('BuroAdmin/AboutUs_model');
		$image=$_FILES['fileup']['name'];
		$formdata = $this->input->post();
		$data = array(
			'title_name' => $this->input->post('title_name'),
			'title_description' => $this->input->post('title_description'),
			
		);
		$this->AboutUs_model->insertData($image,$formdata);
	}

}
