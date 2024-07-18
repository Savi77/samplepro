<?php

// error_reporting(0);

 defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
    function __construct()
     {
  	  	parent::__construct();
     }
    
    public function index() //facebook authentication
    {
		if(isset($this->session->id)){
			redirect('admin/Dashboard/view_dashboard');
		}else{
	      	redirect('SignIn');
		}

    }
}
