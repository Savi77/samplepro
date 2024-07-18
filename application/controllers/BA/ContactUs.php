<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUs extends CI_Controller {

	
	public function index()
	{
		if(isset($this->session->id))
		{
			// geofence Notification ---------------------------
	         $this->load->model('BuroAdmin/Dashboard_model');
	         $data['GeofenceNotification']=$this->Dashboard_model->GeofenceNotification();
	        //------------------------------------------------
				
			$this->load->model('BuroAdmin/ContactUs_model');
			$data['Contact_details']=$this->ContactUs_model->Contact_details();
      		$data['sidebar']=array('menu' =>"contactus"); 
			$this->load->view('BuroAdmin/contactus_view',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
		
	}

	public function ContactDetail()
	{
		if(isset($this->session->id))
		{
			$this->load->model('BuroAdmin/ContactUs_model');
			$data['Contact_details'] = $this->ContactUs_model->Contact_Details_Data();
      		$data['sidebar']=array('menu' =>"contact_detail"); 
			$this->load->view('BuroAdmin/contact_detail_view',$data);
		}
		else
		{
			redirect('BuroAdminLogin');
		}
	}
	public function add()
	{
		$this->load->model('BuroAdmin/ContactUs_model');
		$data = array(
			'mob_no' => $this->input->post('mob_no'),
			'tel_no' => $this->input->post('tel_no'),
			'prinary_email' => $this->input->post('prinary_email'),
			'secondary_email' => $this->input->post('secondary_email'),
			'address' => $this->input->post('address'),
			'about_us' => $this->input->post('about_us'),
			'facebook_link' => $this->input->post('facebook_link'),
			'twitter_link' => $this->input->post('twitter_link'),
			'pinterest_link' => $this->input->post('pinterest_link'),
			'instagram_link' => $this->input->post('instagram_link'),
			'date_created' => date('Y-m-d H:i:s')
		);
		$this->ContactUs_model->insertData($data);
	}

}
