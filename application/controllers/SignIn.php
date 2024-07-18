<?php

error_reporting(0);

defined('BASEPATH') or exit('No direct script access allowed');

class SignIn extends CI_Controller
{
	public function index()
	{
		// $this->session->sess_destroy();
		// $this->load->view('SignInView');
		if (isset($this->session->id)) {
			redirect('admin/Dashboard/view_dashboard');
		} else {
			$this->load->model('Admin/Adminauthentication');
			$data['loginDetails'] = $this->Adminauthentication->LoginDetailsData();
			$this->load->view('NewSignInView',$data);
		}
	}



	public function ExpirationMailSend()
	{
		$this->load->model('Admin/Dashboard_model');
		$this->Dashboard_model->ExpirationMailSend();
	}




	public function recovery_pass()
	{
		// $this->load->view('forgot_pass_view');
		$this->load->view('new_forgot_pass_view');
	}


	public function forgotpassword()
	{
		$this->load->model('Admin/Adminauthentication');
		$email = $this->input->post('email');
		// $findemail = $this->Adminauthentication->forgotpassword($email);
		if ($email) {
			$this->Adminauthentication->sendpassword($email);
		} else {
			echo "1";
		}
	}
	// public function forgotpassword()
	// {
	// 	$this->load->model('Admin/Adminauthentication');
	// 	$email = $this->input->post('email');
	// 	$new_pass = $this->input->post('new_pass');
	// 	$confirm_password = $this->input->post('confirm_password');
        
	// 	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	// 	$this->form_validation->set_rules('new_pass', 'Password', 'required');
    //     $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_pass]');
	// 	// $findemail = $this->Adminauthentication->forgotpassword($email);
	// 	if ($this->form_validation->run() == FALSE) 
	// 	{
	// 		echo "<scrip>alert('something went wrong)</script>";
	// 		$this->recovery_pass();
	// 	}
	// 	else
	// 	{
	// 		$this->Adminauthentication->sendpassword($email,$new_pass,$confirm_password);
	// 	}	
		
	// }

	
}
